<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('event_model');
        $this->load->model('user_model');
        $this->load->library('session');
        $this->load->database();
        
        // Cek apakah user sudah login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index() {
        // Redirect ke halaman tickets
        redirect('tickets');
    }

    public function create() {
        $ticket_id = $this->input->post('ticket_id');
        $quantity = $this->input->post('quantity');
        $payment_method = $this->input->post('payment_method');
        
        // Validasi input
        $this->load->library('form_validation');
        $this->form_validation->set_rules('ticket_id', 'Tiket', 'required|numeric');
        $this->form_validation->set_rules('quantity', 'Jumlah', 'required|numeric|greater_than[0]');
        $this->form_validation->set_rules('payment_method', 'Metode Pembayaran', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('events/search');
        }
        
        // Ambil data tiket
        $ticket = $this->event_model->get_event_by_id($ticket_id);
        if (!$ticket) {
            $this->session->set_flashdata('error', 'Tiket tidak ditemukan!');
            redirect('events/search');
        }
        
        // Cek ketersediaan tiket langsung dari database
        if ($ticket['available_tickets'] < $quantity) {
            $this->session->set_flashdata('error', 'Jumlah tiket tidak mencukupi!');
            redirect('events/search');
        }
        
        // Hitung total harga
        $total_price = $ticket['price'] * $quantity;
        
        // Siapkan data transaksi
        $transaction_data = array(
            'ticket_id' => $ticket_id,
            'user_id' => $this->session->userdata('user_id'),
            'quantity' => $quantity,
            'total_price' => $total_price,
            'payment_method' => $payment_method,
            'payment_status' => 'paid', // Langsung set paid untuk sistem demo
            'payment_details' => json_encode([
                'event_name' => $ticket['event_name'],
                'event_type' => $ticket['event_type'],
                'location' => $ticket['location'],
                'date' => $ticket['date']
            ]),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        
        // Mulai transaksi database
        $this->db->trans_start();
        
        // Insert ke tabel transactions
        $this->db->insert('transactions', $transaction_data);
        $transaction_id = $this->db->insert_id();
        
        // Update available_tickets di tabel tickets
        $this->db->set('available_tickets', 'available_tickets - ' . $quantity, FALSE);
        $this->db->where('id', $ticket_id);
        $this->db->update('tickets');
        
        // Selesai transaksi database
        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat memproses transaksi.');
            redirect('events/search');
        } else {
            $this->session->set_flashdata('success', 'Transaksi berhasil! Tiket Anda telah dikonfirmasi.');
            redirect('tickets/detail/' . $transaction_id);
        }
    }

    public function detail($transaction_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }

        // Ambil data transaksi
        $this->db->select('transactions.*, tickets.event_name, tickets.event_type, tickets.location, tickets.date');
        $this->db->from('transactions');
        $this->db->join('tickets', 'tickets.id = transactions.ticket_id');
        $this->db->where('transactions.id', $transaction_id);
        $this->db->where('transactions.user_id', $this->session->userdata('user_id'));
        $query = $this->db->get();
        
        if ($query->num_rows() === 0) {
            $this->session->set_flashdata('error', 'Transaksi tidak ditemukan!');
            redirect('events/search');
        }

        $data['transaction'] = $query->row_array();
        $data['title'] = 'Detail Transaksi - QuickTix';
        
        $this->load->view('transaction/detail', $data);
    }

    public function update_status($id) {
        $status = $this->input->post('status');
        
        if (!in_array($status, ['pending', 'paid', 'cancelled'])) {
            $this->session->set_flashdata('error', 'Status tidak valid!');
            redirect('transaction/detail/' . $id);
        }
        
        if ($this->event_model->update_transaction_status($id, $status)) {
            $this->session->set_flashdata('success', 'Status transaksi berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui status transaksi!');
        }
        
        redirect('transaction/detail/' . $id);
    }

    public function my_tickets() {
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }

        // Ambil semua transaksi user
        $this->db->select('transactions.*, tickets.event_name, tickets.event_type, tickets.location, tickets.date');
        $this->db->from('transactions');
        $this->db->join('tickets', 'tickets.id = transactions.ticket_id');
        $this->db->where('transactions.user_id', $this->session->userdata('user_id'));
        $this->db->order_by('transactions.created_at', 'DESC');
        $query = $this->db->get();
        
        $data['transactions'] = $query->result_array();
        $data['title'] = 'Tiket Saya - QuickTix';
        
        $this->load->view('transaction/my_tickets', $data);
    }

    public function cancel($transaction_id) {
        // Ambil data transaksi
        $this->db->select('transactions.*, tickets.id as ticket_id, tickets.available_tickets');
        $this->db->from('transactions');
        $this->db->join('tickets', 'tickets.id = transactions.ticket_id');
        $this->db->where('transactions.id', $transaction_id);
        $this->db->where('transactions.user_id', $this->session->userdata('user_id'));
        $query = $this->db->get();
        
        if ($query->num_rows() === 0) {
            $this->session->set_flashdata('error', 'Transaksi tidak ditemukan!');
            redirect('tickets');
        }

        $transaction = $query->row_array();

        // Cek apakah transaksi masih pending atau paid
        if (!in_array($transaction['payment_status'], ['pending', 'paid'])) {
            $this->session->set_flashdata('error', 'Transaksi tidak dapat dibatalkan!');
            redirect('tickets');
        }

        // Mulai transaksi database
        $this->db->trans_start();

        // Update status transaksi menjadi cancelled
        $this->db->where('id', $transaction_id);
        $this->db->update('transactions', [
            'payment_status' => 'cancelled',
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // Kembalikan jumlah tiket yang tersedia hanya jika status sebelumnya adalah 'paid'
        if ($transaction['payment_status'] === 'paid') {
            $this->db->set('available_tickets', 'available_tickets + ' . $transaction['quantity'], FALSE);
            $this->db->where('id', $transaction['ticket_id']);
            $this->db->update('tickets');
        }

        // Selesai transaksi database
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata('error', 'Gagal membatalkan transaksi!');
        } else {
            $this->session->set_flashdata('success', 'Transaksi berhasil dibatalkan!');
        }

        redirect('tickets');
    }
} 
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tickets extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('event_model');
        
        // Cek apakah user sudah login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');
        $data['transactions'] = $this->event_model->get_transactions_by_user($user_id);
        $data['title'] = 'Tiket Saya - QuickTix';
        $this->load->view('tickets/index', $data);
    }
    
    public function print($transaction_id)
    {
        $user_id = $this->session->userdata('user_id');
        $this->db->select('transactions.*, tickets.event_name, tickets.event_type, tickets.location, tickets.date');
        $this->db->from('transactions');
        $this->db->join('tickets', 'tickets.id = transactions.ticket_id');
        $this->db->where('transactions.id', $transaction_id);
        $this->db->where('transactions.user_id', $user_id);
        $this->db->where('transactions.payment_status', 'paid');
        $query = $this->db->get();

        if ($query->num_rows() === 0) {
            show_404();
        }

        $data['transaction'] = $query->row_array();
        $data['title'] = 'Cetak Tiket - QuickTix';
        $this->load->view('tickets/print', $data);
    }

    public function detail($transaction_id) {
        $user_id = $this->session->userdata('user_id');
        
        // Ambil data transaksi
        $this->db->select('transactions.*, tickets.event_name, tickets.event_type, tickets.location, tickets.date');
        $this->db->from('transactions');
        $this->db->join('tickets', 'tickets.id = transactions.ticket_id');
        $this->db->where('transactions.id', $transaction_id);
        $this->db->where('transactions.user_id', $user_id);
        $query = $this->db->get();
        
        if ($query->num_rows() === 0) {
            $this->session->set_flashdata('error', 'Transaksi tidak ditemukan!');
            redirect('tickets');
        }

        $data['transaction'] = $query->row_array();
        $data['title'] = 'Detail Tiket - QuickTix';
        $this->load->view('tickets/detail', $data);
    }

    // Endpoint validasi QR code
    public function validate_qr()
    {
        $qr_data = $this->input->post('qr_data') ?: $this->input->get('qr_data');
        if (!$qr_data) {
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'QR code tidak ditemukan.']));
        }

        // Format: TICKET-<id>|<hash>
        $parts = explode('|', $qr_data);
        if (count($parts) !== 2) {
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Format QR code tidak valid.']));
        }
        $ticket_code = $parts[0];
        $hash = $parts[1];

        // Ambil ID transaksi
        if (strpos($ticket_code, 'TICKET-') !== 0) {
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Kode tiket tidak valid.']));
        }
        $transaction_id = intval(str_replace('TICKET-', '', $ticket_code));

        // Ambil secret key dari config
        $this->load->config('config');
        $secret = $this->config->item('qr_secret_key');
        $expected_hash = hash('sha256', $ticket_code . $secret);
        if ($hash !== $expected_hash) {
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'QR code tidak valid (hash mismatch).']));
        }

        // Cek status transaksi
        $this->db->where('id', $transaction_id);
        $transaction = $this->db->get('transactions')->row_array();
        if (!$transaction) {
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Transaksi tidak ditemukan.']));
        }
        if ($transaction['payment_status'] !== 'paid') {
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Tiket belum dibayar atau sudah dibatalkan.']));
        }
        if (!empty($transaction['is_used'])) {
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Tiket sudah pernah digunakan.']));
        }

        // Tandai tiket sebagai sudah digunakan
        $this->db->where('id', $transaction_id);
        $this->db->update('transactions', ['is_used' => 1, 'updated_at' => date('Y-m-d H:i:s')]);

        // Ambil nama event dan nama user
        $event = $this->db->get_where('tickets', ['id' => $transaction['ticket_id']])->row_array();
        $user = $this->db->get_where('users', ['id' => $transaction['user_id']])->row_array();
        $transaction['event_name'] = $event ? $event['event_name'] : '-';
        $transaction['full_name'] = $user ? $user['full_name'] : '-';

        // Tiket valid
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'status' => true,
                'message' => 'Tiket valid dan berhasil digunakan.',
                'transaction_id' => $transaction_id,
                'transaction' => $transaction
            ]));
    }

    // Halaman cek validasi QR (bisa diakses semua user)
    public function validate_qr_page()
    {
        $this->load->view('tickets/validate_qr');
    }
}
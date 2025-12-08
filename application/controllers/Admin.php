<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('event_model');
        $this->load->model('user_model');
        $this->load->library('session');
        $this->load->database();
        
        // Cek apakah user sudah login dan memiliki role admin
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
        
        if ($this->session->userdata('role') !== 'admin') {
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses ke halaman admin!');
            redirect('events/search');
        }
    }

    public function index() {
        // Dashboard admin
        $data['title'] = 'Dashboard Admin - QuickTix';
        
        // Statistik untuk dashboard
        $data['total_events'] = $this->db->count_all('tickets');
        $data['total_transactions'] = $this->db->count_all('transactions');
        $data['total_users'] = $this->db->count_all('users');
        $data['total_revenue'] = $this->db->select_sum('total_price')
                                         ->where('payment_status', 'paid')
                                         ->get('transactions')
                                         ->row()
                                         ->total_price ?? 0;
        
        // Transaksi terbaru
        $data['recent_transactions'] = $this->db->select('transactions.*, tickets.event_name, users.username')
                                               ->from('transactions')
                                               ->join('tickets', 'tickets.id = transactions.ticket_id')
                                               ->join('users', 'users.id = transactions.user_id')
                                               ->order_by('transactions.created_at', 'DESC')
                                               ->limit(5)
                                               ->get()
                                               ->result_array();
        
        $this->load->view('admin/dashboard', $data);
    }

    public function events() {
        // Halaman manajemen event/tiket
        $data['title'] = 'Manajemen Event - QuickTix';
        $data['events'] = $this->db->order_by('created_at', 'DESC')->get('tickets')->result_array();
        $this->load->view('admin/events', $data);
    }

    public function add_event() {
        $data['title'] = 'Tambah Event - QuickTix';
        
        if ($this->input->post()) {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('event_name', 'Nama Event', 'required');
            $this->form_validation->set_rules('event_type', 'Tipe Event', 'required');
            $this->form_validation->set_rules('location', 'Lokasi', 'required');
            $this->form_validation->set_rules('date', 'Tanggal', 'required');
            $this->form_validation->set_rules('price', 'Harga', 'required|numeric');
            $this->form_validation->set_rules('available_tickets', 'Jumlah Tiket', 'required|numeric');
            $this->form_validation->set_rules('description', 'Deskripsi', 'required');
            
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('admin/add_event', $data);
            } else {
                $event_data = array(
                    'event_name' => $this->input->post('event_name'),
                    'event_type' => $this->input->post('event_type'),
                    'location' => $this->input->post('location'),
                    'date' => $this->input->post('date'),
                    'price' => $this->input->post('price'),
                    'available_tickets' => $this->input->post('available_tickets'),
                    'description' => $this->input->post('description'),
                    'image_url' => $this->input->post('image_url') ?: 'uploads/default-event.jpg',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
                
                if ($this->db->insert('tickets', $event_data)) {
                    $this->session->set_flashdata('success', 'Event berhasil ditambahkan!');
                    redirect('admin/events');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menambahkan event!');
                    $this->load->view('admin/add_event', $data);
                }
            }
        } else {
            $this->load->view('admin/add_event', $data);
        }
    }

    public function edit_event($id) {
        $data['title'] = 'Edit Event - QuickTix';
        $data['event'] = $this->db->where('id', $id)->get('tickets')->row_array();
        
        if (!$data['event']) {
            $this->session->set_flashdata('error', 'Event tidak ditemukan!');
            redirect('admin/events');
        }
        
        if ($this->input->post()) {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('event_name', 'Nama Event', 'required');
            $this->form_validation->set_rules('event_type', 'Tipe Event', 'required');
            $this->form_validation->set_rules('location', 'Lokasi', 'required');
            $this->form_validation->set_rules('date', 'Tanggal', 'required');
            $this->form_validation->set_rules('price', 'Harga', 'required|numeric');
            $this->form_validation->set_rules('available_tickets', 'Jumlah Tiket', 'required|numeric');
            $this->form_validation->set_rules('description', 'Deskripsi', 'required');
            
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('admin/edit_event', $data);
            } else {
                $event_data = array(
                    'event_name' => $this->input->post('event_name'),
                    'event_type' => $this->input->post('event_type'),
                    'location' => $this->input->post('location'),
                    'date' => $this->input->post('date'),
                    'price' => $this->input->post('price'),
                    'available_tickets' => $this->input->post('available_tickets'),
                    'description' => $this->input->post('description'),
                    'image_url' => $this->input->post('image_url') ?: $data['event']['image_url'],
                    'status' => $this->input->post('status'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
                
                $this->db->where('id', $id);
                if ($this->db->update('tickets', $event_data)) {
                    $this->session->set_flashdata('success', 'Event berhasil diperbarui!');
                    redirect('admin/events');
                } else {
                    $this->session->set_flashdata('error', 'Gagal memperbarui event!');
                    $this->load->view('admin/edit_event', $data);
                }
            }
        } else {
            $this->load->view('admin/edit_event', $data);
        }
    }

    public function delete_event($id) {
        // Cek apakah ada transaksi terkait
        $transactions = $this->db->where('ticket_id', $id)->get('transactions')->num_rows();
        
        if ($transactions > 0) {
            $this->session->set_flashdata('error', 'Event tidak dapat dihapus karena masih ada transaksi terkait!');
        } else {
            if ($this->db->where('id', $id)->delete('tickets')) {
                $this->session->set_flashdata('success', 'Event berhasil dihapus!');
            } else {
                $this->session->set_flashdata('error', 'Gagal menghapus event!');
            }
        }
        
        redirect('admin/events');
    }

    public function transactions() {
        // Halaman manajemen transaksi
        $data['title'] = 'Manajemen Transaksi - QuickTix';
        
        $data['transactions'] = $this->db->select('transactions.*, tickets.event_name, users.username, users.full_name')
                                        ->from('transactions')
                                        ->join('tickets', 'tickets.id = transactions.ticket_id')
                                        ->join('users', 'users.id = transactions.user_id')
                                        ->order_by('transactions.created_at', 'DESC')
                                        ->get()
                                        ->result_array();
        
        $this->load->view('admin/transactions', $data);
    }

    public function update_transaction_status($id) {
        $status = $this->input->post('status');
        
        if (!in_array($status, ['pending', 'paid', 'cancelled'])) {
            $this->session->set_flashdata('error', 'Status tidak valid!');
            redirect('admin/transactions');
        }
        
        // Ambil data transaksi
        $transaction = $this->db->where('id', $id)->get('transactions')->row_array();
        
        if (!$transaction) {
            $this->session->set_flashdata('error', 'Transaksi tidak ditemukan!');
            redirect('admin/transactions');
        }
        
        // Mulai transaksi database
        $this->db->trans_start();
        
        // Update status transaksi
        $this->db->where('id', $id);
        $this->db->update('transactions', [
            'payment_status' => $status,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        
        // Jika status berubah dari paid ke cancelled, kembalikan tiket
        if ($transaction['payment_status'] === 'paid' && $status === 'cancelled') {
            $this->db->set('available_tickets', 'available_tickets + ' . $transaction['quantity'], FALSE);
            $this->db->where('id', $transaction['ticket_id']);
            $this->db->update('tickets');
        }
        
        // Jika status berubah dari cancelled ke paid, kurangi tiket
        if ($transaction['payment_status'] === 'cancelled' && $status === 'paid') {
            $this->db->set('available_tickets', 'available_tickets - ' . $transaction['quantity'], FALSE);
            $this->db->where('id', $transaction['ticket_id']);
            $this->db->update('tickets');
        }
        
        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata('error', 'Gagal memperbarui status transaksi!');
        } else {
            $this->session->set_flashdata('success', 'Status transaksi berhasil diperbarui!');
        }
        
        redirect('admin/transactions');
    }

    public function users() {
        // Halaman manajemen user
        $data['title'] = 'Manajemen User - QuickTix';
        
        // Ambil parameter filter
        $search = $this->input->get('search');
        $role = $this->input->get('role');
        $status = $this->input->get('status');
        
        // Query builder untuk filter
        $this->db->select('*');
        
        if ($search) {
            $this->db->group_start();
            $this->db->like('username', $search);
            $this->db->or_like('full_name', $search);
            $this->db->or_like('email', $search);
            $this->db->group_end();
        }
        
        if ($role) {
            $this->db->where('role', $role);
        }
        
        if ($status) {
            $this->db->where('status', $status);
        }
        
        $data['users'] = $this->db->order_by('created_at', 'DESC')->get('users')->result_array();
        $this->load->view('admin/users', $data);
    }

    public function edit_user($id) {
        $data['title'] = 'Edit User - QuickTix';
        $data['user'] = $this->db->where('id', $id)->get('users')->row_array();
        
        if (!$data['user']) {
            $this->session->set_flashdata('error', 'User tidak ditemukan!');
            redirect('admin/users');
        }
        
        if ($this->input->post()) {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]');
            $this->form_validation->set_rules('full_name', 'Nama Lengkap', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('phone', 'Telepon', 'required');
            $this->form_validation->set_rules('role', 'Role', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('admin/edit_user', $data);
            } else {
                $user_data = array(
                    'username' => $this->input->post('username'),
                    'full_name' => $this->input->post('full_name'),
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone'),
                    'role' => $this->input->post('role'),
                    'status' => $this->input->post('status'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
                
                // Jika password diisi, update password
                if ($this->input->post('password')) {
                    $user_data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                }
                
                $this->db->where('id', $id);
                if ($this->db->update('users', $user_data)) {
                    $this->session->set_flashdata('success', 'Data user berhasil diperbarui!');
                    redirect('admin/users');
                } else {
                    $this->session->set_flashdata('error', 'Gagal memperbarui data user!');
                    $this->load->view('admin/edit_user', $data);
                }
            }
        } else {
            $this->load->view('admin/edit_user', $data);
        }
    }

    public function toggle_user_status($id) {
        // Cek apakah user ada
        $user = $this->db->where('id', $id)->get('users')->row_array();
        
        if (!$user) {
            $this->session->set_flashdata('error', 'User tidak ditemukan!');
            redirect('admin/users');
        }
        
        // Cek apakah bukan user yang sedang login
        if ($id == $this->session->userdata('user_id')) {
            $this->session->set_flashdata('error', 'Anda tidak dapat mengubah status akun sendiri!');
            redirect('admin/users');
        }
        
        // Toggle status
        $new_status = $user['status'] == 'active' ? 'inactive' : 'active';
        
        $this->db->where('id', $id);
        if ($this->db->update('users', ['status' => $new_status, 'updated_at' => date('Y-m-d H:i:s')])) {
            $status_text = $new_status == 'active' ? 'diaktifkan' : 'dinonaktifkan';
            $this->session->set_flashdata('success', "User berhasil $status_text!");
        } else {
            $this->session->set_flashdata('error', 'Gagal mengubah status user!');
        }
        
        redirect('admin/users');
    }

    public function delete_user($id) {
        // Cek apakah user ada
        $user = $this->db->where('id', $id)->get('users')->row_array();
        
        if (!$user) {
            $this->session->set_flashdata('error', 'User tidak ditemukan!');
            redirect('admin/users');
        }
        
        // Cek apakah bukan user yang sedang login
        if ($id == $this->session->userdata('user_id')) {
            $this->session->set_flashdata('error', 'Anda tidak dapat menghapus akun sendiri!');
            redirect('admin/users');
        }
        
        // Cek apakah ada transaksi terkait
        $transactions = $this->db->where('user_id', $id)->get('transactions')->num_rows();
        
        if ($transactions > 0) {
            $this->session->set_flashdata('error', 'User tidak dapat dihapus karena masih ada transaksi terkait!');
            redirect('admin/users');
        }
        
        // Hapus user
        if ($this->db->where('id', $id)->delete('users')) {
            $this->session->set_flashdata('success', 'User berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus user!');
        }
        
        redirect('admin/users');
    }

    public function validate_qr() {
        // Halaman validasi QR untuk admin
        $data['title'] = 'Validasi QR Tiket - QuickTix';
        $this->load->view('admin/validate_qr', $data);
    }

    public function get_images() {
        // Method untuk mengambil daftar gambar dari folder uploads
        $upload_path = './uploads/';
        $images = array();
        
        // Cek apakah folder uploads ada
        if (is_dir($upload_path)) {
            $files = scandir($upload_path);
            
            foreach ($files as $file) {
                // Skip . dan ..
                if ($file === '.' || $file === '..') {
                    continue;
                }
                
                // Cek apakah file adalah gambar
                $file_path = $upload_path . $file;
                if (is_file($file_path)) {
                    $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                    $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif', 'webp');
                    
                    if (in_array($extension, $allowed_extensions)) {
                        $images[] = $file;
                    }
                }
            }
        }
        
        // Return JSON response
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('images' => $images)));
    }
} 
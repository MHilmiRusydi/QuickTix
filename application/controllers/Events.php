<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('event_model');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->database();
    }

    public function index() {
        // Redirect ke halaman search
        redirect('events/search');
    }

    public function search() {
        $type = $this->input->get('type') ? $this->input->get('type') : 'all';
        $search_query = $this->input->get('q') ? $this->input->get('q') : '';
        $page = $this->input->get('page') ? (int)$this->input->get('page') : 1;
        
        // Validasi page number
        if ($page < 1) {
            $page = 1;
        }
        
        $per_page = 15;
        $offset = ($page - 1) * $per_page;
        
        // Ambil total records untuk pagination
        $total_records = $this->event_model->get_events_count($type, $search_query);
        $total_pages = ceil($total_records / $per_page);
        
        // Ambil data events dengan pagination
        $events = $this->event_model->get_events_paginated($type, $search_query, $per_page, $offset);
        
        // Untuk sistem demo, available_for_booking sama dengan available_tickets
        foreach ($events as &$event) {
            $event['available_for_booking'] = $event['available_tickets'];
        }
        
        // Buat pagination manual
        $pagination = $this->create_manual_pagination($page, $total_pages, $type, $search_query);
        
        $data['events'] = $events;
        $data['pagination'] = $pagination;
        $data['total_records'] = $total_records;
        $data['current_page'] = $page;
        $data['per_page'] = $per_page;
        $data['title'] = 'Cari Event - QuickTix';
        $this->load->view('events/search', $data);
    }
    
    private function create_manual_pagination($current_page, $total_pages, $type, $search_query) {
        if ($total_pages <= 1) {
            return '';
        }
        
        $base_url = base_url('events/search');
        $query_params = [];
        
        if ($type && $type !== 'all') {
            $query_params[] = 'type=' . urlencode($type);
        }
        
        if ($search_query) {
            $query_params[] = 'q=' . urlencode($search_query);
        }
        
        $query_string = !empty($query_params) ? '?' . implode('&', $query_params) . '&' : '?';
        
        $pagination = '<div class="pagination-container">';
        $pagination .= '<nav class="pagination-nav" aria-label="Navigasi halaman">';
        $pagination .= '<ul class="pagination-list">';
        
        // First page button
        if ($current_page > 1) {
            $pagination .= '<li class="pagination-item">';
            $pagination .= '<a href="' . $base_url . $query_string . 'page=1" class="pagination-link pagination-first" title="Halaman Pertama">';
            $pagination .= '<i class="fas fa-angle-double-left"></i>';
            $pagination .= '</a></li>';
        }
        
        // Previous button
        if ($current_page > 1) {
            $prev_page = $current_page - 1;
            $pagination .= '<li class="pagination-item">';
            $pagination .= '<a href="' . $base_url . $query_string . 'page=' . $prev_page . '" class="pagination-link pagination-prev" title="Halaman Sebelumnya">';
            $pagination .= '<i class="fas fa-angle-left"></i>';
            $pagination .= '</a></li>';
        }
        
        // Page numbers
        $start_page = max(1, $current_page - 2);
        $end_page = min($total_pages, $current_page + 2);
        
        // Show first page if not in range
        if ($start_page > 1) {
            $pagination .= '<li class="pagination-item">';
            $pagination .= '<a href="' . $base_url . $query_string . 'page=1" class="pagination-link">1</a>';
            $pagination .= '</li>';
            if ($start_page > 2) {
                $pagination .= '<li class="pagination-item pagination-ellipsis">';
                $pagination .= '<span class="pagination-ellipsis-text">...</span>';
                $pagination .= '</li>';
            }
        }
        
        for ($i = $start_page; $i <= $end_page; $i++) {
            if ($i == $current_page) {
                $pagination .= '<li class="pagination-item">';
                $pagination .= '<span class="pagination-link pagination-current" aria-current="page">' . $i . '</span>';
                $pagination .= '</li>';
            } else {
                $pagination .= '<li class="pagination-item">';
                $pagination .= '<a href="' . $base_url . $query_string . 'page=' . $i . '" class="pagination-link">' . $i . '</a>';
                $pagination .= '</li>';
            }
        }
        
        // Show last page if not in range
        if ($end_page < $total_pages) {
            if ($end_page < $total_pages - 1) {
                $pagination .= '<li class="pagination-item pagination-ellipsis">';
                $pagination .= '<span class="pagination-ellipsis-text">...</span>';
                $pagination .= '</li>';
            }
            $pagination .= '<li class="pagination-item">';
            $pagination .= '<a href="' . $base_url . $query_string . 'page=' . $total_pages . '" class="pagination-link">' . $total_pages . '</a>';
            $pagination .= '</li>';
        }
        
        // Next button
        if ($current_page < $total_pages) {
            $next_page = $current_page + 1;
            $pagination .= '<li class="pagination-item">';
            $pagination .= '<a href="' . $base_url . $query_string . 'page=' . $next_page . '" class="pagination-link pagination-next" title="Halaman Selanjutnya">';
            $pagination .= '<i class="fas fa-angle-right"></i>';
            $pagination .= '</a></li>';
        }
        
        // Last page button
        if ($current_page < $total_pages) {
            $pagination .= '<li class="pagination-item">';
            $pagination .= '<a href="' . $base_url . $query_string . 'page=' . $total_pages . '" class="pagination-link pagination-last" title="Halaman Terakhir">';
            $pagination .= '<i class="fas fa-angle-double-right"></i>';
            $pagination .= '</a></li>';
        }
        
        $pagination .= '</ul>';
        $pagination .= '</nav>';
        $pagination .= '</div>';
        
        return $pagination;
    }

    public function get_detail($id) {
        $event = $this->event_model->get_event_by_id($id);
        if ($event) {
            $event['available_for_booking'] = $event['available_tickets'];
        }
        echo json_encode($event);
    }

    public function buy() {
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Silakan login terlebih dahulu untuk membeli tiket.');
            redirect('auth/login');
        }

        // Validasi input
        $this->form_validation->set_rules('ticket_id', 'Tiket', 'required|numeric');
        $this->form_validation->set_rules('quantity', 'Jumlah', 'required|numeric|greater_than[0]');
        $this->form_validation->set_rules('payment_method', 'Metode Pembayaran', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('events/search');
        }

        $ticket_id = $this->input->post('ticket_id');
        $quantity = $this->input->post('quantity');
        $payment_method = $this->input->post('payment_method');
        
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
            // Jika transaksi gagal
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat memproses pembelian. Silakan coba lagi.');
            redirect('events/search');
        } else {
            // Jika transaksi berhasil
            $this->session->set_flashdata('success', 'Pembelian tiket berhasil! Tiket Anda telah dikonfirmasi.');
            
            // Redirect ke halaman detail transaksi
            redirect('tickets/detail/' . $transaction_id);
        }
    }
}
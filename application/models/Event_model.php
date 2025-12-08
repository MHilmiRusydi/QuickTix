<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_events($type = null) {
        $this->db->select('*');
        $this->db->from('tickets');
        $this->db->where('status', 'active');
        
        if ($type && $type !== 'all') {
            $this->db->where('event_type', $type);
        }
        
        $this->db->order_by('date', 'ASC');
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function get_events_count($type = null, $search_query = null) {
        $this->db->select('COUNT(*) as total');
        $this->db->from('tickets');
        $this->db->where('status', 'active');
        $this->db->where('event_type !=', 'Bioskop');
        
        if ($type && $type !== 'all') {
            $this->db->where('event_type', $type);
        }
        
        if ($search_query) {
            $this->db->like('event_name', $search_query);
        }
        
        $query = $this->db->get();
        $result = $query->row();
        
        return $result->total;
    }

    public function get_events_paginated($type = null, $search_query = null, $limit = 15, $offset = 0) {
        $this->db->select('*');
        $this->db->from('tickets');
        $this->db->where('status', 'active');
        $this->db->where('event_type !=', 'Bioskop');
        
        if ($type && $type !== 'all') {
            $this->db->where('event_type', $type);
        }
        
        if ($search_query) {
            $this->db->like('event_name', $search_query);
        }
        
        $this->db->order_by('date', 'ASC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function get_event_by_id($id) {
        $this->db->select('*');
        $this->db->from('tickets');
        $this->db->where('id', $id);
        $this->db->where('status', 'active');
        $query = $this->db->get();
        
        return $query->row_array();
    }

    public function create_transaction($data) {
        // Tambahkan created_at dan updated_at
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        
        // Insert ke tabel transactions
        $this->db->insert('transactions', $data);
        
        return $this->db->insert_id();
    }

    public function get_transactions_by_user($user_id) {
        $this->db->select('transactions.*, tickets.event_name, tickets.event_type, tickets.location, tickets.date');
        $this->db->from('transactions');
        $this->db->join('tickets', 'tickets.id = transactions.ticket_id');
        $this->db->where('transactions.user_id', $user_id);
        $this->db->order_by('transactions.created_at', 'DESC');
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function update_transaction_status($transaction_id, $status) {
        // Ambil data transaksi
        $transaction = $this->db->where('id', $transaction_id)->get('transactions')->row_array();
        
        if (!$transaction) {
            return false;
        }
        
        // Update status transaksi
        $this->db->where('id', $transaction_id);
        $this->db->update('transactions', [
            'payment_status' => $status,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        
        return $this->db->affected_rows() > 0;
    }

    public function update_ticket_availability($ticket_id, $new_quantity) {
        $this->db->where('id', $ticket_id);
        $this->db->update('tickets', [
            'available_tickets' => $new_quantity,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        
        return $this->db->affected_rows() > 0;
    }

    // Method untuk mendapatkan jumlah tiket yang sudah dipesan (pending)
    public function get_pending_tickets_count($ticket_id) {
        $result = $this->db->select_sum('quantity')
                          ->where('ticket_id', $ticket_id)
                          ->where('payment_status', 'pending')
                          ->get('transactions')
                          ->row();
        
        return $result->quantity ?? 0;
    }

    // Method untuk mendapatkan jumlah tiket yang tersedia untuk dipesan
    public function get_available_tickets_for_booking($ticket_id) {
        $ticket = $this->get_event_by_id($ticket_id);
        if (!$ticket) {
            return 0;
        }
        
        $pending_quantity = $this->get_pending_tickets_count($ticket_id);
        return $ticket['available_tickets'] - $pending_quantity;
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function register($data) {
        // Hash password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        
        // Insert user data
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    public function login($email, $password) {
        // Get user by email
        $this->db->where('email', $email);
        $this->db->where('status', 'active');
        $query = $this->db->get('users');
        
        if ($query->num_rows() == 1) {
            $user = $query->row();
            
            // Verify password
            if (password_verify($password, $user->password)) {
                // Create session
                $session_data = array(
                    'user_id' => $user->id,
                    'username' => $user->username,
                    'email' => $user->email,
                    'role' => $user->role,
                    'logged_in' => TRUE
                );
                
                $this->session->set_userdata($session_data);
                return true;
            }
        }
        return false;
    }

    public function create_session($user_id) {
        $token = bin2hex(random_bytes(32));
        $data = array(
            'user_id' => $user_id,
            'session_token' => $token,
            'ip_address' => $this->input->ip_address(),
            'user_agent' => $this->input->user_agent(),
            'expires_at' => date('Y-m-d H:i:s', strtotime('+24 hours'))
        );
        
        $this->db->insert('user_sessions', $data);
        return $token;
    }

    public function check_session($token) {
        $this->db->where('session_token', $token);
        $this->db->where('expires_at >', date('Y-m-d H:i:s'));
        $query = $this->db->get('user_sessions');
        
        return $query->num_rows() > 0;
    }

    public function logout() {
        // Remove session data
        $this->session->sess_destroy();
        
        // Remove session from database
        if ($this->session->userdata('user_id')) {
            $this->db->where('user_id', $this->session->userdata('user_id'));
            $this->db->delete('user_sessions');
        }
    }

    public function get_user_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        return $query->row();
    }

    public function update_user($id, $data) {
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }
} 
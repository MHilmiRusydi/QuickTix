<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('session');
        
        // Cek apakah user sudah login
        if(!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }
    
    public function index() {
        $data['title'] = 'Profil Saya';
        $data['user'] = $this->user_model->get_user_by_id($this->session->userdata('user_id'));
        
        $this->load->view('templates/header', $data);
        $this->load->view('profile/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function settings() {
        $data['title'] = 'Pengaturan Profil';
        $data['user'] = $this->user_model->get_user_by_id($this->session->userdata('user_id'));
        
        $this->load->view('templates/header', $data);
        $this->load->view('profile/settings', $data);
        $this->load->view('templates/footer');
    }
    
    public function update() {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        
        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('profile/settings');
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email')
            );
            
            // Jika ada password baru
            if($this->input->post('new_password')) {
                $this->form_validation->set_rules('new_password', 'Password Baru', 'required|min_length[6]');
                $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[new_password]');
                
                if($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata('error', validation_errors());
                    redirect('profile/settings');
                }
                
                $data['password'] = password_hash($this->input->post('new_password'), PASSWORD_DEFAULT);
            }
            
            if($this->user_model->update_user($this->session->userdata('user_id'), $data)) {
                $this->session->set_flashdata('success', 'Profil berhasil diperbarui');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui profil');
            }
            
            redirect('profile/settings');
        }
    }
} 
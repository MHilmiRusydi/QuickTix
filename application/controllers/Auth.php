<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index() {
        // Redirect ke halaman login jika belum login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
        redirect('events/search');
    }

    public function login() {
        // Jika sudah login, redirect ke events/search
        if ($this->session->userdata('logged_in')) {
            redirect('events/search');
        }

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Login - QuickTix';
            $this->load->view('auth/login', $data);
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            if ($this->user_model->login($email, $password)) {
                $this->session->set_flashdata('success', 'Login berhasil!');
                redirect('events/search');
            } else {
                $this->session->set_flashdata('error', 'Email atau password salah!');
                redirect('auth/login');
            }
        }
    }

    public function register() {
        // Jika sudah login, redirect ke dashboard
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }

        $this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[password]');
        $this->form_validation->set_rules('full_name', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('phone', 'Nomor Telepon', 'required|numeric');

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Register - QuickTix';
            $this->load->view('auth/register', $data);
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'full_name' => $this->input->post('full_name'),
                'phone' => $this->input->post('phone'),
                'status' => 'active',
                'role' => 'user',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );

            if ($this->user_model->register($data)) {
                $this->session->set_flashdata('success', 'Registrasi berhasil! Silakan login.');
                redirect('auth/login');
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan saat registrasi!');
                redirect('auth/register');
            }
        }
    }

    public function logout() {
        $this->user_model->logout();
        $this->session->set_flashdata('success', 'Logout berhasil!');
        redirect('home');
    }
} 
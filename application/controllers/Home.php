<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
    }

    public function index() {
        $data['title'] = 'QuickTix - Tiket Cepat, Tanpa Ribet!';
        $this->load->view('templates/header', $data);
        $this->load->view('landing_page', $data);
        $this->load->view('templates/footer');
    }
}
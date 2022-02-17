<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'SIAP | Universitas Banten Jaya';
        $this->load->view('templates/home_header', $data);
        $this->load->view('templates/home_sidebar');
        $this->load->view('templates/home_topbar');
        $this->load->view('home/index');
        $this->load->view('templates/home_footer');
    }
}

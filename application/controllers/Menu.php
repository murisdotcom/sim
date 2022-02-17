<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('Menu_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Pengelolaan Menu';
        $data['user'] = $this->db->get_where('user1', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', 'Menu baru berhasil ditambahkan!');
            redirect('menu');
        }
    }

    public function deleteMenu($id)
    {
        $this->load->model('Menu_model');
        $this->Menu_model->deleteMenu($id);
        $this->session->set_flashdata('message', 'Menu berhasil dihapus!');
        redirect('menu');
    }
    // public function addUserMenu()
    // {
    //     $data['title'] = 'Add menu';
    //     $data['user'] = $this->db->get_where('user1', ['email' =>
    //     $this->session->userdata('email')])->row_array();

    //     $data['menu'] = $this->db->get('user_menu')->result_array();

    //     $this->form_validation->set_rules('menu', 'Menu', 'required');
    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('menu/addUserMenu', $data);
    //         $this->load->view('templates/footer');
    //     } else {
    //         $this->Menu_model->addUserMenu();
    //         // $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
    //         // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
    //         redirect('menu');
    //     }
    // }
    public function editMenu($id)
    {
        $data['title'] = 'Edit Menu';
        $data['Menu'] = $this->Menu_model->getMenuById($id);

        $data['user'] = $this->db->get_where('user1', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/editMenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->editMenu();
            $this->session->set_flashdata('message', 'Menu berhasil diubah!');
            redirect('menu');
        }
    }
    public function submenu()
    {
        $data['title'] = 'Pengelolaan Submenu';
        $data['user'] = $this->db->get_where('user1', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['subMenu'] = $this->Menu_model->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', 'Submenu baru berhasil ditambahkan!');
            redirect('menu/submenu');
        }
    }
    public function deleteSubMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
        $this->session->set_flashdata('message', 'Submenu berhasil dihapus!');
        redirect('menu/submenu');
    }

    public function editSubMenu($id)
    {
        $data['title'] = 'Edit Submenu';
        $data['user'] = $this->db->get_where('user1', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['subMenu'] = $this->Menu_model->getSubMenuById($id);

        // $data['menu_id'] = $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/editSubMenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->editSubMenu();
            $this->session->set_flashdata('message', 'Submenu berhasil diubah!');
            redirect('menu/submenu');
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('User_model');
    }
    public function index()
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->db->get_where('user1', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function editProfile()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user1', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['majors'] = ['Teknik Sipil', 'Teknik Industri', 'Teknik Lingkungan', 'Sistem Informasi', 'Teknik Informatika', 'Manajemen Informatika', 'Komputerisasi Akuntansi', 'Pendidikan PKN', 'Pendidikan Akuntansi', 'Pendidikan Bahasa Inggris', 'Kewirausahaan', 'Manajemen Retail', 'Administrasi Kesehatan'];

        $data['strata'] = ['DIII', 'S1', 'S2'];

        $this->form_validation->set_rules('name', 'Fullname', 'required|trim');
        $this->form_validation->set_rules('phone_number', 'Phone_number', 'required|trim|numeric|max_length[13]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/editprofile', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $nim = $this->input->post('nim');
            $majors = $this->input->post('majors');
            $strata = $this->input->post('strata');
            $phone_number = $this->input->post('phone_number');
            $email = $this->input->post('email');

            //cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|img|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->set('nim', $nim);
            $this->db->set('majors', $majors);
            $this->db->set('strata', $strata);
            $this->db->set('phone_number', $phone_number);
            $this->db->where('email', $email);
            $this->db->update('user1');

            $this->session->set_flashdata('message', 'Profil berhasil diupdate!');
            redirect('user');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Edit Password';
        $data['user'] = $this->db->get_where('user1', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[6]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[6]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password saat ini salah!</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password saat ini!</div>');
                    redirect('user/changepassword');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user1');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }

    public function Search()
    {
        $data['title'] = 'Pencarian';
        $data['user'] = $this->db->get_where('user1', ['email' =>
        $this->session->userdata('email')])->row_array();

        // ambil data keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->set_userdata('keyword');
        }

        // Sebagian Config sudah dipindahkan ke config->pagination.php
        $config['base_url'] = base_url('user/search');
        $config['num_link'] = 5;

        //Styling Pagination
        $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        $this->db->like('name', $data['keyword']);
        $this->db->or_like('majors', $data['keyword']);
        $this->db->or_like('strata', $data['keyword']);
        $this->db->or_like('faculty', $data['keyword']);
        $this->db->from('user1');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 100;

        // Initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);

        //admin hidden
        // $this->db->where('id !=', 7);

        $data['member'] = $this->User_model->getMember($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/search', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail';
        $data['user'] = $this->db->get_where('user1', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['member'] = $this->User_model->getMemberById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/detail', $data);
        $this->load->view('templates/footer');
    }

    public function Laporan()
    {
        $data['title'] = 'Identitas Laporan';
        $data['user'] = $this->db->get_where('user1', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/laporan', $data);
        $this->load->view('templates/footer');
    }

    public function Editlaporan()
    {
        $data['title'] = 'Identitas Laporan';
        $data['user'] = $this->db->get_where('user1', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('title', 'Title', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/editlaporan', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $title = $this->input->post('title');
            $author = $this->input->post('author');
            $abstrack = $this->input->post('abstrack');
            $faculty = $this->input->post('faculty');
            $majors = $this->input->post('majors');
            $strata = $this->input->post('strata');
            $file_name = $this->input->post('file_name');
            $publication_year = $this->input->post('publication_year');
            $input_date = $this->input->post('input_date');

            //cek jika ada gambar yang akan diupload
            $upload_file_name = $_FILES['file_name']['file_name'];

            if ($upload_file_name) {
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/thesis/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file_name')) {
                    $new_file_name = $this->upload->data('file_name');
                    $this->db->set('file_name', $new_file_name);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('title', $title);
            $this->db->set('author', $author);
            $this->db->set('abstrack', $abstrack);
            $this->db->set('faculty', $faculty);
            $this->db->set('majors', $majors);
            $this->db->set('strata', $strata);
            $this->db->set('file_name', $file_name);
            $this->db->set('publication_year', $publication_year);
            $this->db->set('input_date', $input_date);
            $this->db->where('id', $id);
            $this->db->update('thesis');

            $this->session->set_flashdata('message', 'Berkas berhasil diupload!');
            redirect('user/laporan');
        }
    }

    public function openPdf($PDFfilename)
    {
        $location = 'assets/thesis/' . $PDFfilename;
        $pdf = file_get_contents($location);

        header('Content-Type: application/pdf');
        header('Cache-Control: public, must-revalidate, max-age=0'); // HTTP/1.1
        header('Pragma: public');
        header('Expires: Sat, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Content-Length: ' . strlen($pdf));
        header('Content-Disposition: inline; filename="' . basename($location) . '";');
        ob_clean();
        flush();
        echo $pdf;
    }
}

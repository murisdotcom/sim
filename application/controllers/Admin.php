<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('Admin_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user1', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user1', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user1', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/roleaccess', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', 'Akses berhasil diubah!');
    }

    public function member()
    {
        $data['title'] = 'Data Anggota';
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
        $this->db->like('name', $data['keyword']);
        $this->db->or_like('nim', $data['keyword']);
        $this->db->or_like('majors', $data['keyword']);
        $this->db->or_like('strata', $data['keyword']);
        $this->db->or_like('phone_number', $data['keyword']);
        $this->db->or_like('email', $data['keyword']);
        $this->db->from('user1');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 100;

        // Initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);

        //admin hidden
        $this->db->where('id !=', 7);

        $data['member'] = $this->Admin_model->getMember($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/member', $data);
        $this->load->view('templates/footer');
    }

    public function deleteMember($id)
    {
        $this->Admin_model->deleteMember($id);
        $this->session->set_flashdata('message', 'Data anggota berhasil dihapus!');
        redirect('admin/member');
    }

    public function editMember($id)
    {
        $data['title'] = 'Edit data anggota';
        $data['user'] = $this->db->get_where('user1', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['member'] = $this->Admin_model->getMemberById($id);

        $data['majors'] = ['Teknik Sipil', 'Teknik Industri', 'Teknik Lingkungan', 'Sistem Informasi', 'Teknik Informatika', 'Manajemen Informatika', 'Komputerisasi Akuntansi', 'Pendidikan PKN', 'Pendidikan Akuntansi', 'Pendidikan Bahasa Inggris', 'Kewirausahaan', 'Manajemen Retail', 'Administrasi Kesehatan'];
        $data['strata'] = ['DIII', 'S1', 'S2'];


        $this->form_validation->set_rules('name', 'Fullname', 'required|trim');
        $this->form_validation->set_rules('nim', 'Nim', 'required|trim|numeric|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('phone_number', 'Phone_number', 'required|trim|numeric|max_length[13]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/editmember', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
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
            $this->db->set('email', $email);
            $this->db->where('id', $id);
            $this->db->update('user1');

            $this->session->set_flashdata('message', 'Data anggota berhasil diperbarui!');
            redirect('admin/member');
        }
    }

    public function CreateAccount()
    {
        $data['user'] = $this->db->get_where('user1', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('nim', 'Nim', 'required|trim|numeric|is_unique[user1.nim]', [
            'is_unique' => 'Npm sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('majors', 'Majors', 'required|trim');
        $this->form_validation->set_rules('strata', 'Strata', 'required|trim');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|trim|numeric|max_length[13]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user1.email]', [
            'is_unique' => 'Email ini sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Kata sandi tidak sesuai!',
            'min_length' => 'Kata sandi terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registrasi';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/createAccount');
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'nim' => htmlspecialchars($this->input->post('nim', true)),
                'majors' => htmlspecialchars($this->input->post('majors', true)),
                'strata' => htmlspecialchars($this->input->post('strata', true)),
                'phone_number' => htmlspecialchars($this->input->post('phone_number', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.JPG',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 0,
                'date_created' => time()
            ];

            // siapkan token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('user1', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', 'Akun berhasil dibuat. Mohon aktivasi akun anda!');
            redirect('admin/member');
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'siapunbaja@gmail.com',
            'smtp_pass' => 'zals@.com',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('siapunbaja@gmail.com', 'Sistem Informasi Administrasi Perpustakaan | UNBAJA');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify you account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->db->get_where('user1', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user1');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' Aktivasi berhasil! Silahkan login.</div>');
                    redirect('auth');
                } else {
                    $this->db->delete('user1', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun anda gagal! Verifikasi melebihi batas waktu.</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun anda gagal! Verifikasi salah.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun anda gagal! Email salah.</div>');
            redirect('auth');
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Detail';
        $data['user'] = $this->db->get_where('user1', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['member'] = $this->Admin_model->getMemberById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detail', $data);
        $this->load->view('templates/footer');
    }

    public function OnOff($id, $active)
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user1', ['email' =>
        $this->session->userdata('email')])->row_array();

        if ($active == 0) {
            $this->db->where('id', $id);
            $this->db->update('user1', ['is_active' => 1]);
        } else {
            $this->db->where('id', $id);
            $this->db->update('user1', ['is_active' => 0]);
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
        redirect('admin/member');
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

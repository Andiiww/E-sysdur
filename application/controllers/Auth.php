<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Portal Sisdur - Login";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            //validation success
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('t_user', ['email' => $email])->row_array();

        //if user is not null
        if ($user) {
            //user is aktive
            if ($user['is_active'] == 1) {
                //check password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'username' => $user['name'],
                        'role_id' => $user['role_id'],
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('Dashboard');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
                }
            } elseif ($user['is_active'] == 0) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'username' => $user['name'],
                        'role_id' => $user['role_id'],
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('Dashboard');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
                redirect('auth');
            }
        } else {
            //user is null

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not Registered!</div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('divisi', 'Divisi', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[t_user.email]', [
            'is_unique' => 'This email has already registered!',
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password to short!',
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Create an Account";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/footer');
        } else {
            //simpan role user
            $dataAkses = [
                'role' => htmlspecialchars($this->input->post('name', true)),
            ];

            $this->db->insert('user_role', $dataAkses);
            $idRole = $this->db->insert_id(); //cara ngambil id auto increment di table setelah insert terahkir

            //simpan user
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'divisi' => htmlspecialchars($this->input->post('divisi', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => $idRole,
                'is_active' => 1,
                'date_created' => date('d/m/Y'),
            ];

            $this->db->insert('t_user', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please Login</div>');
            redirect('auth/registration');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been loogged out!</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/bloked');
    }
}

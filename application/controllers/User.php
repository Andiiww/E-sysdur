<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function EditPassword()
    {
        $dataUser = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('NewPassword', 'Password', 'required|trim|min_length[5]|matches[NewPasswordVerification]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password to short!',
        ]);
        $this->form_validation->set_rules('NewPasswordVerification', 'Password', 'required|trim|matches[NewPassword]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Ubah Password';
            $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/ubah_password', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'password' => password_hash($this->input->post('NewPassword'), PASSWORD_DEFAULT),
            );

            if ($this->User_model->update(array('id' => $dataUser['id']), $data) > 0) {
                $message['status'] = 'success';

            } else {
                $message['status'] = 'failed';

            };

            $this->output->set_content_type('application/json')->set_output(json_encode($message));
        }
    }

    public function EditPasswordView()
    {
        $data['title'] = 'Ubah Password';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/ubah_password', $data);
        $this->load->view('templates/footer');
    }
}

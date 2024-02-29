<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Role_model');
        $this->load->model('Admin_model');
        is_logged_in();
    }

    public function role()
    {
        $data['title'] = 'User Management';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();

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
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1); //where disini untuk menghindari super admin di tampilkan di admin yg lain
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function GetAccess($idRole)
    {
        $dataRole = $this->Role_model->getdataById($idRole);

        $data = array(
            'crud_access' => $dataRole->crud_access,
        );

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function ChageAksesDoc()
    {
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $idRole = $this->input->post('idRole');

        $data = array(
            'crud_access' => $this->input->post('crudAccess'),
        );

        if ($this->Role_model->update(array('id' => $idRole), $data) >= 0) {
            // $data = array(
            //     'type' => 'Update',
            //     'data_origin' => 'Cabang',
            //     'date' => date('Y-m-d H:i:s'),
            //     'data' => $this->input->post('namacabang'),
            //     'user' => $dataUser['name'],
            // );

            // $this->Log_model->create($data); //insert log data

            $message = [
                'status' => 'success',
                'responseText' => 'Data Berhasil di Ubah',
            ];
        } else {
            $message = [
                'status' => 'error',
                'responseText' => 'Data Gagal di Ubah',
            ];
        };

        $this->output->set_content_type('application/json')->set_output(json_encode($message));
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id,
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access changed!</div>');
    }

    public function ambilDataRole()
    {
        if ($this->input->is_ajax_request() == true) {
            $this->load->model('Role_model', 'getRole');
            $list = $this->getRole->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {

                $no++;
                $row = array();

                //tombol edit
                $btn = "<a type=\"button\" class=\"btn btn-sm btn-outline-warning\" title=\"Edit Access\" onclick=\"editAccess('" . $field->id . "')\"><i class=\"fas fa-user-check\"></i></a> ";
                // $btn .= "<a type=\"button\" class=\"btn btn-sm btn-outline-success\" title=\"Edit Role\" onclick=\"editRole('" . $field->id . "')\"><i class=\"fas fa-edit\"></i></i></a> ";
                $btn .= "<a type=\"button\" class=\"btn btn-sm btn-outline-danger\" title=\"Delete\" onclick=\"hapusData(" . $field->id . ", '" . $field->role . "')\"><i class=\"fas fa-trash\"></i></a>";

                $row[] = $no;
                $row[] = $field->role;
                $row[] = $btn;
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->getRole->count_all(),
                "recordsFiltered" => $this->getRole->count_filtered(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }

    public function delete()
    {
        if ($this->input->is_ajax_request() == true) {
            $id = $this->input->post('id', true);
            $name = $this->input->post('name', true);

            $delete = $this->Role_model->delete($id);
            $deleteUser = $this->Admin_model->delete($name);

            if ($deleteUser) {
                $msg = [
                    'success' => 'Data Berhasil dihapus',
                ];
            }

            echo json_encode($msg);
        }
    }
}

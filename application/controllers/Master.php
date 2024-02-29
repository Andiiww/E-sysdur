<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Jenis Document';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/index', $data);
        $this->load->view('templates/footer');
    }

    public function divisi()
    {
        $data['title'] = 'Data Divisi';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/divisi', $data);
        $this->load->view('templates/footer');
    }

    public function ambilData()
    {
        if ($this->input->is_ajax_request() == true) {
            $this->load->model('Menu_model', 'getMenu');
            $list = $this->getMenu->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {

                $no++;
                $row = array();

                //btn
                $btn = "<a type=\"button\" class=\"btn btn-sm btn-outline-success\" title=\"Edit Submenu\" onclick=\"byid('" . $field->id . "', 'edit')\"><i class=\"fas fa-edit\"></i></i></a> ";
                $btn .= "<a type=\"button\" class=\"btn btn-sm btn-outline-danger\" title=\"Delete\" onclick=\"hapusData(" . $field->id . ", '" . $field->menu . "')\"><i class=\"fas fa-trash\"></i></a> ";

                $row[] = $no;
                $row[] = $field->menu;
                $row[] = $btn;
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->getMenu->count_all(),
                "recordsFiltered" => $this->getMenu->count_filtered(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }

    public function add()
    {
        $data = [
            'menu' => htmlspecialchars($this->input->post('menu'))
        ];

        if ($this->Menu_model->create($data) > 0) {
            $message['status'] = 'success';
        } else {
            $message['status'] = 'failed';
        };

        $this->output->set_content_type('application/json')->set_output(json_encode($message));
    }

    public function byid($id)
    {
        $data = $this->Menu_model->getdataById($id);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function update()
    {
        $data = [
            'menu' => htmlspecialchars($this->input->post('menu'))
        ];

        if ($this->Menu_model->update(array('id' => $this->input->post('id')), $data) > 0) {
            $message['status'] = 'success';
        } else {
            $message['status'] = 'failed';
        };

        $this->output->set_content_type('application/json')->set_output(json_encode($message));
    }

    public function delete()
    {
        if ($this->input->is_ajax_request() == true) {
            $id = $this->input->post('id', true);

            $delete = $this->Menu_model->delete($id);

            if ($delete) {
                $msg = [
                    'success' => 'Data Berhasil dihapus'
                ];
            }

            echo json_encode($msg);
        }
    }

    // submenu
    public function submenu()
    {
        // Load Model
        $this->load->model('Menu_model', 'menu');

        $data['title'] = 'Submenu management';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
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
                'icon' => 'fas fa-fw fa-folder-open',
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!</div>');
            redirect('menu/submenu');
        }
    }

    public function ambilSubMenu()
    {
        if ($this->input->is_ajax_request() == true) {
            $this->load->model('Submenu_model', 'getSubMenu');
            $list = $this->getSubMenu->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {
                $status = $field->is_active;
                if (!$status == 0) {
                    $status = 'Aktif';
                } else {
                    $status = 'Tidak Aktif';
                }
                $no++;
                $row = array();

                //btn
                $btn = "<a type=\"button\" class=\"btn btn-sm btn-outline-success\" title=\"Edit Submenu\" onclick=\"byid('" . $field->id . "', 'edit')\"><i class=\"fas fa-edit\"></i></i></a> ";
                $btn .= "<a type=\"button\" class=\"btn btn-sm btn-outline-danger\" title=\"Delete\" onclick=\"hapusData('" . $field->id . "', '" . $field->title . "')\"><i class=\"fas fa-trash\"></i></a> ";

                $row[] = $no;
                $row[] = $field->title;
                $row[] = $field->menu;
                $row[] = $field->url;
                // $row[] = $field->icon;
                $row[] = $status;
                $row[] = $btn;
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->getSubMenu->count_all(),
                "recordsFiltered" => $this->getSubMenu->count_filtered(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }

    public function addSubMenu()
    {
        $data = [
            'title' => htmlspecialchars($this->input->post('title')),
            'menu_id' => htmlspecialchars($this->input->post('menu_id')),
            'url' => $this->input->post('url'),
            'icon' => 'fas fa-fw fa-folder-open',
            'is_active' => htmlspecialchars($this->input->post('is_active'))
        ];

        if ($this->Submenu_model->create($data) > 0) {
            $message['status'] = 'success';
        } else {
            $message['status'] = 'failed';
        };

        $this->output->set_content_type('application/json')->set_output(json_encode($message));
    }

    public function submenubyid($id)
    {
        $data = $this->Submenu_model->getdataById($id);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function updateSubMenu()
    {
        $data = [
            'title' => htmlspecialchars($this->input->post('title')),
            'menu_id' => htmlspecialchars($this->input->post('menu_id')),
            'url' => $this->input->post('url'),
            'icon' => 'fas fa-fw fa-folder-open',
            'is_active' => htmlspecialchars($this->input->post('is_active'))
        ];

        if ($this->Submenu_model->update(array('id' => $this->input->post('id')), $data) > 0) {
            $message['status'] = 'success';
        } else {
            $message['status'] = 'failed';
        };

        $this->output->set_content_type('application/json')->set_output(json_encode($message));
    }

    public function deleteSubMenu()
    {
        if ($this->input->is_ajax_request() == true) {
            $id = $this->input->post('id', true);

            $delete = $this->Submenu_model->delete($id);

            if ($delete) {
                $msg = [
                    'success' => 'Data Berhasil dihapus'
                ];
            }

            echo json_encode($msg);
        }
    }
}

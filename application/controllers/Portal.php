<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Portal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('File_System_model');
        is_logged_in();
    }
    //fungtion ini untuk panggil view per sub-menu yang ada
    public function CompanyProfile()
    {
        $data['title'] = 'Company Profile';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('portal/index', $data);
        $this->load->view('templates/footer');
    }
    public function AktaPerusahaan()
    {
        $data['title'] = 'Akta Perusahaan';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('portal/index', $data);
        $this->load->view('templates/footer');
    }
    public function StrukturOrganisasi()
    {
        $data['title'] = 'Struktur Organisasi';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('portal/index', $data);
        $this->load->view('templates/footer');
    }
    // job desk
    public function JobDes()
    {
        $data['title'] = 'Job Description';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('portal/index', $data);
        $this->load->view('templates/footer');
    }
    public function JobDesBm()
    {
        $data['title'] = 'Building Management';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('portal/index', $data);
        $this->load->view('templates/footer');
    }
    public function JobDesCp()
    {
        $data['title'] = 'Contruction and Property';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('portal/index', $data);
        $this->load->view('templates/footer');
    }
    public function JobDesAudit()
    {
        $data['title'] = 'Divisi Audit Internal';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('portal/index', $data);
        $this->load->view('templates/footer');
    }
    public function JobDesFin()
    {
        $data['title'] = 'Finance';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('portal/index', $data);
        $this->load->view('templates/footer');
    }
    public function JobDesHcga()
    {
        $data['title'] = 'HCGA';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('portal/index', $data);
        $this->load->view('templates/footer');
    }
    public function JobDesItbs()
    {
        $data['title'] = 'IT Bussiness';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('portal/index', $data);
        $this->load->view('templates/footer');
    }
    public function JobDesRsc()
    {
        $data['title'] = 'Risk System and Compliance';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('portal/index', $data);
        $this->load->view('templates/footer');
    }
    // end job desk
    public function Sertifikasi()
    {
        $data['title'] = 'Sertifikasi';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('portal/index', $data);
        $this->load->view('templates/footer');
    }
    public function Corplan()
    {
        $data['title'] = 'Corplan';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('portal/index', $data);
        $this->load->view('templates/footer');
    }
    public function DashboardCERMATI()
    {
        $data['title'] = 'Dashboard CERMATI';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('portal/index', $data);
        $this->load->view('templates/footer');
    }
    public function TKP()
    {
        $data['title'] = 'Tingkat Kesehatan Perusahaan';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('portal/index', $data);
        $this->load->view('templates/footer');
    }
    public function MouPks()
    {
        $data['title'] = 'MOU &amp; PKS';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('portal/index', $data);
        $this->load->view('templates/footer');
    }
    public function Kebijakan()
    {
        $data['title'] = 'Kebijakan';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('portal/index', $data);
        $this->load->view('templates/footer');
    }
    public function SPO()
    {
        $data['title'] = 'Standar Prosedur Operasional';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('portal/index', $data);
        $this->load->view('templates/footer');
    }
    public function MP()
    {
        $data['title'] = 'Momerandum Prosedur';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('portal/index', $data);
        $this->load->view('templates/footer');
    }
    public function PTO()
    {
        $data['title'] = 'Petunjuk Teknis Operasional';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('portal/index', $data);
        $this->load->view('templates/footer');
    }
    public function Pedoman()
    {
        $data['title'] = 'Pedoman ISO 37001';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('portal/index', $data);
        $this->load->view('templates/footer');
    }
    public function Surat()
    {
        $data['title'] = 'Surat';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('portal/index', $data);
        $this->load->view('templates/footer');
    }
    public function Nota()
    {
        $data['title'] = 'Nota';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('portal/index', $data);
        $this->load->view('templates/footer');
    }
    public function Memo()
    {
        $data['title'] = 'Memo';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('portal/index', $data);
        $this->load->view('templates/footer');
    }
    public function KetIntLain()
    {
        $data['title'] = 'Lain - lain';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('portal/index', $data);
        $this->load->view('templates/footer');
    }
    public function UU()
    {
        $data['title'] = 'Undang - undang';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('portal/index', $data);
        $this->load->view('templates/footer');
    }
    public function PP()
    {
        $data['title'] = 'Peraturan Pemerintah';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('portal/index', $data);
        $this->load->view('templates/footer');
    }
    public function Regulator()
    {
        $data['title'] = 'Regulator';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('portal/index', $data);
        $this->load->view('templates/footer');
    }
    public function KetEksLain()
    {
        $data['title'] = 'Lain - lain';
        $data['t_user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('portal/index', $data);
        $this->load->view('templates/footer');
    }
    //end of view
    public function add()
    {
        // var_dump($this->input->post());
        // die;
        $name = $this->input->post("nomor") . "_" . $this->input->post("perihal");
        $config = array('upload_path' => './assets/upload/document/', 'allowed_types' => 'pdf', 'max_size' => 200048, 'file_name' => $name);
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('myDoc')) { // false
            $error = $this->upload->display_errors();
            $this->output->set_content_type('application/json')->set_output(json_encode($error));
            // return $this->SystemCompliance($error);

        } else {
            $dataUser = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
            $dateUpload = date('Y-m-d H:i:s');
            $dataUpload = array('upload_data' => $this->upload->data());
            $status = $this->input->post('status');
            $sts = isset($status) ? 1 : 0;
            $dateDocument = date('Y-m-d', strtotime($this->input->post('tglDok')));
            $data = array('id_user' => $dataUser['id'], 'id_menu' => $this->input->post('idMenu'), 'id_submenu' => $this->input->post('idSubMenu'), 'nomor' => $this->input->post('nomor'), 'perihal' => $this->input->post('perihal'), 'nama_user' => $dataUser['name'], 'divisi' => $this->input->post('divisi'), 'tgl_dokumen' => $dateDocument, 'tgl_upload' => $dateUpload, 'detail_doc' => $dataUpload['upload_data']['file_name'], 'status' => $sts);
            if ($this->File_System_model->create($data) > 0) {
                $message['status'] = 'success';
            } else {
                $message['status'] = 'failed';
            };
            $this->output->set_content_type('application/json')->set_output(json_encode($message));
        }
    }
    public function byid($id)
    {
        $data = $this->File_System_model->getdataById($id);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function update()
    {
        // var_dump($this->input->post());
        // die;
        $oldPic = $this->db->get_where('document', ['id' => $this->input->post('id')])->row_array();
        $name = $this->input->post("nomor") . "_" . $this->input->post("perihal");
        $config = array('upload_path' => './assets/upload/document/', 'allowed_types' => 'pdf', 'max_size' => 200048, 'file_name' => $name);
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('myDoc')) { // false
            $dataUser = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
            $dateUpload = date('Y-m-d H:i:s');
            $status = $this->input->post('status');
            $sts = isset($status) ? 1 : 0;
            $dateDocument = date('Y-m-d', strtotime($this->input->post('tglDok')));
            $data = array('id_user' => $dataUser['id'], 'id_menu' => $this->input->post('idMenu'), 'id_submenu' => $this->input->post('idSubMenu'), 'nomor' => $this->input->post('nomor'), 'perihal' => $this->input->post('perihal'), 'nama_user' => $dataUser['name'], 'divisi' => $this->input->post('divisi'), 'tgl_dokumen' => $dateDocument, 'tgl_upload' => $dateUpload, 'status' => $sts);
            if ($this->File_System_model->update(array('id' => $this->input->post('id')), $data) > 0) {
                $message['status'] = 'success';
            } else {
                $message['status'] = 'failed';
            };
            $this->output->set_content_type('application/json')->set_output(json_encode($message));
        } else {
            $dataUser = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
            $newDate = date('Y-m-d H:i:s');
            $dataUpload = array('upload_data' => $this->upload->data());
            $status = $this->input->post('status');
            $sts = isset($status) ? 1 : 0;
            $dateDocument = date('Y-m-d', strtotime($this->input->post('tglDok')));
            $data = array('id_user' => $dataUser['id'], 'id_menu' => $this->input->post('idMenu'), 'id_submenu' => $this->input->post('idSubMenu'), 'nomor' => $this->input->post('nomor'), 'perihal' => $this->input->post('perihal'), 'nama_user' => $dataUser['name'], 'divisi' => $this->input->post('divisi'), 'tgl_dokumen' => $dateDocument, 'tgl_upload' => $newDate, 'detail_doc' => $dataUpload['upload_data']['file_name'], 'status' => $sts);
            if ($this->File_System_model->update(array('id' => $this->input->post('id')), $data, $oldPic) > 0) {
                $message['status'] = 'success';
            } else {
                $message['status'] = 'failed';
            };
            $this->output->set_content_type('application/json')->set_output(json_encode($message));
        }
    }
    public function getDoc()
    {
        if ($this->input->is_ajax_request() == true) {
            $this->load->model('File_System_model', 'getModel');
            $list = $this->getModel->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {
                $no++;
                $row = array();
                $dataUser = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
                $dataRole = $this->db->get_where('user_role', ['id' => $dataUser['role_id']])->row_array();
                if ($dataUser['is_active'] == 0) {
                    $btn = "";
                } else {
                    //btn
                    // $btn = "<a type=\"button\" class=\"btn btn-sm btn-outline-warning\" title=\"Download File\" onclick=\"downloadFile('" . $field->detail_doc . "')\"><i class=\"fas fa-download\"></i></i></a> ";
                    $btn = "<a type=\"button\" class=\"btn btn-sm btn-outline-success\" title=\"Edit File\" onclick=\"byid('" . $field->id . "', 'edit')\"><i class=\"fas fa-edit\"></i></i></a> ";
                    $btn .= "<a type=\"button\" class=\"btn btn-sm btn-outline-danger\" title=\"Delete\" onclick=\"deleteData(" . $field->id . ", '" . $field->perihal . "')\"><i class=\"fas fa-trash\"></i></a> ";
                }
                if ($field->status == 1) {
                    $btnPerihal = "<a onClick='alertData()' target='_blank'>" . $field->perihal . "</a>";
                } else {
                    $btnPerihal = "<a href='" . base_url() . "assets/upload/document/" . $field->detail_doc . "#toolbar=0' target='_blank'>" . $field->perihal . "</a>";
                }
                $row[] = $no;
                $row[] = $field->nomor;
                $row[] = $btnPerihal;
                $row[] = date('d-F-Y', strtotime($field->tgl_dokumen));
                $row[] = $field->divisi;
                if ($dataRole['crud_access'] == 1) {
                    $row[] = $btn;
                }
                $data[] = $row;
            }
            $output = array("draw" => $_POST['draw'], "recordsTotal" => $this->getModel->count_all(), "recordsFiltered" => $this->getModel->count_filtered(), "data" => $data);
            //output dalam format JSON
            echo json_encode($output);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }
    public function downloadFile()
    {
        var_dump($this->input->post('data'));
        die;
        if ($this->input->is_ajax_request() == true) {
        }
        // $this->load->helper('download');
        // $name = $data;
        // $data = file_get_contents('assets/upload/document/' . $data);
        // force_download($name, $data);
        // $url = base_url('./assets/upload/document/') . $data;
        // Use basename() function to return the base name of file
        // $file_name = basename($url);
        // Use file_get_contents() function to get the file
        // from url and use file_put_contents() function to
        // save the file by using base name
        // if ($data) {
        //     echo json_encode("File downloaded successfully");
        // } else {
        //     echo json_encode("File downloading failed.");
        // }

    }
    public function delete()
    {
        if ($this->input->is_ajax_request() == true) {
            $id = $this->input->post('id', true);
            $delete = $this->File_System_model->delete($id);
            if ($delete) {
                $msg = ['success' => 'Data Berhasil dihapus'];
            }
            echo json_encode($msg);
        }
    }
}

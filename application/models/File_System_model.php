<?php
defined('BASEPATH') or exit('No direct script access allowed');


class File_System_model extends CI_Model
{

    var $table = 'document'; //nama tabel dari database
    var $column_order = array(null,'nomor', 'perihal', 'tgl_dokumen', 'divisi'); //Sesuaikan dengan field
    var $column_search = array('nomor', 'perihal', 'divisi', 'tgl_dokumen'); //field yang diizin untuk pencarian 
    var $order = array('tgl_dokumen' => 'desc'); // default order

    public function _get_datatables_query()
    {
        $data = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $idMenu = $this->session->userdata('idMenu');
        $idSubMenu = $this->session->userdata('idSubMenu');
        $this->db->from('document')
            // ->where('id_user =', $data['id'])
            ->where('id_menu =', $idMenu)
            ->where('id_submenu =', $idSubMenu);
        $i = 0;

        foreach ($this->column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $data = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
        $idMenu = $this->session->userdata('idMenu');
        $idSubMenu = $this->session->userdata('idSubMenu');
        $this->db->from('document')
            ->where('id_user =', $data['id'])
            ->where('id_menu =', $idMenu)
            ->where('id_submenu =', $idSubMenu);
        return $this->db->count_all_results();
    }


    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                  FROM `user_sub_menu` JOIN `user_menu`
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                 ";

        return $this->db->query($query)->result_array();
    }

    public function create($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->affected_rows();
    }

    public function getdataById($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function update($where, $data, $oldPic = null)
    {
        if ($oldPic != null) {
            unlink("assets/upload/document/" . $oldPic['detail_doc']);
        }
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $query = "SELECT `detail_doc`
                  FROM `document` WHERE `id` = $id";
        $document = $this->db->query($query)->result_array();
        unlink("assets/upload/document/" . $document[0]['detail_doc']);
        return $this->db->delete('document', ['id' => $id]);
    }
}

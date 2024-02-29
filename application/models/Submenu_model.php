<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Submenu_model extends CI_Model
{
    // var $table = ''; //nama tabel dari database jika menggukanan 1 table pakai yg ini 
    var $column_order = array(null, 'title', 'menu', 'url', 'icon', 'is_active', null); //Sesuaikan dengan field
    var $column_search = array('title', 'url', 'icon', 'is_active', 'menu'); //field yang diizin untuk pencarian 
    var $order = array('title' => 'asc'); // default order 

    private function _get_datatables_query()
    {
        // jika menggunakan query seperti ini
        $this->db->select('a.*, b.menu');
        $this->db->from('user_sub_menu a');
        $this->db->join('user_menu b', 'a.menu_id = b.id');

        // $this->db->from($this->table); //ini untuk ngambil variabel table tanpa query

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
        $this->db->select('a.*, b.menu');
        $this->db->from('user_sub_menu a');
        $this->db->join('user_menu b', 'a.menu_id = b.id');
        return $this->db->count_all_results();
    }

    public function create($data)
    {
        $this->db->insert('user_sub_menu', $data);
        return $this->db->affected_rows();
    }

    public function getdataById($id)
    {
        return $this->db->get_where('user_sub_menu', ['id' => $id])->row();
    }

    public function update($where, $data)
    {
        $this->db->update('user_sub_menu', $data, $where);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        return $this->db->delete('user_sub_menu', ['id' => $id]);
    }
}

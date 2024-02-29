<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Class : (All Controller)
 * Login class to control to authenticate user credentials and starts user's session.
 * @author : Andi Wijaya | Andiwijayasuherman@gmail.com
 * @version : 1.1.2
 * @update : Januari 2024
 * @since : April 2023
 * @copyright 2024 PT UG Mandiri - RSC IT Dev
 */

class Log_model extends CI_Model
{
    public $table = 'log_data'; //nama tabel dari database
    public $column_order = array(null, 'type', 'date', 'data', 'user'); //Sesuaikan dengan field
    public $column_search = array('type', 'date', 'data', 'user'); //field yang diizin untuk pencarian
    public $order = array('type' => 'asc'); // default order

    private function _get_datatables_query()
    {

        $this->db->from($this->table);

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

                if (count($this->column_search) - 1 == $i) {
                    $this->db->group_end();
                }

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

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
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

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }
}

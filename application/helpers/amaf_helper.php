<?php

function is_logged_in()
{
    $ci = get_instance();

    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        /*
        mengambil role id dari database untuk masuk ke auth,
        jadi data ini menjadi bahan validasi role_id dan menu
        menu di ambil dari url atau dalam ci di sebut
        uri segment -> ini mengambil url bagian (ke) berapa setelah slash (/)
         */

        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1); //bagian ini yang disebut mengambil url bagian ke berapas

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id,
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }

}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows()) {
        return "checked='checked'";
    }
}

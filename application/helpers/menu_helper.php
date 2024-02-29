<?php 
function menu_help($menu, $nama_table, $sub_menu, $icon, $title)
{
    $ci = get_instance();

    $role_id = $ci->session->userdata('role_id');
    $queryMenu = "SELECT `user_menu`.`id`, `menu` 
                    FROM `user_menu` JOIN `user_access_menu`
                    ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                    WHERE `user_access_menu`.`role_id` = $role_id
                    ORDER BY `user_access_menu`.`menu_id` ASC
                    ";

    $menuData = $ci->db->query($queryMenu)->result_array();
    foreach ($menuData as $role) {
        $menuId = $role['id'];
        $querySubMenu = "SELECT user_sub_menu.`id`,
                                user_sub_menu.`menu_id`,
                                user_sub_menu.`title`,
                                user_sub_menu.`url`,
                                user_sub_menu.`icon`,
                                user_sub_menu.`is_active`,
                                user_sub_menu.`is_sub_menu`,
                                user_sub_menu.`is_main_menu`,
                                user_menu.`menu`
                        FROM `user_sub_menu` JOIN  `user_menu`
                        ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                        WHERE `user_sub_menu`.`menu_id` = $menuId
                        AND `user_sub_menu`.`is_active` = 1
                        AND `user_sub_menu`.`is_main_menu` = 0
                        ";
        $data = $ci->db->query($querySubMenu)->result_array();
        if (!empty($data)) {
            foreach ($data as $menu) {
                $sub_menu = $ci->db->get_where($nama_table, array('is_main_menu' => $menu['id']));
                if ($sub_menu->num_rows() > 0) {
                    $menuCollapse = "SELECT * FROM `user_sub_menu` WHERE is_sub_menu = 1 AND id=".$menu['id'];
                    $dataMenuCollapse = $ci->db->query($menuCollapse)->result_array();
                    // var_dump( $dataMenuCollapse);
                    echo '<li class="nav-item pb-0">
                                <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapse'.$menu['id'].'" aria-expanded="true" aria-controls="collapse'.$menu['id'].'">
                                    <i class="'.$menu['icon'].'"></i>
                                    <span>'.$menu['title'].'</span>
                                </a>
                                <div id="collapse'.$menu['id'].'" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                                    <div class="bg-white py-0 collapse-inner rounded">';
                                    foreach($sub_menu->result() as $menu2) {
                                        if ($title == $menu2->title) {
                                            echo "<script>
                                                $(document).ready(function() {
                                                        $('#idMenu').val(".$menu2->menu_id.");
                                                        $('#idSubMenu').val(".$menu2->id.");
                                                        $('#idMenuA').val(".$menu2->menu_id.");
                                                        $('#idSubMenuA').val(".$menu2->id.");
                                                    });
                                                </script>";
                                            $data = [
                                                'email' => $ci->session->userdata('email'),
                                                'username' => $ci->session->userdata('username'),
                                                'role_id' => $ci->session->userdata('role_id'),
                                                'idMenu' => $menu2->menu_id,
                                                'idSubMenu' => $menu2->id
                                            ];
                                            $ci->session->set_userdata($data);
                                        }
                                        $ActivCollapse = $title == $menu2->title ? 'collapse-item active' : 'collapse-item'; 
                                        echo '<a class="'.$ActivCollapse.'" href="'.base_url($menu2->url).'">'.$menu2->title.'</a>';
                                    }
                    echo '</div></div></li>';
                } else {
                    $url = !empty($menu['url']) ? base_url($menu['url']) : '#';
                    if($title == $menu['title']) {
                        echo "<script>
                                $(document).ready(function() {
                                    $('#idMenu').val(".$menu['menu_id'].");
                                    $('#idSubMenu').val(".$menu['id'].");
                                    $('#idMenuA').val(".$menu['menu_id'].");
                                    $('#idSubMenuA').val(".$menu['id'].");
                                });
                            </script>";
                        $data = [
                            'email' => $ci->session->userdata('email'),
                            'username' => $ci->session->userdata('username'),
                            'role_id' => $ci->session->userdata('role_id'),
                            'idMenu' => $menu['menu_id'],
                            'idSubMenu' => $menu['id']
                        ];
                        $ci->session->set_userdata($data);

                        echo '<li class="nav-item active">';
                    } else {
                        echo '<li class="nav-item">';
                    }
                    echo '
                            <a type="button" class="nav-link pb-0" href="'.$url.'">
                                <i class="'.$menu['icon'].'"></i>
                                <span>'.$menu['title'].'</span>
                            </a></li>';
                }
            }
        } else {
            echo '';
        }
    }
}
?>
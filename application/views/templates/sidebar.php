 <!-- Main Sidebar Container -->
 <aside class="main-sidebar elevation-4 sidebar-light-primary">
            <!-- Brand Logo -->
            <a href="#" class="brand-link navbar-success">
                <img src="<?= base_url() ?>assets/img/smkia.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light" style="color: white;">SIAKAD SMKIA</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img  src="<?= base_url('upload/user/') . $user['image']; ?>" class="img-circle elevation-2" alt="User Image" style="overflow:visible;height:30px;width:30px">
                    </div>
                    <div class="info">
                        <a><?= $user['name'];  ?></a>
                    </div>
                </div>


    <!-- QUERY MENU -->
    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `user_menu`.`id`, `menu`
                            FROM `user_menu` JOIN `user_access_menu`
                              ON `user_menu`.`id` = `user_access_menu`.`menu_id` 
                           WHERE `user_access_menu`.`role_id` = $role_id
                        ORDER BY `user_access_menu`.`menu_id` ASC
                        ";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!-- LOOPING MENU -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <!--mengambil nama menu -->
            <?= $m['menu'];  ?>
        </div>

        <!-- SIAPKAN SUB-MENU SESUAI MENU -->
        <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT *
        FROM `user_sub_menu` JOIN `user_menu` 
          ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
       WHERE `user_sub_menu`.`menu_id` = $menuId
       AND `user_sub_menu`.`is_active` = 1
       ";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach ($subMenu as $sm) : ?>
            <?php if ($title == $sm['title']) : ?>

                <a class="nav-item active">
                <?php else : ?>
                
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['title'];  ?></span></a>
                
            <?php endforeach; ?>

            <hr class="sidebar-divider mt-3">

        <?php endforeach; ?>



            <a class="nav-link pb-0" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>

        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<!-- End of Sidebar -->
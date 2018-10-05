<?php
$firstUri = $this->uri->segment(1);

$dashboard = "";
$data_member = "";
$data_prodi = "";
$user = "";

if ($firstUri == "dashboard") {
   $dashboard = "active";
} elseif ($firstUri == "data-member") {
   $data_member = "active";
} elseif ($firstUri == "data-prodi") {
   $data_prodi = "active";
} elseif ($firstUri == "manajemen-pengguna") {
   $user = "active";
}

?>



<aside class="main-sidebar">
   <!-- sidebar: style can be found in sidebar.less -->
   <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
         <div class="pull-left image">
            <img src="<?= assets('img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">
         </div>
         <div class="pull-left info">
            <p>
               <?= $_SESSION['user']['name']; ?>
            </p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
         </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
         <li class="header">MENU UTAMA</li>
         <li class="<?= $dashboard; ?>">
            <a href="<?= linkTo("dashboard") ?>">
               <i class="fa fa-dashboard"></i>
               <span>Dashboard</span>
            </a>
         </li>
         <li class="<?= $data_member; ?>">
            <a href="<?= linkTo("data-member"); ?>">
               <i class="fa fa-users"></i>
               <span>Data Member</span>
            </a>
         </li>
         <li class="<?= $data_prodi; ?>">
            <a href="<?= linkTo("data-prodi"); ?>">
               <i class="fa fa-book"></i>
               <span>Data Prodi</span>
            </a>
         </li>
         <?php if($_SESSION['level'] == "admin"): ?>
         <li class="<?= $user; ?>">
            <a href="<?= linkTo("manajemen-pengguna"); ?>">
               <i class="fa fa-user"></i>
               <span>Manajemen Pengguna</span>
            </a>
         </li>
         <?php endif; ?>
      </ul>
   </section>
   <!-- /.sidebar -->
</aside>
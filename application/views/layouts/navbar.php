<header class="main-header">
   <!-- Logo -->
   <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
         <img src="<?= assets('img/logo.png') ?>" alt="" style="width: 120px;">
      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
         <img src="<?= assets('img/logo.png') ?>" alt="" style="width: 120px;">
      </span>
   </a>
   <!-- Header Navbar: style can be found in header.less -->
   <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
         <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
         <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="user user-menu">
               <a href="<?= linkTo("manajemen-pengguna/profile") ?>" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?= assets('img/user2-160x160.jpg') ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs">
                     <?= $_SESSION['user']['name']; ?>
                  </span>
               </a>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
               <a
                  href="#" 
                  class="bg-red"
                  onclick="return logout()">
                  <i class="fa fa-power-off"></i>
                  <span>Logout</span>
               </a>
               <form id="logout" action="<?= linkTo('logout') ?>" method="POST">
                  <input type="hidden" name="logout" value="TRUE">
               </form>
            </li>
         </ul>
      </div>
   </nav>
</header>
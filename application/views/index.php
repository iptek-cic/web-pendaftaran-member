<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Dashboard
         <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Dashboard</li>
      </ol>
   </section>

   <!-- Main content -->
   <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
         <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
               <div class="inner">
                  <h3><?= $members; ?></h3>

                  <p>Member</p>
               </div>
               <div class="icon">
                  <i class="fa fa-users"></i>
               </div>
               <a href="<?= linkTo("data-member") ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
               <div class="inner">
                  <h3><?= $prodi; ?></h3>

                  <p>Program Studi</p>
               </div>
               <div class="icon">
                  <i class="fa fa-book"></i>
               </div>
               <a href="<?= linkTo("data-prodi") ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
               <div class="inner">
                  <h3><?= $users; ?></h3>

                  <p>Pengguna</p>
               </div>
               <div class="icon">
                  <i class="fa fa-user-o"></i>
               </div>
               <a href="<?= linkTo("manajamen-pengguna") ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
               <div class="inner">
                  <h3>6</h3>

                  <p>Gugus</p>
               </div>
               <div class="icon">
                  <i class="fa fa-list"></i>
               </div>
               <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
         </div>
         <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
         <!-- Left col -->
         <section class="col-lg-12">
            <div class="box box-primary" style="min-height: 300px;">
               <div class="box-header">
                  <h3 class="box-title">
                     <i class="fa fa-dashboard"></i>
                     Dashboard
                  </h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <h2>Hi <?= $_SESSION['user']['name'] ?>!</h2>
                  <p style="font-size: 20px;">
                     Apa kabar hari ini ? Tetap semangat ya & jangan lupa bahagia! ;)
                  </p>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
         </section>
            <!-- /.Left col -->
      </div>
      <!-- /.row (main row) -->

   </section>
   <!-- /.content -->
</div>
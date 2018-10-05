<div class="content-wrapper">
	<section class="content-header">
		<h1>
         Manajemen Pengguna
         <small>Ubah Password</small>    
      </h1>
		<?= $this->other_lib->showBreadCrumb(); ?>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Ubah Password</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<form action="<?= linkTo('user/ubah-password/'.$id) ?>" class="form" method="POST" enctype="multipart/form-data">

                     <div class="row">
                        <label for="password" class="col-md-2 col-md-offset-1">Password Lama</label>
                        <div class="col-md-7">
                           <input type="password" class="form-control" name="password_lama" autocomplete="off" required value="<?= set_value('password') ?>">
                           <?= form_error('password') ?>
                        </div>
                     </div>
                     <br>

                     <div class="row">
                        <label for="password" class="col-md-2 col-md-offset-1">Password Baru</label>
                        <div class="col-md-7">
                           <input type="password" class="form-control" name="password_baru" autocomplete="off" required value="<?= set_value('password') ?>">
                           <?= form_error('password') ?>
                        </div>
                     </div>
                     <br>

                     <div class="row">
                        <label for="password" class="col-md-2 col-md-offset-1">Konfirmasi Password</label>
                        <div class="col-md-7">
                           <input type="password" class="form-control" name="konfirmasi_password" autocomplete="off" required value="<?= set_value('password') ?>">
                           <?= form_error('password') ?>
                        </div>
                     </div>
                     <br>


                     <div class="row">
                        <label for="" class="col-md-2 col-md-offset-1">&nbsp;</label>
                        <div class="col-md-7">
                           <button class="btn btn-primary" type="submit" name="update">
                              <i class="fa fa-floppy-o"></i>
                              <span>Simpan</span>
                           </button>
                           <a href="<?= linkTo("user/profile") ?>" class="btn btn-default">
                              <span>Kembali</span>
                              <i class="fa fa-chevron-right"></i>
                           </a>
                        </div>
                     </div>

						</form>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
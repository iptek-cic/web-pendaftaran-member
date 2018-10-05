<div class="content-wrapper">
	<section class="content-header">
		<h1>Manajemen Pengguna</h1>
		<?= $this->other_lib->showBreadCrumb(); ?>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Edit Pengguna</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<form action="<?= linkTo('user/update/'.$user->id) ?>" class="form" method="POST" enctype="multipart/form-data">
							
                           <div class="row">
                              <label for="name" class="col-md-2 col-md-offset-1">Nama Lengkap</label>
                              <div class="col-md-7">
                                 <input type="text" class="form-control" name="name" autocomplete="off" required value="<?= $user->name; ?>">
                                 <?= form_error('name') ?>
                              </div>
                           </div>
                           <br>

                           <div class="row">
                              <label for="users" class="col-md-2 col-md-offset-1">Username</label>
                              <div class="col-md-7">
                                 <input type="text" class="form-control" name="username" autocomplete="off" required value="<?= $user->username; ?>">
                                 <?= form_error('username') ?>
                              </div>
                           </div>
                           <br>

                           <div class="row">
                              <label for="email" class="col-md-2 col-md-offset-1">E-mail</label>
                              <div class="col-md-7">
                                 <input type="email" class="form-control" name="email" autocomplete="off" required value="<?= $user->email ?>">
                                 <?= form_error('email') ?>
                              </div>
                           </div>
                           <br>

                           <div class="row">
	                           	<label for="level" class="col-md-2 col-md-offset-1">Level</label>
	                           	<div class="col-md-7">
	                           		<select name="level" required class="form-control">
	                           			<option value="">-- Pilih Hak Akses --</option>
                                       <?php if ($user->level == 1): ?>
                                          <option value="1" selected>Administrator</option>
                                          <option value="0">Operator</option>
                                       <?php else: ?>
   	                           			<option value="1">Administrator</option>
   	                           			<option value="0" selected>Operator</option>
                                       <?php endif ?>
	                           		</select>
	                           		<?= form_error('level') ?>
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
                                 <a href="<?= linkTo('user') ?>" class="btn btn-default">
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
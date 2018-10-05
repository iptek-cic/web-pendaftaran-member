<div class="content-wrapper">
	<section class="content-header">
		<h1>Data Member</h1>
		<?= $this->other_lib->showBreadCrumb(); ?>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Tambah Member</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<form action="<?= linkTo('data-member/create') ?>" class="form" method="POST" enctype="multipart/form-data">
							
                     <div class="row">
                        <label for="nama" class="col-md-2 col-md-offset-1">Nama Lengkap</label>
                        <div class="col-md-7">
                           <input type="text" class="form-control" name="nama" autocomplete="off" required value="<?= set_value('nama') ?>">
                           <?= form_error('nama') ?>
                        </div>
                     </div>
                     <br>

                     <div class="row">
                        <label for="id_prodi" class="col-md-2 col-md-offset-1">Program Studi</label>
                        <div class="col-md-7">
                           <select name="id_prodi" id="" class="form-control" required>
                              <option value="">-- Pilih Program Studi --</option>
                              <?php if (count((array) $prodi) > 0): ?>
                                 <?php foreach ($prodi as $p): ?>
                                    <option value="<?= $p->id; ?>"><?= $p->nama_prodi; ?></option>
                                 <?php endforeach ?>
                              <?php endif ?>
                           </select>
                           <?= form_error('id_prodi') ?>
                        </div>
                     </div>
                     <br>

                     <div class="row">
                        <label for="gugus" class="col-md-2 col-md-offset-1">Gugus</label>
                        <div class="col-md-7">
                           <select name="gugus" id="" class="form-control">
                              <option value="">-- Pilih Gugus --</option>
                              <?php if (count((array) $gugus) > 0): ?>
                                 <?php foreach ($gugus as $g): ?>
                                    <option value="<?= $g; ?>"><?= $g; ?></option>
                                 <?php endforeach ?>
                              <?php endif ?>
                           </select>
                        </div>
                     </div>
                     <br>

                     <div class="row">
                        <label for="hp" class="col-md-2 col-md-offset-1">No. HP</label>
                        <div class="col-md-7">
                           <input type="number" class="form-control" name="hp" autocomplete="off" required value="<?= set_value('hp') ?>">
                           <?= form_error('hp') ?>
                        </div>
                     </div>
                     <br>

                     <div class="row">
                        <label for="pilihan_ke" class="col-md-2 col-md-offset-1">Pilihan Ke -</label>
                        <div class="col-md-7">
                           <select name="pilihan_ke" required class="form-control">
                              <option value="">-- Pilih --</option>
                              <option value="1">Satu</option>
                              <option value="2">Dua</option>
                           </select>
                           <?= form_error('pilihan_ke') ?>
                        </div>
                     </div>
                     <br>

                     <div class="row">
                        <label for="" class="col-md-2 col-md-offset-1">&nbsp;</label>
                        <div class="col-md-7">
                           <button class="btn btn-primary" type="submit" name="insert">
                              <i class="fa fa-floppy-o"></i>
                              <span>Simpan</span>
                           </button>
                           <a href="<?= linkTo("data-member") ?>" class="btn btn-default">
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
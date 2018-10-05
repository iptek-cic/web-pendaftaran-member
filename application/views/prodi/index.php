<div class="content-wrapper">
	<section class="content-header">
		<h1>Data Prodi</h1>
		<?= $this->other_lib->showBreadCrumb(); ?>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Daftar Data Prodi</h3>
						<div class="box-tools pull-right">
							<a href="<?= linkTo('data-prodi/create'); ?>" class="btn btn-primary">
								<i class="fa fa-plus"></i>
								<span>Tambah Data</span>
							</a>
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table id="data" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Nama Prodi</th>
									<th>Keterangan</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php if (count((array) $prodi) > 0): ?>
									<?php foreach ($prodi as $p): ?>
										<tr>
											<td class="text-center"><?= $no++; ?></td>
											<td><?= $p->nama_prodi; ?></td>
											<td><?= $p->keterangan; ?></td>
											<td>
												<a href="<?= linkTo('data-prodi/edit/'.$p->id) ?>" class="btn btn-success">
													<i class="fa fa-pencil"></i>
													<span>Edit</span>
												</a>
												<?php if ($_SESSION['level'] == "admin"): ?>
													<a href="<?= linkTo('data-prodi/delete/'.$p->id) ?>" class="btn btn-danger" onclick="return confirmDelete();">
														<i class="fa fa-trash"></i>
														<span>Hapus</span>
													</a>
												<?php endif ?>
											</td>
										</tr>
									<?php endforeach ?>
								<?php endif ?>
							</tbody>
						</table>
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
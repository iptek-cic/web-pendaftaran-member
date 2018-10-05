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
						<h3 class="box-title">Daftar Data Member</h3>
						<div class="box-tools pull-right">
							<a href="<?= linkTo("data-member/export/excel") ?>" class="btn btn-success">
								<i class="fa fa-file-excel-o"></i>
								<span>Export Excel</span>
							</a>
							<a href="<?= linkTo("data-member/export/pdf") ?>" class="btn btn-default">
								<i class="fa fa-file-pdf-o"></i>
								<span>Export PDF</span>
							</a>
							<a href="<?= linkTo('data-member/create'); ?>" class="btn btn-primary">
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
									<th>Nama Lengkap</th>
									<th>Program Studi</th>
									<th>Gugus</th>
									<th>No. HP</th>
									<th>Pilihan Ke</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php if (count((array) $members) > 0): ?>
									<?php foreach ($members as $m): ?>
										<tr>
											<td class="text-center"><?= $no++; ?></td>
											<td><?= $m->nama; ?></td>
											<td><?= $m->prodi; ?></td>
											<td><?= $m->gugus; ?></td>
											<td><?= $m->hp; ?></td>
											<td>
												<?= ($m->pilihan_ke == 1) ? "Satu" : "Dua"; ?>
											</td>
											<td>
												<a href="<?= linkTo('data-member/edit/'.$m->id) ?>" class="btn btn-success">
													<i class="fa fa-pencil"></i>
													<span>Edit</span>
												</a>
												<?php if ($_SESSION['level'] == "admin"): ?>
													<a href="<?= linkTo('data-member/delete/'.$m->id) ?>" class="btn btn-danger" onclick="return confirmDelete();">
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
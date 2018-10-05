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
						<h3 class="box-title">Daftar Pengguna Aplikasi</h3>
						<div class="box-tools pull-right">
							<a href="<?= linkTo('manajemen-pengguna/create'); ?>" class="btn btn-primary">
								<i class="fa fa-plus"></i>
								<span>Tambah Pengguna</span>
							</a>
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table id="data" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Username</th>
									<th>Nama</th>
									<th>E-mail</th>
									<th>Level</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php if (count((array) $users) > 0): ?>
									<?php foreach ($users as $u): ?>
										<tr>
											<td class="text-center"><?= $no++; ?></td>
											<td><?= $u->username; ?></td>
											<td><?= $u->name; ?></td>
											<td><?= $u->email; ?></td>
											<td><?= ($u->level == 1) ? "Administrator" : "Operator"; ?></td>
											<td>
												<a href="<?= linkTo('manajemen-pengguna/edit/'.$u->id) ?>" class="btn btn-success">
													<i class="fa fa-pencil"></i>
													<span>Edit</span>
												</a>
												<?php if ($_SESSION['level'] == "admin"): ?>
													<a href="<?= linkTo('manajemen-pengguna/delete/'.$u->id) ?>" class="btn btn-danger" onclick="confirmDelete();">
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
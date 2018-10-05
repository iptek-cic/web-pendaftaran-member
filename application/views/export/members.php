<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>DATA HASIL KLASIFIKASI K-NEAREST NEIGHBOUR</title>
</head>
<style>
	#main{
		padding-right: 10px;
		padding-left: 10px;
	}
	#header{
		text-align: center;
	}
	.sub-header{
		font-size: 24px;
		font-weight: bold;
		padding: 10px;
	}
	.sub-detail{
		font-size: 14px;
		margin-bottom: 10px;
	}
	.table{
		width: 100%;
	}
	thead{
		background: #16A3EC;
		color: #fff;
		font-weight: bold;
		text-align: center;
		font-size: 15px;
	}
	thead tr th, tbody tr td{
		border-collapse: collapse;
		border:1px solid #333;
	}
	.ctr{
		text-align: center;
		vertical-align: middle;
	}
	.table tbody tr td{
		font-size: 13px;
	}
</style>
<body>
	<div id="main">
		<div id="header">
			<div class="sub-header">DATA MEMBER BARU UKM IPTEK CIC</div>
			<div class="sub-detail">
				Tahun Ajaran 2018/2019
			</div>
		</div>
		<div id="data">
			<table class="table" border="0" cellspacing="0" cellpadding="5">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama Lenkap</th>
						<th>Program Studi</th>
						<th>Gugus</th>
						<th>No. HP</th>
						<th>Pilihan Ke</th>
						<th>Keterangan</th>
					</tr>
				</thead>
				<tbody>
					<?php if (count((array) $members) > 0): ?>
						<?php foreach ($members as $m): ?>
							<tr>
								<td class="ctr"><?= $no++; ?></td>
								<td class="ctr"><?= $m->nama; ?></td>
								<td><?= $m->prodi; ?></td>
								<td><?= $m->gugus; ?></td>
								<td><?= $m->hp; ?></td>
								<td><?= ($m->pilihan_ke == 1) ? "Satu" : "Dua"; ?></td>
								<td>
									&nbsp;
								</td>
							</tr>
						<?php endforeach ?>
					<?php else: ?>
						<tr>
							<td colspan="9" style="text-align: center;">
								Tidak Ada Data!
							</td>
						</tr>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>
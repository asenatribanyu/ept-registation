<header class="header-2">
	<div class="page-header min-vh-75 relative" style="background-image: url('<?php echo base_url() ?>assets/images/bg2.jpg')">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 text-center mx-auto">
					<h1 class="text-white pt-3 mt-n5">Laporan</h1>
					<p class="lead text-white mt-3">Laporan Score EPT</p>
				</div>
			</div>
		</div>
	</div>
</header>

<div class="card card-body blur shadow-blur mx-2 mx-md-3 mt-n6">

	<div class="data-tables datatable-dark">
		<table class="table table-bordered table-striped table-hover" id="dataTable" style="width:100%">
			<thead>
				<tr style="text-align: center;">
					<th>No</th>
					<th>Tanggal Tes</th>
					<th>Nama Mahasiswa</th>
					<th>NPM</th>
					<th>Fakultas</th>
					<th>Prodi</th>
					<th>Sec1</th>
					<th>Sec2</th>
					<th>Sec3</th>
					<th>Score</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($tbl_score as $s) : ?>
					<tr style="text-align: center;">
						<td width="20px"><?php echo $no++ ?></td>
						<td><?php echo $s->tanggal ?></td>
						<td><?php echo $s->nama ?></td>
						<td><?php echo $s->npm ?></td>
						<td> </td>
						<td> </td>
						<td><?php echo $s->sec1 ?></td>
						<td><?php echo $s->sec2 ?></td>
						<td><?php echo $s->sec3 ?></td>
						<td><?php echo $s->score ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
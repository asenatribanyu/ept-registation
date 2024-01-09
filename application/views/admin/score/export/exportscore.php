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

	<!-- Button trigger modal -->
	<button type="button" class="btn btn-info mx-3 mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
	Export
	</button>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
		<div class="modal-header">
			<h1 class="modal-title fs-5" id="exampleModalLabel">Filter Data Score</h1>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<form action="<?= base_url('admin/score/score/export_filter'); ?>" method="POST">
				<div class="mb-3">
					<label for="jdata" class="form-label">Jumlah Data</label>
					<input type="number" class="form-control border p-1" id="jdata" name="jumlahData">
				</div>
				<div class="mb-3">
					<!-- <label for="jscore" class="form-label">Jumlah Score</label> -->
					<input type="hidden" class="form-control border p-1" id="jscore" name="jumlahScore">
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="startYear">Tahun Awal</label>
						<select class="form-control border p-1" id="startYear" name="startYear">
						<?php
						// Ambil tahun saat ini
						$currentYear = date("Y");

						// Atur rentang tahun yang diinginkan (contoh dari tahun 2000 hingga tahun saat ini)
						$startYear = 2000;

						// Loop untuk membuat pilihan tahun
						for ($year = $currentYear; $year >= $startYear; $year--) {
							echo "<option value='$year'>$year</option>";
						}
						?>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label for="endYear">Tahun Akhir</label>
						<select class="form-control border p-1" id="endYear" name="endYear">
						<?php
						// Loop untuk membuat pilihan tahun (sama seperti sebelumnya)
						for ($year = $currentYear; $year >= $startYear; $year--) {
							echo "<option value='$year'>$year</option>";
						}
						?>
						</select>
					</div>
				</div>
			
			<!-- <div class="btn-group dropend">
				<button type="button" class="btn rounded-3 btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
					Jumlah Data
				</button>
				<ul class="dropdown-menu scrollable-menu">
					<li><a class="dropdown-item" href="#">Action</a></li>
					<li><a class="dropdown-item" href="#">Action two</a></li>
					<li><a class="dropdown-item" href="#">Action three</a></li>
				</ul>
				<button type="button" class="btn rounded-3 btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
					Jumlah Score
				</button>
				<ul class="dropdown-menu scrollable-menu">
					<li><a class="dropdown-item" href="#">Action</a></li>
					<li><a class="dropdown-item" href="#">Action two</a></li>
					<li><a class="dropdown-item" href="#">Action three</a></li>
				</ul>
				<button type="button" class="btn rounded-3 btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
					Tahun
				</button>
				<ul class="dropdown-menu scrollable-menu">
					<li><a class="dropdown-item" href="#">Action</a></li>
					<li><a class="dropdown-item" href="#">Action two</a></li>
					<li><a class="dropdown-item" href="#">Action three</a></li>
				</ul>
			</div> -->
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-info">Save changes</button>
		</div>
		</form> 
		</div>
	</div>
	</div>

<div class="card card-body blur shadow-blur mx-2 mx-md-3">
	
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
						<td><?php echo $s->nama_fakultas ?> </td>
						<td><?php echo $s->nama_prodi ?> </td>
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

<style>
	/* .dropend {
		flex-direction: column;
	}

	.scrollable-menu {
		height: auto;
		max-height: 100px;
		overflow-x: hidden;
    } */


</style>
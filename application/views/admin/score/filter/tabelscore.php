<header class="header-2">
	<div class="page-header min-vh-50 relative" style="background-image: url('<?php echo base_url() ?>assets/images/bg2.jpg')">
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
	<div class="con-chart mx-2 mx-md-3 mt-1">
		<div class="date d-flex">
			<div class="datestart px-1">
				<form id="tanggalForm" action="<?php echo base_url('admin/tanggal/tanggal/simpandata'); ?>" method="post">
					<h5>Tanggal Awal</h5>
					<div class="input-group input-group-outline mb-3">
						<input type="date" name="tanggal_event" class="form-control rounded-2 border border-primary">
						<br><?php echo form_error('tanggal_event', '<div class="text-danger small" ml-3>', '</div>') ?>
					</div>
				</form>
			</div>
			<div class="dateend px-1">
				<form id="tanggalForm" action="<?php echo base_url('admin/tanggal/tanggal/simpandata'); ?>" method="post">
					<h5>Tanggal Akhir</h5>
					<div class="input-group input-group-outline mb-3">
						<input type="date" name="tanggal_event" class="form-control rounded-2 border border-primary">
						<br><?php echo form_error('tanggal_event', '<div class="text-danger small" ml-3>', '</div>') ?>
					</div>
				</form>
			</div>
		</div>
		
		<div class="chart" id="chartContainer" style="height: 300px; border-radius: 10px;"></div>
	</div>
</div>

<div class="card card-body blur shadow-blur mx-2 mx-md-3 mt-4">
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

<script type="text/javascript" src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

<script type="text/javascript">
    $(function() {
        $('#datepicker').datepicker();
    });
</script>

<script type="text/javascript">
	window.onload = function () {
		var chart = new CanvasJS.Chart("chartContainer",
		{
		title: {
			text: "Scores EPT"
		},
			data: [
		{
			type: "area",
			dataPoints: [//array

			{ x: new Date(2020, 00, 1), y: 2600 },
			{ x: new Date(2020, 01, 1), y: 3800 },
			{ x: new Date(2020, 02, 1), y: 4300 },
			{ x: new Date(2020, 03, 1), y: 2900 },
			{ x: new Date(2020, 04, 1), y: 4100 },
			{ x: new Date(2020, 05, 1), y: 4500 },
			{ x: new Date(2020, 06, 1), y: 8600 },
			{ x: new Date(2020, 07, 1), y: 6400 },
			{ x: new Date(2020, 08, 1), y: 5300 },
			{ x: new Date(2020, 09, 1), y: 6000 }
			]
		}
		]
		});

		chart.render();
	}
</script>

<style>

</style>
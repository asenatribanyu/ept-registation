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
		<div class="chartfilter d-flex">
			<form id="tanggalForm" class="datefilter d-flex align-items-end" action="<?php echo base_url(); ?>admin/score/score/filter/<?php echo $id ?>" method="post">
				<div class="datestart px-1">
						<h5>Tanggal Awal</h5>
						<div class="input-group input-group-outline mb-3">
							<input type="date" name="tanggal_awal" class="form-control rounded-2 border-success-emphasis">
						</div>
				</div>
				<div class="dateend px-1">
						<h5>Tanggal Akhir</h5>
						<div class="input-group input-group-outline mb-3">
							<input type="date" name="tanggal_akhir" class="form-control rounded-2 border-success-emphasis">
						</div>
				</div>

				<div class="scoremin px-1">
					<h5>Score Awal</h5>
					<div class="input-group input-group-outline mb-3">
						<input name="skor_awal" type="number" class="form-control border-success-emphasis" id="" placeholder="Masukkan score awal">
					</div>
				</div>
				<div class="scoremax px-1">
					<h5>Score Akhir</h5>
					<div class="input-group input-group-outline mb-3">
						<input name="skor_akhir" type="number" class="form-control border-success-emphasis" id="" placeholder="Masukkan score akhir">
					</div>
				</div>

				<button type="submit" class="btn mx-1 btn-info">Save changes</button>
			</form>
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
	<?php
		$dataPoints = array();
		$no = 1;
		foreach ($tbl_score as $s) {

			$x = $s->nama;
			$y = $s->score;
			$dataPoints[] = array("label" =>$x, "y" => $y  );
		}
	?>
	var DataPoints = <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>;
	window.onload = function () {
		var chart = new CanvasJS.Chart("chartContainer",
		{
		title: {
			text: "Scores EPT"
		},
			data: [
		{
			type: "area",
			dataPoints: DataPoints
		}
		]
		});

		chart.render();
	}
</script>

<style>

</style>
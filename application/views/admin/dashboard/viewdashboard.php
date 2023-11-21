<header class="header-2">
  <div class="page-header min-vh-75 relative" style="background-image: url('<?php echo base_url() ?>assets/images/bg2.jpg')">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 text-center mx-auto">
          <h1 class="text-white pt-3 mt-n5">Layanan Lembaga Bahasa Widyatama</h1>
          <p class="lead text-white mt-3">Dashboard</p>
        </div>
      </div>
    </div>
  </div>
</header>
<div class="card card-body blur shadow-blur mx-3 mx-md-9 mt-n6">

  <section id="count-stats">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 mx-auto">
          <div class="row">
            <div class="col-md-3 position-relative ">
              <div class="p-3 text-center">
                <h1 class="text-gradient text-primary"><span id="state1" countTo="<?php echo $this->db->count_all_results('tbl_registrant'); ?>"></span></h1>
                <h5 class="mt-3">Data Pendaftar</h5>
              </div>
              <hr class="vertical dark">
            </div>
            <div class="col-md-3 position-relative">
              <div class="p-3 text-center">
                <h1 class="text-gradient text-primary"><span id="state2" countTo="<?php echo $this->db->count_all_results('tbl_event'); ?>"></span></h1>
                <h5 class="mt-3">Data Tanggal</h5>
              </div>
              <hr class="vertical dark">
            </div>
            <div class="col-md-3 position-relative">
              <div class="p-3 text-center">
                <h1 class="text-gradient text-primary"><span id="state3" countTo="<?php echo $this->db->count_all_results('tbl_peserta'); ?>"></span></h1>
                <h5 class="mt-3">Data Peserta</h5>
              </div>
              <hr class="vertical dark">
            </div>
            <div class="col-md-3 position-relative">
              <div class="p-3 text-center">
                <h1 class="text-gradient text-primary"><span id="state4" countTo="<?php $this->db->select('id_event');
                                                                                  $this->db->from('tbl_event');
                                                                                  $this->db->where('aktif', 'Aktif');
                                                                                  echo $this->db->count_all_results(); ?>"></span></h1>
                <h5 class="mt-3">Tanggal Aktif</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <label for="studyProgram">Filter by Study Program:</label>
    <select id="studyProgram" onchange="filterData()">
      <option value="">All Study Programs</option>
      <?php
        foreach ($this->db->select('*')->from('tbl_prodi')->get()->result() as $data) {
            echo "<option value=\"$data->nama_prodi\">$data->nama_prodi</option>";
        }
    ?>
    </select>
    <div id="chartContainer" style="height: 600px; width: 100%; font-size:10px;"></div>

    <div id="totalCountContainerId"></div>
  </section>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script>
  <?php if ($this->session->flashdata('sweet_alert')) : ?>
    swal({
      title: "<?php echo $this->session->flashdata('sweet_title'); ?>",
      text: "<?php echo $this->session->flashdata('sweet_text'); ?>",
      icon: "<?php echo $this->session->flashdata('sweet_icon'); ?>",
      button: {
        text: "OK",
        className: "bg-primary text-white"
      }
    });
  <?php endif; ?>
</script>
<script>
<?php
$dataPoints = array();
$totalCount = $this->db->count_all_results('tbl_peserta');
foreach ($this->db->select('*')->from('tbl_prodi')->get()->result() as $data) {

    $count = $this->db->where('id_prodi', $data->id_prodi)->count_all_results('tbl_peserta');
    $label = $data->nama_prodi;
    $percentage = number_format(($count / $totalCount) * 100, 2);
    $dataPoints[] = array("label" => $label, "y" => $count, "percentage" => $percentage );
}
?>

var allDataPoints = <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>;
var chartDataPoints = allDataPoints;
window.onload = function(){
  renderChart(chartDataPoints);
}

function filterData(){
    var studyProgram = document.getElementById('studyProgram').value.trim();
    if (studyProgram == '') {
      chartDataPoints = allDataPoints;
    } else {
      chartDataPoints = allDataPoints.filter(function(dataPoint) {
        return dataPoint.label === studyProgram;
      });
      
    }
    renderChart(chartDataPoints);
    // updateTotalCount(chartDataPoints);

}
function renderChart(dataPoints) {
    var chart = new CanvasJS.Chart("chartContainer", {
      theme: "light2",
      animationEnabled: true,
      exportEnabled: true,
      creditText: "",
      title: {
        text: "Peserta EPT"
      },
      data: [{
        type: "doughnut",
        indexLabel: "{label} - {percentage}%",
        showInLegend: true,
        legendText: "{label} : {y}",
        dataPoints: dataPoints
      }]
    });

    chart.render();
}
</script>
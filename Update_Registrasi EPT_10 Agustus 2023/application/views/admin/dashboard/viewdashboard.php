<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ept_registration";

// Create a connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}

$studyPrograms = array(
  array("label" => "S1 Akuntansi", "id_prodi" => 1),
  array("label" => "D3 Akuntansi", "id_prodi" => 2),
  array("label" => "Profesi Akuntansi (PPAK)", "id_prodi" => 3),
  array("label" => "S1 Manajemen", "id_prodi" => 4),
  array("label" => "D3 Manajemen", "id_prodi" => 5),
  array("label" => "Magister Manajemen", "id_prodi" => 6),
  array("label" => "S1 Teknik Informatika", "id_prodi" => 7),
  array("label" => "S1 Teknik Industri", "id_prodi" => 8),
  array("label" => "S1 Teknik Elektro", "id_prodi" => 9),
  array("label" => "S1 Teknik Mesin", "id_prodi" => 10),
  array("label" => "S1 Teknik Sipil", "id_prodi" => 11),
  array("label" => "S1 Bahasa Jepang", "id_prodi" => 12),
  array("label" => "D3 Bahasa Jepang", "id_prodi" => 13),
  array("label" => "S1 Bahasa Inggris", "id_prodi" => 14),
  array("label" => "D3 Multimedia", "id_prodi" => 15),
  array("label" => "D4 Desain Grafis", "id_prodi" => 16),
  array("label" => "Perdagangan Internasional", "id_prodi" => 18),
  array("label" => "Perpustakaan dan Sains Informasi", "id_prodi" => 19),
  array("label" => "Produksi Film & Televisi", "id_prodi" => 20),
  array("label" => "S1 Sistem Informasi", "id_prodi" => 21),
  array("label" => "D3 Teknik Mesin", "id_prodi" => 22),
  array("label" => "Magister Akutansi", "id_prodi" => 23),
);

$dataPoints = array();
$totalCount = 0;

foreach ($studyPrograms as $program) {
  $idProdi = $program['id_prodi'];
  $label = $program['label'];

  $query = "SELECT COUNT(*) AS count FROM tbl_peserta WHERE id_prodi = $idProdi";
  $result = mysqli_query($connection, $query);

  if ($result) {
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];

    $dataPoints[] = array("label" => $label, "y" => $count);

    $totalCount += $count;
  } else {
    echo "Error executing query: " . mysqli_error($connection);
  }
}

// Close the database connection
mysqli_close($connection);
?>





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
      foreach ($studyPrograms as $program) {
        $label = $program['label'];
        echo "<option value=\"$label\">$label</option>";
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
  var allDataPoints = <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>;
  var chartDataPoints = allDataPoints; // Initialize with all data points
  var totalCount = <?php echo $totalCount; ?>; // Total count from tbl_peserta

  function filterData() {
    var studyProgram = document.getElementById('studyProgram').value.trim();

    if (studyProgram !== '') {
      chartDataPoints = allDataPoints.filter(function(dataPoint) {
        return dataPoint.label === studyProgram;
      });
    } else {
      chartDataPoints = allDataPoints;
    }

    renderChart(chartDataPoints);
    updateTotalCount(chartDataPoints);
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
        indexLabel: "{label} - {y}%",
        yValueFormatString: "#,##0.00\"\"",
        showInLegend: true,
        legendText: "{label} : {y}%",
        dataPoints: dataPoints
      }]
    });

    chart.render();
  }

  function getTotalCount(dataPoints) {
    var count = 0;
    for (var i = 0; i < dataPoints.length; i++) {
      count += dataPoints[i].y;
    }
    return count.toFixed(0); // Return raw count as a whole number
  }

  function updateTotalCount(dataPoints) {
    var totalCountContainerId = document.getElementById("totalCountContainerId");

    var studyProgram = document.getElementById('studyProgram').value.trim();
    var count = 0;

    if (studyProgram === '') {
      totalCountContainerId.textContent = "";
    } else {
      var selectedDataPoints = dataPoints.filter(function(dataPoint) {
        return dataPoint.label === studyProgram;
      });

      if (selectedDataPoints.length > 0) {
        count = getTotalCount(selectedDataPoints);
        totalCountContainerId.textContent = "Total Count: " + count;
      } else {
        totalCountContainerId.textContent = "";
      }
    }
  }

  // Calculate the total count for all data points
  var totalCount = getTotalCount(allDataPoints);

  // Calculate the percentages for all data points
  for (var i = 0; i < allDataPoints.length; i++) {
    var percentage = (allDataPoints[i].y / totalCount * 100);
    allDataPoints[i].y = Math.min(percentage, 100).toFixed(2);
  }

  // Initial chart rendering
  renderChart(allDataPoints);
  updateTotalCount(allDataPoints);
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>English Proficency Test | Lembaga Bahasa Widyatama</title>
    <link rel="icon" sizes="76x76" href="https://ept-lembagabahasa.widyatama.ac.id/registration/assets/img/logo_widyatama.ico">
    <link rel="icon" type="image/png" href="https://ept-lembagabahasa.widyatama.ac.id/registration/assets/img/logo_widyatama.ico">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/custom/css/custom.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- fonts -->
    <link href='http://fonts.googleapis.com/css?family=Nixie+One' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fontawesome.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/lightbox.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styless.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">


</head>

<body>
    <!-- Sub Header -->
    <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-8">
                </div>
                <div class="col-lg-4 col-sm-4">
                    <div class="right-icons">
                        <ul>
                            <li><a href="https://www.youtube.com/channel/UCwFCeHJiQW_hwMyuabQYwmg"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="https://instagram.com/lembagabahasa.widyatama?igshid=YmMyMTA2M2Y="><i class="fab fa-instagram"></i></a></li>
                            <li><a href="https://www.tiktok.com/@lembagabahasa.widyatama?_t=8WPjrXHfC5q&_r=1"><i class="fab fa-tiktok"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="https://lembagabahasa.widyatama.ac.id/" class="logo">
                            Lembaga Bahasa Widyatama
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="<?php echo base_url(); ?>booking" class="active">Home</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- ***** Header Area End ***** -->
    <section class="contact-us pt-5" id="contact">
        <div class="header-text pt-5">
            <div class="container mt-5">
                <h2 class="mb-4">Detail Sertifikat Peserta</h2>
                <div class="wrapper">
                    <div class="chart-container">
                        <h5 class="chart-title">Chart Score per Section</h5>
                        <div class="chart" id="chart"></div>
                    </div>
                    <div class="card border-white" style="width: 300px; border-radius: 10px;">
                    <?php foreach($score as $score):?>
                        <?php $dataTanggal = DateTime::createFromFormat('d F Y', $score->tanggal);
                            $currentDate = new DateTime();

                            // Calculate the difference in years
                            $interval = $currentDate->diff($dataTanggal);
                            $yearsDifference = $interval->y;?>
                        <div class="card-body">
                            <div class="modal" id="popup">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="alert alert-warning d-flex flex-column" role="alert">
                                            <!-- <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg> -->
                                            <h4 class="alert-heading">Expired Certificate!</h4>
                                            <hr>
                                            <h5 class="card-title"><?php if ($yearsDifference >= 2){
                                            $expiredDate = $dataTanggal->add(new DateInterval('P2Y'))->format('d F Y');
                                            echo "Sertifikat sudah expired pada tanggal " . $expiredDate;
                                            }?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h5 class="card-title">Nama Mahasiswa</h5>
                            <h6 class="card-text mb-3 text-body-secondary" id="nama"><?php echo $score->nama?></h6>
                            
                            <h5 class="card-title">NPM</h5>
                            <h6 class="card-text mb-3 text-body-secondary" id="npm"><?php echo $score->npm?></h6>
                            
                            <?php foreach($nama as $nama):?>
                            <h5 class="card-title">Fakultas</h5>
                            <h6 class="card-text mb-3 text-body-secondary" id="fakultas"><?php if($nama->nama_fakultas){
                                echo $nama->nama_fakultas;
                                }else{
                                    echo "-";
                                }?></h6>
                            
                            <h5 class="card-title">Program Studi</h5>
                            <h6 class="card-text mb-3 text-body-secondary" id="prodi"><?php if($nama->nama_prodi){
                                echo $nama->nama_prodi;
                                }else{
                                    echo "-";
                                }?></h6>
                            <?php endforeach ?>
                            
                            <h5 class="card-title">Tanggal Ujian</h5>
                            <h6 class="card-text mb-2 text-body-secondary" id="tanggal"><?php echo $score->tanggal?></h6>

                            <h5 class="card-title">Score Test</h5>
                            <h6 class="card-text mb-2 text-body-secondary" id="jumlah_Score"><?php echo $score->score?></h6>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>

        <div class="footer">
            <p>Copyright &copy; <script>
                    document.write(new Date().getFullYear());
                </script> — Lembaga Bahasa. All Rights Reserved
                <br>
                <a href="#" target="_parent">Created by MBKM Team Widyatama 2022</a>
                <br>
            </p>
        </div>
    </section>


    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/video.js"></script>
    <script src="assets/js/slick-slider.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="http://code.jquery.com/jquery-3.1.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/custom/js/booking.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script type="text/javascript" src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <script type="text/javascript">
    <?php foreach($chart as $chart):?>    
    var sec1Total = <?php echo $chart->sec1?>;
    var sec2Total = <?php echo $chart->sec2?>;
    var sec3Total = <?php echo $chart->sec3?>;
    <?php endforeach;?>

    window.onload = function () {
        var options = {
            series: [sec1Total, sec2Total, sec3Total],
            chart: {
                width: 380,
                type: 'pie',
            },
            dataLabels: {
                enabled: false
            },
            labels: ['Section 1', 'Section 2', 'Section 3'],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                    width: 200
                    },
                    legend: {
                    show: false
                    }
                }
            }],
            legend: {
                position: 'right',
                offsetY: 0,
                height: 230,
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    }

    var yearsDifference = <?php echo $yearsDifference?>;
    if (yearsDifference >= 2) {
        $(document).ready(function () {
            $('#popup').modal('show');
        });
    }
</script>


</body>

</html>

<style>
    .mb-4{
        color: #ffff;
    }

    .wrapper{
        display: flex;
        justify-content: center;
        background-color: white;
        max-width: 800px;
        margin: auto;
        border-radius: 10px;
    }
    
    .alert-warning {
        margin: 0;
    }

    .chart-container{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .footer {
        bottom: 0;
        margin-top: 50px;
    }

</style>


<!-- Stage- Bootstrap one page Event ticket booking theme 
Created by pixpalette.com - online design magazine -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>TOEIC | Lembaga Bahasa Widyatama</title>
    <link rel="icon" sizes="76x76" href="https://ept-lembagabahasa.widyatama.ac.id/registration/assets/img/logo_widyatama.ico">
    <link rel="icon" type="image/png" href="https://ept-lembagabahasa.widyatama.ac.id/registration/assets/img/logo_widyatama.ico">
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/custom/css/custom.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- fonts -->
    <link href='http://fonts.googleapis.com/css?family=Nixie+One' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fontawesome.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/lightbox.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fcf.default.css">
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
                            <li><a href="<?php echo base_url(); ?>booking" class=" active">Home</a></li>
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

    <section class="contact-us" id="contact">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 align-self-center">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="contact" action="" method="post">
                                <div class="row">
                                    <h2>Data Mahasiswa yang Terdaftar dalam Test TOEIC Widyatama</h2>
                                    <br>
                                    <br>
                                    <div class="row" id="view_page">
                                        <div class="col-lg-12">
                                            <div class="table-responsive table-light">
                                                <table class="table">
                                                    <thead>
                                                        <br>
                                                        <br>
                                                        <tr style="text-align: center;">
                                                            <th>No</th>
                                                            <th>Tanggal Tes</th>
                                                            <th>Tipe Test</th>
                                                            <th>Waktu</th>
                                                            <th>Venue</th>
                                                            <th>Nama Lengkap</th>
                                                            <th>Status</th>
                                                            <th>NPM / NIK</th>
                                                            <th>Fakultas</th>
                                                            <th>Prodi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($event as $rp) : ?>
                                                            <tr>
                                                                <td width="20px"><?php echo $no++ ?></td>
                                                                <td><?php echo $rp->tanggal ?></td>
                                                                <td><?php echo $rp->typee ?></td>
                                                                <td><?php echo $rp->waktu ?></td>
                                                                <td><?php echo $rp->tempat ?></td>
                                                                <td><?php echo $rp->nama ?></td>
                                                                <td><?php echo $rp->statuss ?></td>
                                                                <td><?php echo $rp->npmm ?></td>
                                                                <td><?php echo $rp->fakultas ?></td>
                                                                <td><?php echo $rp->prodi ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="text-left" class="primary-btn">
                                            <a class="btn btn-dark" type="button" href="<?php echo base_url(); ?>TOEIC/jadwaltoeic"> Back </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
    <script type="text/javascript">
        var doSth = function() {

            var $md = $("#view_page");
            // Do something here
        };
        setInterval(doSth, 1000); //1000 is miliseconds
    </script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
            var
                direction = section.replace(/#/, ''),
                reqSection = $('.section').filter('[data-section="' + direction + '"]'),
                reqSectionPos = reqSection.offset().top - 0;

            if (isAnimate) {
                $('body, html').animate({
                        scrollTop: reqSectionPos
                    },
                    800);
            } else {
                $('body, html').scrollTop(reqSectionPos);
            }

        };

        var checkSection = function checkSection() {
            $('.section').each(function() {
                var
                    $this = $(this),
                    topEdge = $this.offset().top - 80,
                    bottomEdge = topEdge + $this.height(),
                    wScroll = $(window).scrollTop();
                if (topEdge < wScroll && bottomEdge > wScroll) {
                    var
                        currentId = $this.data('section'),
                        reqLink = $('a').filter('[href*=\\#' + currentId + ']');
                    reqLink.closest('li').addClass('active').
                    siblings().removeClass('active');
                }
            });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function(e) {
            e.preventDefault();
            showSection($(this).attr('href'), true);
        });

        $(window).scroll(function() {
            checkSection();
        });
    </script>


</body>

</html>
<style>
    .footer {
        text-align: center;
        margin-top: 200px;
        border-top: 1px solid rgba(250, 250, 250, 0.15);
        padding: 50px 0px;
    }

    .footer p {
        text-transform: uppercase;
        font-size: 14px;
        color: #fff;
    }

    .footer p a {
        color: #f5a425;
    }
</style>
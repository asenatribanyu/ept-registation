<!-- Stage- Bootstrap one page Event ticket booking theme 
Created by pixpalette.com - online design magazine -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>EPT | Lembaga Bahasa Widyatama</title>
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

    <section class="section main-banner header-text" id="top" data-section="section1" style="background-image:url(assets/images/meetings-page-bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="title-text">
                            <h2 style="color: white;">Score EPT Widyatama</h2>
                        </div>
                        <br>
                        <p style="color: white;">
                            Cek Score
                        </p>
                        <br>
                    </div>
                </div>
                <div class="row" style="margin-left: 5px;">
                    <div>
                        <form action="<?= base_url('search') ?>" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="keyword" placeholder="Harap Masukkan NPM / Nama ..." required>
                            </div>
                            <br>
                            <div class="text-center" class="primary-btn">
                                <button class="btn btn-primary" type="submit"> Cari </button>

                            </div>
                        </form>
                    </div>
                </div>
                <div>
                    <br>
                    <!-- PHP code to pass the dataFound flag to JavaScript -->
                    <?php if (!is_null($dataFound)) { ?>
                        <script>
                            var dataFound = <?php echo json_encode($dataFound); ?>;
                            var keyword = <?php echo json_encode($keyword); ?>;
                        </script>
                    <?php } ?>
                    <?php
                    // Function to convert date to "20 Juli 2023" format
                    function formatDate($dateString)
                    {
                        return date("j F Y", strtotime($dateString));
                    }
                    ?>

                    <br>
                    <div class="table-responsive">
                        <?php if (!is_null($keyword) && !empty($keyword)) : ?>
                            <?php if (!empty($dataResults)) : ?>
                                <table class=" table align-middle mb-0 bg-white">
                                    <thead>
                                        <br>
                                        <tr style="text-align: center;">
                                            <th>No</th>
                                            <th>Tanggal Tes</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>NPM</th>
                                            <th>Sec1</th>
                                            <th>Sec2</th>
                                            <th>Sec3</th>
                                            <th>Score</th>
                                            <th>Certificate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($dataResults as $row) : ?>
                                            <tr style="text-align: center;">
                                                <td width="20px"><?php echo $no++ ?></td>
                                                <td><?= formatDate($row['tanggal']) ?></td>
                                                <td><?= $row['nama'] ?></td>
                                                <td><?= $row['npm'] ?></td>
                                                <td><?= $row['sec1'] ?></td>
                                                <td><?= $row['sec2'] ?></td>
                                                <td><?= $row['sec3'] ?></td>
                                                <td><?= $row['score'] ?></td>
                                                <td><a href="<?php echo base_url(); ?>search/certificate/<?php echo $row['id_score']; ?>" class="btn btn-sm btn-primary">Download</a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else : ?>
                                <b>
                                    <p style="color: white;">No data found for keyword: <?= $keyword ?></p>
                                </b>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <br>
                    <p style="color:white"><b>*NOTE : </b>
                        <br>
                        1. Jika anda ingin print sertifikat, silahkan datang ke <b>Lembaga Bahasa Widyatama</b> di Gedung K Lantai 3.
                        <br>
                        2. Pengambilan sertifikat EPT dilaksanakan pada jam kerja Senin - Jumat pukul 08.00 - 16.00 dan Sabtu 08.00 - 12.00.
                    </p>
                </div>
            </div>
        </div>
        <br>
    </section>
    <section class="contact-us" id="contact">
        <div class="footer">
            <p class="text-light my-4 text-sm font-weight-normal">
                All rights reserved. Copyright © <script>
                    document.write(new Date().getFullYear())
                </script> Created by <a href="">MBKM Team Widyatama</a>.
            </p>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/isotope.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/owl-carousel.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lightbox.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/tabs.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/video.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/slick-slider.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
    <script src="http://code.jquery.com/jquery-3.1.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url(); ?><?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?><?php echo base_url(); ?>assets/custom/js/booking.js" type="text/javascript"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
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
<script>
    if (typeof dataFound !== 'undefined') {
        if (dataFound) {
            // Data found, show success alert
            Swal.fire({
                icon: 'success',
                title: 'Data Found',
                text: 'Data has been found according to the NPM / Nama: "' + keyword + '".',
                timer: 3000 // The alert will automatically close after 3 seconds
            });
        } else {
            // Data not found, show error alert
            Swal.fire({
                icon: 'error',
                title: 'Data Not Found',
                text: 'Data with NPM / Nama: "' + keyword + '" not found.',
                timer: 3000 // The alert will automatically close after 3 seconds
            });
        }
    }
</script>
<style>
    p {

        font-size: 100%;
        text-align: center;
    }

    h2 {
        text-align: center;
        font-size: 250%;
    }

    .footer {
        text-align: center;
        margin-top: 200px;
        border-top: 1px solid rgba(250, 250, 250, 0.15);
        padding: 10px 0px;
    }

    .footer p {
        text-transform: uppercase;
        font-size: 14px;
        color: #fff;
    }

    .footer p a {
        color: #f5a425;
    }

    button {
        display: flex;
        height: 3em;
        width: 100px;
        align-items: center;
        justify-content: center;
        background-color: #eeeeee4b;
        border-radius: 3px;
        letter-spacing: 1px;
        transition: all 0.2s linear;
        cursor: pointer;
        border: none;
        background: #fff;
    }

    button>svg {
        margin-right: 5px;
        margin-left: 5px;
        font-size: 20px;
        transition: all 0.4s ease-in;
    }

    button:hover>svg {
        font-size: 1.2em;
        transform: translateX(-5px);
    }

    button:hover {
        box-shadow: 9px 9px 33px #d1d1d1, -9px -9px 33px #ffffff;
        transform: translateY(-2px);
    }
</style>
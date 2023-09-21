<header class="header-2">
    <div class="page-header min-vh-75 relative" style="background-image: url('<?php echo base_url() ?>assets/images/bg2.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 text-center mx-auto">
                    <h1 class="text-white pt-3 mt-n5">Laporan TOEIC Widyatama</h1>
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
                        <div class="row">
                            <div class="column">
                                <div class="text-center" class="btn btn-primary btn-lg">
                                    <a href="<?php echo base_url(); ?>admin/pendaftar/pendaftartoeic/export" class="button6">Laporan Data Pendaftar</a>
                                </div>
                            </div>
                            <div class="column">
                                <div class="text-center" class="btn btn-primary btn-lg">
                                    <a href="<?php echo base_url(); ?>admin/peserta/pesertatoeic/export" class="button6">Laporan Data Peserta</a>
                                </div>
                            </div>
                            <div class="column">
                                <div class="text-center" class="btn btn-primary btn-lg">
                                    <a href="<?php echo base_url(); ?>admin/tanggal/tanggaltoeic/pertanggal" class="button6">Laporan Data Pertanggal</a>
                                </div>
                            </div>
                            <div class="column">
                                <div class="text-center" class="btn btn-primary btn-lg">
                                    <a href="<?php echo base_url(); ?>admin/score/scoretoeic/export" class="button6">Laporan Data Score</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>

<style>
    .row {
        display: flex;
    }

    .column {
        flex: 25%;
        padding: 5px;
    }

    a.button6 {
        display: inline-block;
        padding: 0.7em 1.4em;
        margin: 0 0.3em 0.3em 0;
        border-radius: 2em;
        box-sizing: border-box;
        text-decoration: none;
        font-family: 'Roboto', sans-serif;
        text-transform: uppercase;
        font-weight: 400;
        color: #FFFFFF;
        background-color: #3369ff;
        box-shadow: inset 0 -0.6em 0 -0.35em rgba(0, 0, 0, 0.17);
        text-align: center;
        position: relative;
    }

    a.button6:active {
        top: 0.1em;
    }

    @media all and (max-width:30em) {
        a.button6 {
            display: block;
            margin: 0.4em auto;
        }
    }
</style>
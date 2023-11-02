<header class="header-2">
    <div class="page-header min-vh-75 relative" style="background-image: url('<?php echo base_url() ?>assets/images/bg2.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 text-center mx-auto">
                    <h1 class="text-white pt-3 mt-n5">Laporan Data Pendaftar EPT</h1>
                    <p class="lead text-white mt-3">Filter Page</p>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="card card-body blur shadow-blur mx-3 mx-md-9 mt-n6">
    <section id="count-stats">
        <div class="container">
            <div class="row">
                <div class="col-lg mx-auto d-flex justify-content-evenly">
                    <div class="btn-group dropup">
                        <button class="btn btn-info btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                            Berdasarkan Fakultas
                        </button>
                        <ul class="dropdown-menu ">
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/pendaftar/pendaftar/filter">Ekonomi & Bisnis</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/pendaftar/pendaftar/filter">Teknik</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/pendaftar/pendaftar/filter">Ilmu Budaya</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/pendaftar/pendaftar/filter">Desain Komunikasi & Visual</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/pendaftar/pendaftar/filter">Ilmu Sosial & Politik</a></li>
                        </ul>
                    </div>
                    <div class="btn-group dropup">
                        <button class="btn btn-info btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                            Berdasarkan Program Studi
                        </button>
                        <ul class="dropdown-menu scrollable-menu">
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/pendaftar/pendaftar/filter">Akuntansi S1</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/pendaftar/pendaftar/filter">Akuntansi D3</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/pendaftar/pendaftar/filter">Magister Akuntansi</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/pendaftar/pendaftar/filter">Program Profesi Akuntansi (PPAk)</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/pendaftar/pendaftar/filter">Manajemen S1</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/pendaftar/pendaftar/filter">Manajemen D3</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/pendaftar/pendaftar/filter">Magister Manajemen</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/pendaftar/pendaftar/filter">Perdagangan Internasional S1</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/pendaftar/pendaftar/filter">Teknik Informatika S1</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/pendaftar/pendaftar/filter">Teknik Industri S1</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/pendaftar/pendaftar/filter">Sistem Informasi S1</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/pendaftar/pendaftar/filter">Teknik Elektro S1</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/pendaftar/pendaftar/filter">Teknik Mesin D3</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/pendaftar/pendaftar/filter">Teknik Mesin S1</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/pendaftar/pendaftar/filter">Teknik Sipil S1</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/pendaftar/pendaftar/filter">Bahasa Jepang S1</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/pendaftar/pendaftar/filter">Bahasa Jepang D3</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/pendaftar/pendaftar/filter">Bahasa Inggris S1</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/pendaftar/pendaftar/filter">Desain Grafis D4</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/pendaftar/pendaftar/filter">Multimedia D3</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/pendaftar/pendaftar/filter">Perpustakaan & Sains Informasi</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/pendaftar/pendaftar/filter">Produksi Film & Televisi</a></li>
                        </ul>
                    </div>
                    <div class="text-center" class="btn btn-info btn-lg">
                        <a href="<?php echo base_url(); ?>admin/pendaftar/pendaftar/export" class="button6">Lihat Semua Data</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    .scrollable-menu {
    height: auto;
    max-height: 200px;
    overflow-x: hidden;
    }

    .column {
        flex: 25%;
        padding: 5px;
    }

    .row {
        display: flex;
    }

    .btn-info {
        display: inline-block;
        padding: 0.7em 1.4em;
        margin: 0;
        border-radius: 10px;
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

    a.button6 {
        display: inline-block;
        padding: 0.7em 1.4em;
        margin: 0;
        border-radius: 10px;
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

    @media all and (max-width: 576px) {
        .row {
            flex-wrap: wrap;
            /* Allow columns to wrap to a new row on small screens */
        }

        .column {
            flex: 100%;
            /* Take up the full width of the row on small screens */
            margin-bottom: 10px;
            /* Add some space between the columns */
        }
    }
</style>
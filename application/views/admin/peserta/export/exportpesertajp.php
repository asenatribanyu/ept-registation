<header class="header-2">
    <div class="page-header min-vh-75 relative" style="background-image: url('<?php echo base_url() ?>assets/images/bg2.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 text-center mx-auto">
                    <h1 class="text-white pt-3 mt-n5">Laporan JLPT</h1>
                    <p class="lead text-white mt-3">Laporan Data JLPT</p>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="card card-body blur shadow-blur mx-2 mx-md-3 mt-n6">

    <div class="data-tables datatable-dark">
        <table class="table table-bordered table-striped table-hover" id="dataTable" style="width:100%">
            <thead>
                <tr style="text-align: center;">
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Status</th>
                    <th>NPM</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Fakultas</th>
                    <th>Prodi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($tbl_peserta_jp as $p) : ?>
                    <tr style="text-align: center;">
                        <td width="20px"><?php echo $no++ ?></td>
                        <td><?php echo $p->nama ?></td>
                        <td><?php echo $p->statuss ?></td>
                        <td><?php echo $p->npmm ?></td>
                        <td><?php echo $p->emaill ?></td>
                        <td><?php echo $p->nohp ?></td>
                        <td><?php echo $p->fakultas ?></td>
                        <td><?php echo $p->prodi ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
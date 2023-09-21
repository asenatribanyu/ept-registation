<header class="header-2">
    <div class="page-header min-vh-75 relative" style="background-image: url('<?php echo base_url() ?>assets/images/bg2.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 text-center mx-auto">
                    <h1 class="text-white pt-3 mt-n5">Laporan</h1>
                    <p class="lead text-white mt-3">Laporan Data Pertanggal</p>
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
                    <th>Tanggal Tes</th>
                    <th>Tipe Test</th>
                    <th>Waktu</th>
                    <th>Venue</th>
                    <th>Nama Lengkap</th>
                    <th>Status</th>
                    <th>NPM / NIK</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Fakultas</th>
                    <th>Prodi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($event as $r) : ?>
                    <tr style="text-align: center;">
                        <td width="20px"><?php echo $no++ ?></td>
                        <td><?php echo $r->tanggal ?></td>
                        <td><?php echo $r->typee ?></td>
                        <td><?php echo $r->waktu ?></td>
                        <td><?php echo $r->tempat ?></td>
                        <td><?php echo $r->nama ?></td>
                        <td><?php echo $r->statuss ?></td>
                        <td><?php echo $r->npmm ?></td>
                        <td><?php echo $r->emaill ?></td>
                        <td><?php echo $r->nohp ?></td>
                        <td><?php echo $r->fakultas ?></td>
                        <td><?php echo $r->prodi ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-left" class="primary-btn">
            <a class="btn btn-primary" type="button" href="<?php echo base_url(); ?>admin/tanggal/tanggalalumni/pertanggal"> Back </a>
        </div>
    </div>
</div>
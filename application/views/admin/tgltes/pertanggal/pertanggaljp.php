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
        <table class="table table-bordered table-striped table-hover" id="dataTable1" style="width:100%">
            <thead>
                <tr style="text-align: center;">
                    <th>No</th>
                    <th>Tanggal Tes</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($tbl_event_jp as $e) : ?>
                    <tr style="text-align: center;">
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $e->tanggal_event ?></td>
                        <td style="text-align: center;">
                            <a href="<?php echo base_url(); ?>admin/tanggal/tanggaljp/detailadmin/<?php echo $e->id_event_jp; ?>" class="btn btn-sm btn-info"></i>Lihat Data</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </form>
</div>
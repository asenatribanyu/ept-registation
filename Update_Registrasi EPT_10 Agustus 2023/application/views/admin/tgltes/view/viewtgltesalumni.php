<header class="header-2">
    <div class="page-header min-vh-75 relative" style="background-image: url('<?php echo base_url() ?>assets/images/bg2.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 text-center mx-auto">
                    <h1 class="text-white pt-3 mt-n5">Data Tanggal ALUMNI</h1>
                    <p class="lead text-white mt-3">Tabel Data Tanggal</p>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="card card-body blur shadow-blur mx-2 mx-md-3 mt-n6">

    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('admin/tanggal/Tanggal_ALUMNI/input', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"> Tambah Tanggal Tes</i></button>') ?>
    <form method="post" action="<?php echo base_url('admin/tanggal/Tanggal_ALUMNI/deletee') ?>" id="form-delete">
        <div class="data-tables datatable-dark">
            <table class="table table-bordered table-striped table-hover" id="dataTable1" style="width:100%">
                <thead>
                    <tr style="text-align: center;">
                        <th></th>
                        <th>No</th>
                        <th>Tanggal Tes</th>
                        <th>Status</th>
                        <th>Waktu</th>
                        <th>Venue</th>
                        <th>Kuota</th>
                        <th>Sisa Kuota</th>
                        <th>Aktifkan Tanggal Test</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($tbl_event_alumni as $e) : ?>
                        <tr style="text-align: center;">
                            <td><input type='checkbox' class='check-item' name='id_event_alumni[]' value='<?php echo $e->id_event_alumni ?>'></td>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $e->tanggal_event ?></td>
                            <td><?php echo $e->type ?></td>
                            <td><?php echo $e->time ?></td>
                            <td><?php echo $e->venue ?></td>
                            <td><?php echo $e->kuota ?></td>
                            <td><?php echo $e->sisa_kuota ?></td>
                            <td><?php echo $e->aktif ?></td>
                            <td style="text-align: center;">
                                <a href="<?php echo base_url(); ?>admin/tanggal/Tanggal_ALUMNI/update/<?php echo $e->id_event_alumni; ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                <a href="<?php echo base_url(); ?>admin/tanggal/Tanggal_ALUMNI/delete/<?php echo $e->id_event_alumni; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <h6><input type="checkbox" id="check-all"> check all</h6>
            <button type="button" id="btn-delete" class="btn btn-danger mb-5"><i class="fa fa-trash"></i> Delete</button>
        </div>
    </form>
</div>
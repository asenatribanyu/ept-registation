<header class="header-2">
    <div class="page-header min-vh-75 relative" style="background-image: url('<?php echo base_url() ?>assets/images/bg2.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 text-center mx-auto">
                    <h1 class="text-white pt-3 mt-n5">Data Peserta JLPT</h1>
                    <p class="lead text-white mt-3">Tabel Data Peserta</p>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="card card-body blur shadow-blur mx-2 mx-md-3 mt-n6">

    <?php echo $this->session->flashdata('pesan') ?>
    <form method="post" action="<?php echo base_url('admin/peserta/pesertajp/deletee') ?>" id="form-delete">
        <div class="data-tables datatable-dark">
            <table class="table table-bordered table-striped table-hover" id="dataTable1" style="width:100%">
                <thead>
                    <tr style="text-align: center;">
                        <th> </th>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Status</th>
                        <th>NPM / NIK</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Fakultas</th>
                        <th>Prodi</th>
                        <th style="width: 70px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($tbl_peserta_jp as $p) : ?>
                        <tr style="text-align: center;">
                            <td><input type='checkbox' class='check-item' name='id_peserta_jp[]' value='<?php echo $p->id_peserta_jp ?>'></td>
                            <td width="20px"><?php echo $no++ ?></td>
                            <td><?php echo $p->nama ?></td>
                            <td><?php echo $p->statuss ?></td>
                            <td><?php echo $p->npmm ?></td>
                            <td><?php echo $p->emaill ?></td>
                            <td><?php echo $p->nohp ?></td>
                            <td><?php echo $p->fakultas ?></td>
                            <td><?php echo $p->prodi ?></td>
                            <td style="text-align: center;">
                                <a href="<?php echo base_url(); ?>admin/peserta/pesertajp/update/<?php echo $p->id_peserta_jp; ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="<?php echo base_url(); ?>admin/peserta/pesertajp/delete/<?php echo $p->id_peserta_jp; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
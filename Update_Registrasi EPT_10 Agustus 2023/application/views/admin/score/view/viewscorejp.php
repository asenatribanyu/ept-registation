<header class="header-2">
    <div class="page-header min-vh-75 relative" style="background-image: url('<?php echo base_url() ?>assets/images/bg2.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 text-center mx-auto">
                    <h1 class="text-white pt-3 mt-n5">Score JLPT</h1>
                    <p class="lead text-white mt-3">Tabel Score JLPT</p>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="card card-body blur shadow-blur mx-2 mx-md-3 mt-n6">

    <?php echo $this->session->flashdata('message') ?>

    <?php echo anchor('admin/scorejp/create', '<button class="btn btn-sm btn-primary mb-3"><i class="fa fa-upload"> Import</i></button>') ?>

    <form method="post" action="<?php echo base_url('admin/scorejp/deletee') ?>" id="form-delete">
        <div class="data-tables datatable-dark">
            <table class="table table-bordered table-striped table-hover" id="dataTable1" style="width:100%">
                <thead>
                    <tr style="text-align: center;">
                        <th></th>
                        <th>No</th>
                        <th>Tanggal Tes</th>
                        <th>Nama Mahasiswa</th>
                        <th>NPM</th>
                        <th>Sec1</th>
                        <th>Sec2</th>
                        <th>Sec3</th>
                        <th>Score</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($tbl_score_jp as $s) : ?>
                        <tr style="text-align: center;">
                            <td><input type='checkbox' class='check-item' name='id_score_jp[]' value='<?php echo $s->id_score_jp ?>'></td>
                            <td width="20px"><?php echo $no++ ?></td>
                            <td><?php echo $s->tanggal ?></td>
                            <td><?php echo $s->nama ?></td>
                            <td><?php echo $s->npm ?></td>
                            <td><?php echo $s->sec1 ?></td>
                            <td><?php echo $s->sec2 ?></td>
                            <td><?php echo $s->sec3 ?></td>
                            <td><?php echo $s->score ?></td>
                            <td style="text-align: center;">
                                <a href="<?php echo base_url(); ?>admin/scorejp/delete/<?php echo $s->id_score_jp; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
<header class="header-2">
    <div class="page-header min-vh-75 relative" style="background-image: url('<?php echo base_url() ?>assets/images/bg2.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 text-center mx-auto">
                    <h1 class="text-white pt-3 mt-n5">Data Score Peserta EPT</h1>
                    <p class="lead text-white mt-3">Edit Data Score </p>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="card card-body blur shadow-blur mx-2 mx-md-3 mt-n6">
    <div class="container-fluid">
        <?php foreach ($tbl_score as $s) : ?>
            <?php echo form_open_multipart('admin/score/score/update_aksi') ?>
            <label>Tanggal Test</label>
            <div class="input-group input-group-outline mb-3">
                <input type="hidden" name="id_score" class="form-control border border-primary" value="<?php echo $s->id_score ?>">
                <input type="text" name="tanggal" class="form-control border border-primary" value="<?php echo $s->tanggal ?>" disabled>
                <br><?php echo form_error('tanggal', '<div class="text-danger small" ml-3>', '</div>') ?>
            </div>
            <label>Nama Peserta</label>
            <div class="input-group input-group-outline mb-3">
                <input type="text" name="nama" class="form-control border border-primary" value="<?php echo $s->nama ?>">
                <br><?php echo form_error('nama', '<div class="text-danger small" ml-3>', '</div>') ?>
            </div>
            <label>NPM</label>
            <div class="input-group input-group-outline mb-3">
                <input type="text" name="npm" class="form-control border border-primary" value="<?php echo $s->npm ?>">
                <br><?php echo form_error('npm', '<div class="text-danger small" ml-3>', '</div>') ?>
            </div>
            <label>Section 1</label>
            <div class="input-group input-group-outline mb-3">
                <input type="text" name="sec1" class="form-control border border-primary" value="<?php echo $s->sec1 ?>">
                <br><?php echo form_error('sec1', '<div class="text-danger small" ml-3>', '</div>') ?>
            </div>
            <label>Section 2</label>
            <div class="input-group input-group-outline mb-3">
                <input type="text" name="sec2" class="form-control border border-primary" value="<?php echo $s->sec2 ?>">
                <br><?php echo form_error('sec2', '<div class="text-danger small" ml-3>', '</div>') ?>
            </div>
            <label>Section 3</label>
            <div class="input-group input-group-outline mb-3">
                <input type="text" name="sec3" class="form-control border border-primary" value="<?php echo $s->sec3 ?>">
                <br><?php echo form_error('sec3', '<div class="text-danger small" ml-3>', '</div>') ?>
            </div>
            <label>Score</label>
            <div class="input-group input-group-outline mb-3">
                <input type="text" name="score" class="form-control border border-primary" value="<?php echo $s->score ?>">
                <br><?php echo form_error('score', '<div class="text-danger small" ml-3>', '</div>') ?>
            </div>
            <button type="submit" class="btn btn-primary mb-5">Simpan</button>
            <?php form_close(); ?>
        <?php endforeach; ?>
    </div>
</div>
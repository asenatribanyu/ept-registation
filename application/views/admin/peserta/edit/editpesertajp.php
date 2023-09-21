<header class="header-2">
    <div class="page-header min-vh-75 relative" style="background-image: url('<?php echo base_url() ?>assets/images/bg2.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 text-center mx-auto">
                    <h1 class="text-white pt-3 mt-n5">Data Peserta JLPT</h1>
                    <p class="lead text-white mt-3">Edit Data Peserta</p>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="card card-body blur shadow-blur mx-2 mx-md-3 mt-n6">
    <div class="container-fluid">
        <?php foreach ($tbl_peserta_jp as $p) : ?>
            <?php echo form_open_multipart('admin/peserta/pesertajp/update_aksi') ?>
            <label>Nama Peserta</label>
            <div class="input-group input-group-outline mb-3">
                <input type="hidden" name="id_peserta_jp" class="form-control border border-primary" value="<?php echo $p->id_peserta_jp ?>">
                <input type="text" name="nama_peserta" class="form-control border border-primary" value="<?php echo $p->nama_peserta ?>">
                <br><?php echo form_error('nama_peserta', '<div class="text-danger small" ml-3>', '</div>') ?>
            </div>
            <label>NPM</label>
            <div class="input-group input-group-outline mb-3">
                <input type="text" name="npm" class="form-control border border-primary" value="<?php echo $p->npm ?>">
                <br><?php echo form_error('npm', '<div class="text-danger small" ml-3>', '</div>') ?>
            </div>
            <label>Email</label>
            <div class="input-group input-group-outline mb-3">
                <input type="text" name="email" class="form-control border border-primary" value="<?php echo $p->email ?>">
                <br><?php echo form_error('email', '<div class="text-danger small" ml-3>', '</div>') ?>
            </div>
            <label>No HP</label>
            <div class="input-group input-group-outline mb-3">
                <input type="text" name="no_hp" class="form-control border border-primary" value="<?php echo $p->no_hp ?>">
                <br><?php echo form_error('no_hp', '<div class="text-danger small" ml-3>', '</div>') ?>
            </div>
            <button type="submit" class="btn btn-primary mb-5">Simpan</button>
            <?php form_close(); ?>
        <?php endforeach; ?>
    </div>
</div>
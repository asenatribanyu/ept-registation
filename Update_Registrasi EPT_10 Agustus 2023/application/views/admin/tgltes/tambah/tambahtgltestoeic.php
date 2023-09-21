<header class="header-2">
    <div class="page-header min-vh-75 relative" style="background-image: url('<?php echo base_url() ?>assets/images/bg2.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 text-center mx-auto">
                    <h1 class="text-white pt-3 mt-n5">Data Tanggal</h1>
                    <p class="lead text-white mt-3">Tambah Data Tanggal</p>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="card card-body blur shadow-blur mx-2 mx-md-3 mt-n6">
    <div class="container-fluid">
        <?php echo form_open_multipart('admin/tanggal/tanggaltoeic/simpandata') ?>
        <label>Tanggal Tes</label>
        <div class="input-group input-group-outline mb-3">
            <input type="date" name="tanggal_event" class="form-control border border-primary">
            <br><?php echo form_error('tanggal_event', '<div class="text-danger small" ml-3>', '</div>') ?>
        </div>
        <label>Status</label>
        <div class="input-group input-group-outline mb-3">
            <select name="type" class="form-control form-control-user border border-primary" required="">
                <option selected disabled>Pilih Status</option>
                <option>Online</option>
                <option>Offline</option>
            </select>
            <br><?php echo form_error('type', '<div class="text-danger small" ml-3>', '</div>') ?>
        </div>
        <label>Waktu Tes</label>
        <div class="input-group input-group-outline mb-3">
            <input type="time" name="time" class="form-control border border-primary">
            <br><?php echo form_error('time', '<div class="text-danger small" ml-3>', '</div>') ?>
        </div>
        <label>Venue</label>
        <div class="input-group input-group-outline mb-3">
            <input type="venue" name="venue" class="form-control border border-primary">
            <br><?php echo form_error('venue', '<div class="text-danger small" ml-3>', '</div>') ?>
        </div>
        <label>Kuota</label>
        <div class="input-group input-group-outline mb-3">
            <input type="number" name="kuota" placeholder="Masukkan Kuota" class="form-control border border-primary">
            <br><?php echo form_error('kuota', '<div class="text-danger small" ml-3>', '</div>') ?>
        </div>
        <div class="input-group input-group-outline mb-3">
            <input type="hidden" name="aktif" class="form-control border border-primary" value="Aktif">
            <br><?php echo form_error('aktif', '<div class="text-danger small" ml-3>', '</div>') ?>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Simpan</button>
        <?php form_close(); ?>
    </div>
</div>
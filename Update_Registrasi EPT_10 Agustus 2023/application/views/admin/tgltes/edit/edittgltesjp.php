<header class="header-2">
    <div class="page-header min-vh-75 relative" style="background-image: url('<?php echo base_url() ?>assets/images/bg2.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 text-center mx-auto">
                    <h1 class="text-white pt-3 mt-n5">Data Tanggal</h1>
                    <p class="lead text-white mt-3">Edit Data Tanggal</p>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="card card-body blur shadow-blur mx-2 mx-md-3 mt-n6">
    <div class="container-fluid">
        <?php foreach ($tbl_event_jp as $e) : ?>
            <?php echo form_open_multipart('admin/tanggal/Tanggal_JLPT/update_aksi') ?>
            <label>Tanggal Tes</label>
            <div class="input-group input-group-outline mb-3">
                <input type="hidden" name="id_event_jp" class="form-control border border-primary" value="<?php echo $e->id_event_jp ?>">
                <input type="date" name="tanggal_event" class="form-control border border-primary" value="<?php echo $e->tanggal_event ?>">
                <br><?php echo form_error('tanggal_event', '<div class="text-danger small" ml-3>', '</div>') ?>
            </div>
            <label>Status</label>
            <div class="input-group input-group-outline mb-3">
                <select name="type" class="form-control form-control-user border border-primary">
                    <option><?php echo $e->type ?></option>
                    <option>Offline</option>
                    <option>Online</option>
                </select>
                <br><?php echo form_error('type', '<div class="text-danger small" ml-3>', '</div>') ?>
            </div>
            <label>Waktu Tes</label>
            <div class="input-group input-group-outline mb-3">
                <input type="time" name="time" class="form-control border border-primary" value="<?php echo $e->time ?>">
                <br><?php echo form_error('time', '<div class="text-danger small" ml-3>', '</div>') ?>
            </div>
            <label>Venue</label>
            <div class="input-group input-group-outline mb-3">
                <select name="venue" class="form-control form-control-user border border-primary">
                    <option><?php echo $e->venue ?></option>
                    <option>Universitas Widyatama Gedung B.203</option>
                    <option>Universitas Widyatama Gedung K.312</option>
                    <option>Universitas Widyatama Gedung K.312 (Khusus Pascasarjana)</option>
                    <option>Khusus Pascasarjana (Online)</option>
                    <option>Khusus D3, D4 dan S1 (Online)</option>
                </select>
                <br><?php echo form_error('venue', '<div class="text-danger small" ml-3>', '</div>') ?>
            </div>
            <label>Kuota</label>
            <div class="input-group input-group-outline mb-3">
                <input type="number" name="kuota" class="form-control border border-primary" value="<?php echo $e->kuota ?>">
                <br><?php echo form_error('kuota', '<div class="text-danger small" ml-3>', '</div>') ?>
            </div>
            <div class="mb-3">
                <label for="aktif">Status Test : <span class="text-danger">*</span></label>
                <input type="radio" name="aktif" value="Aktif " required=""> Aktif
                <input type="radio" name="aktif" value="Tidak Aktif" required=""> Tidak Aktif
            </div>
            <button type="submit" class="btn btn-primary mb-5">Simpan</button>
            <?php form_close(); ?>
        <?php endforeach; ?>
    </div>
</div>
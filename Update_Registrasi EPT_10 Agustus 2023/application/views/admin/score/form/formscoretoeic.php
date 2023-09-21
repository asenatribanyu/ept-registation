<header class="header-2">
    <div class="page-header min-vh-75 relative" style="background-image: url('<?php echo base_url() ?>assets/images/bg2.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 text-center mx-auto">
                    <h1 class="text-white pt-3 mt-n5">Score TOEIC</h1>
                    <p class="lead text-white mt-3">Upload Score TOEIC</p>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="card card-body blur shadow-blur mx-2 mx-md-7 mt-n6">
    <div class="card-header">
        <h6>Upload File Excel</h6>
    </div>
    <form method="POST" action="<?= site_url('admin/scoretoeic/excel') ?>" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="file" name="file" accept=".xls, .xlsx" required>
                            <div class="mt-1">
                                <span class="text-secondary">File yang harus diupload : .xls, xlsx</span>
                            </div>
                            <?= form_error('file', '<div class="text-danger">', '</div>') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button type="submit" name="import" class="btn btn-primary"><i class="fas fa-upload mr-1"></i>Upload</button>
        </div>
    </form>
</div>
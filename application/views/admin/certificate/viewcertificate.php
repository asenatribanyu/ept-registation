<header class="header-2">
    <div class="page-header min-vh-75 relative" style="background-image: url('<?php echo base_url() ?>assets/images/bg2.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 text-center mx-auto">
                    <h1 class="text-white pt-3 mt-n5">Certificate</h1>
                    <p class="lead text-white mt-3">Upload</p>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="card card-body blur shadow-blur mx-2 mx-md-3 mt-n6">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6">
                <div class="card-header py-3">
                    <h6>Background Certificate</h6>
                </div>
                <div class="card-body card-block">
                    <div class="col-md-12">
                        <form id="bgcertificate" action="<?php echo base_url('#'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="input">
                                <input type="file" name="datafile" required>
                                <span class="text-secondary">File yang harus diupload: .jpg, .jpeg, .png</span>
                            </div>
                            <button type="submit" class="btn mx-auto btn-primary"><i class="fas fa-upload mr-1"></i>Upload Background Certificate</button><br>
                        </form>
                        <div id="loader" style="display: none;">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <span class="text-primary">Restoring database...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .row {
        justify-content: center;
    }

    #bgcertificate {
        display: flex;
        flex-direction: column;
    }

    .input {
        display: flex;
        flex-direction: column;
        margin-bottom: 50px;
    }
</style>
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
                    <h6>Background & Font Certificate</h6>
                </div>
                <div class="card-body card-block">
                    <div class="col-md-12">
                        <?php echo form_open_multipart('admin/certificate/upload_template');?>
                        <div class="container">
                            <div class="input">
                                <input type="file" name="datafile">
                                <span class="text-secondary">File yang harus diupload: .png</span>
                            </div>
                            <div class="input">
                                <input type="file" name="fontfile">
                                <span class="text-secondary">File yang harus diupload: .ttf</span>
                            </div>
                        </div>
                            <button type="submit" class="btn mx-auto btn-primary"><i class="fas fa-upload mr-1"></i>Upload Background/Font Certificate</button><br>
                        </form>
                        <?php if (!empty($error)) {
                                echo $error;
                            }?>
                            <?php if (!empty($success)) {
                                echo $success;
                            }?>
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

    .container {
        display: flex;
        justify-content: space-between;
        padding: 0;
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
<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
    // redirect them to your desired location
    header('location:..');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>EPT | Lembaga Bahasa Widyatama</title>
    <link rel="icon" sizes="76x76" href="https://ept-lembagabahasa.widyatama.ac.id/registration/assets/img/logo_widyatama.ico">
    <link rel="icon" type="image/png" href="https://ept-lembagabahasa.widyatama.ac.id/registration/assets/img/logo_widyatama.ico">
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/custom/css/custom.css" rel="stylesheet">

    <!-- fonts -->
    <link href='https://fonts.googleapis.com/css?family=Nixie+One' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--<script type="text/javascript">
        function load() {
            setTimeout(function() {
                alert("Batas Waktu Habis");
            }, 5000);
        }
    </script>-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        window.history.forward();
    </script>

</head>

<body onload="load()" style="background-color: #0000">
    <div class="col-lg-12">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <a href="https://lembagabahasa.widyatama.ac.id/"><img src="https://lembagabahasa.widyatama.ac.id/wp-content/uploads/2021/03/LOGO-LEMBAGA-BAHASA.png"></a>
                        <div class="title-text">
                            <h2>Formulir Pendaftaran</h2>
                            <h3>English Proficiency Test</h3>
                            <h4>( EPT )</h4>
                        </div>
                        <p>
                            Silahkan isi formulir dibawah ini.
                        </p>
                    </div>
                    <h4></h4>
                </div>
                <!-- /.col end-->
            </div>
            <form method="POST" id="form_registrasi">
                <div class="card shadow-sm mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-center">Registrasi Test </h6>
                        <div class="text-center"><b>Batas waktu mengisi form <span id="time">02:00</span> menit!</b></div>
                    </div>
                    <div class="card-body">
                        <h6>
                            <div class="text-left" class="event-date">
                                <span class="event_date" id="event_date">
                                    <?php
                                    $tgl = date('d M Y', strtotime($event->tanggal_event));
                                    ?>
                                    Tanggal Test : <?= $tgl; ?>
                                </span>
                            </div>
                        </h6>
                        <h6>Waktu Test : <?= (isset($event)) ? $event->time : ''; ?></h6>
                        <h6>Status Test : <?= (isset($event)) ? $event->type : ''; ?></h6>
                        <h6 hidden>Venue : <?= (isset($event)) ? $event->venue : ''; ?></h6>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-user" placeholder="Masukkan Nama Lengkap" id="nama" name="nama" required="">
                                </div>

                                <div>
                                    <label for="status">Status : <span class="text-danger">*</span></label>
                                    <input type="radio" name="status" value="Civitas " required=""> Civitas
                                    <input type="radio" name="status" value="Public" required=""> Public
                                </div>

                                <div class="form-group m-form__group">
                                    <label for="npm">NPM/NIK/NISN<span class="text-danger">*</span></label>

                                    <input type="text" class="form-control form-control-user" placeholder="Masukkan NPM/NIK/NISN" id="npm" name="npm" required="">
                                    <p style="color:gray;font-size:13px;" id="npmStatus">*ket : Civitas diisikan NPM, Public diisikan NIK/NISN</p>
                                </div>

                                <div class="form-group">
                                    <label for="email">Alamat Email<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Masukkan Alamat Email" id="email" name="email" oninput="validateEmail()" required="">
                                    <p style="color:gray;font-size:13px;" id="emailStatus">*ket : diisi dengan email @widyatama.ac.id/@gmail.com</p>
                                </div>

                                <!-- <div class="form-group">
                            <label for="tgl_tes">Tanggal Tes<span class="m--font-danger">*</span></label>
                            <input type="text" class="form-control m-input" id="end_date_event" name="end_date_event">
                        </div> -->
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="handphone">No. Handphone<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-user" placeholder="Masukkan Nomor Handphone" id="handphone" name="handphone" required="">
                                </div>

                                <div class="form-group">
                                    <label for="fakultas">Fakultas<span class="text-danger">*</span></label>
                                    <select class="form-control form-control-user" id="fakultas" name="fakultas" required>
                                        <option value="">--Pilih Fakultas--</option>
                                        <?php if (!empty($fakultas)) : ?>
                                            <?php foreach ($fakultas as $fa) : ?>
                                                <option value="<?= $fa->id_fakultas; ?>"><?= $fa->nama_fakultas; ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="prodi">Program Studi<span class="text-danger">*</span></label>
                                    <select name="prodi" id="prodi" class="form-control form-control-user" required>
                                        <option value="">--Pilih Program Studi--</option>
                                    </select>
                                </div>

                                <div class="form-group m-form__group">
                                    <b>
                                        <p style="color:gray;font-size:13px;">*ket :</p>
                                        <p style="color:gray;font-size:13px;">- Harap data diisi semua, dan pastikan sudah benar</p>
                                        <p style="color:gray;font-size:13px;">- Jika email konfirmasi tidak masuk Inbox, cek pada bagian spam email!</p>
                                    </b>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" data-toggle="modal" data-target="#exampleModal" id="exampleCheck1" required="">
                                    <label class="form-check-label" for="exampleCheck1">Syarat & Ketentuan yang Berlaku<span class="text-danger">*</span></label>
                                    <!-- Modal -->
                                    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><span class="text-danger">*</span>Syarat dan Ketentuan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <b>EPT ini untuk mahasiswa aktif Universitas Widyatama dengan ketentuan : </b>
                                                    <br>
                                                    1. Mahasiswa yang akan sidang (<b>WAJIB</b> melampirkan kartu bimbingan yang menunjukkan progress bimbingan tugas akhir) atau
                                                    <br>
                                                    2. Mahasiswa yang akan mengambil ijazah (melampirkan catatan <b>revisi dosen penguji</b>)
                                                    <br>
                                                    3. </a>Peserta hanya bisa registrasi satu kali dan bukti pembayaran dari PUPD sesuai dengan tanggal test yang dipilih
                                                    <br>
                                                    4. Untuk persyaratan nomor 1 atau 2, dan nomor 3 di kirim ke email : <a href="mailto:lembagabahasa.widyatama@ac.id">lembagabahasa.widyatama@ac.id</a>
                                                    <br>
                                                    5. Apabila peserta tidak dapat mengikuti test pada tanggal yang sudah dipilih, maka <b>pembayaran akan hangus dan tidak dapat melakukan penjadwalan ulang</b>
                                                    <br>
                                                    6. Mahasiswa yang sudah mendaftar di offline <b>TIDAK BOLEH</b> mendaftar kembali di test online
                                                    <br>
                                                    7. <b>BERLAKU UNTUK SEMUA PRODI</b>
                                                    <br>
                                                    <span class="text-danger">*</span>dengan menyetujui syarat dan ketentuan diatas maka, mahasiswa <b>BERSEDIA</b> untuk mengikuti peraturan yang ditetapkan oleh Lembaga Bahasa Widyatama</h5>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" id="register" class="btn btn-primary">Setuju & Daftar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" id="id_event" name="id_event" value="<?= (isset($event)) ? $event->id_event : ''; ?>">
                                <input type="hidden" id="tgl_event" name="tgl_event" value="<?= $tgl; ?>">
                                <input type="hidden" id="waktu" name="waktu" value="<?= (isset($event)) ? $event->time : ''; ?>">
                                <input type="hidden" id="type" name="type" value="<?= (isset($event)) ? $event->type : ''; ?>">
                                <input type="hidden" id="tempat" name="tempat" value="<?= (isset($event)) ? $event->venue : ''; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <p id="error"></p>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/js/allscript.js"></script> -->
    <script src="<?php echo base_url(); ?>/assets/custom/js/booking.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".register").click(function() {
                    this.submit();
                    this.disabled = true;
                    return true;
                }

            );
        });
    </script>
    <script>
        var isSweetAlertOpen = false; // Variable to track if SweetAlert is open

        function startTimer(duration, display) {
            var timer = duration,
                minutes, seconds;

            var interval = setInterval(function() {
                minutes = Math.floor(timer / 60);
                seconds = timer % 60;

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;
                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    clearInterval(interval);

                    // Check if SweetAlert is already open
                    if (!isSweetAlertOpen) {
                        isSweetAlertOpen = true;

                        Swal.fire({
                            title: 'Batas Waktu Habis',
                            icon: 'warning',
                            confirmButtonText: 'OK',
                            allowOutsideClick: false
                        }).then(() => {
                            window.location.assign('https://lembagabahasa.widyatama.ac.id/english-proficiency-test-ept/');
                        }).finally(() => {
                            isSweetAlertOpen = false; // Reset flag to indicate SweetAlert is closed

                            // Replace current URL to prevent going back or reloading
                            history.pushState(null, null, window.location.href);
                            window.addEventListener('popstate', function() {
                                history.pushState(null, null, window.location.href);
                            });
                        });
                    }
                }
            }, 1000);
        }

        window.onload = function() {
            var fiveMinutes = 120, // 10 minutes in seconds
                display = document.querySelector('#time');
            startTimer(fiveMinutes, display);
        };
    </script>

</body>

</html>
<script>
    function validateEmail() {
        var email = document.getElementById("email").value;
        var pattern = /^[a-zA-Z0-9._%+-]+@widyatama\.ac\.id|@gmail\.com$/;
        var isValid = pattern.test(email);

        if (isValid) {
            document.getElementById("emailStatus").textContent = "Email is valid!";
            document.getElementById("emailStatus").style.color = "green";
            document.getElementById("emailStatus").style.fontSize = "13px";
            document.getElementById("register").disabled = false;
        } else {
            document.getElementById("emailStatus").textContent = "Invalid email format!";
            document.getElementById("emailStatus").style.color = "red";
            document.getElementById("emailStatus").style.fontSize = "13px";
            document.getElementById("register").disabled = true;
        }
    }
</script>
<style>
    .title-text img {
        position: absolute;
        float: center;
        left: 50px;
    }

    footer {
        position: relative;
        bottom: 0;
        height: 100px;
        width: 100%;
        background-color: #333333;
    }

    p.copyright {
        position: absolute;
        width: 100%;
        color: #fff;
        line-height: 40px;
        font-size: 1.0em;
        text-align: center;
        bottom: 0;
        top: 40%;
        left: 40%;
        transform: translate(-40%, -40%);
    }

    p.designed-by {
        position: absolute;
        width: 100%;
        color: #fff;
        font-size: 1.0em;
        text-align: center;
        bottom: 1;
        top: 60%;
    }
</style>
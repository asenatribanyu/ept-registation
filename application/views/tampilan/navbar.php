<body class="index-page bg-gray-200">


  <!-- Navbar -->
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <nav class="navbar navbar-expand-lg  blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
          <div class="container-fluid px-0">
            <a class="navbar-brand font-weight-bolder ms-sm-3" href="<?php echo base_url('admin/dashboard') ?>">
              <img src="https://ept-lembagabahasa.widyatama.ac.id/registration/assets/img/logo_widyatama.ico">
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
              <ul class="navbar-nav navbar-nav-hover ms-auto">
                <?php if($this->session->userdata['role_id'] === '1'): ?>
                  <li class="nav-item dropdown dropdown-hover mx-2">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuBlocks" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="material-icons opacity-6 me-2 text-md">assignment_ind</i>
                      Data Pendaftar
                      <img src="<?php echo base_url() ?>/assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-auto ms-md-2">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md dropdown-md-responsive p-3 border-radius-lg mt-0 mt-lg-3" aria-labelledby="dropdownMenuBlocks">
                      <div class="d-none d-lg-block">
                        <a href="<?php echo base_url('admin/pendaftar/pendaftar') ?>" class="dropdown-item border-radius-md">
                          <span>Tabel Data Pendaftar EPT</span>
                        </a>
                        <a href="<?php echo base_url('admin/pendaftar/pendaftarjp') ?>" class="dropdown-item border-radius-md">
                          <span>Tabel Data Pendaftar JLPT</span>
                        </a>
                        <a href="<?php echo base_url('admin/pendaftar/pendaftartoeic') ?>" class="dropdown-item border-radius-md">
                          <span>Tabel Data Pendaftar TOEIC</span>
                        </a>
                        <a href="<?php echo base_url('admin/pendaftar/pendaftaralumni') ?>" class="dropdown-item border-radius-md">
                          <span>Tabel Data Pendaftar ALUMNI</span>
                        </a>
                      </div>
                      <div class="d-lg-none">
                        <a href="<?php echo base_url('admin/pendaftar/pendaftar') ?>" class="dropdown-item border-radius-md">
                          <span>Tabel Data Pendaftar</span>
                        </a>
                      </div>
                    </ul>
                  </li>

                  <li class="nav-item dropdown dropdown-hover mx-2">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuBlocks" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="material-icons opacity-6 me-2 text-md">today</i>
                      Tanggal
                      <img src="<?php echo base_url() ?>/assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-auto ms-md-2">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md dropdown-md-responsive p-3 border-radius-lg mt-0 mt-lg-3" aria-labelledby="dropdownMenuBlocks">
                      <div class="d-none d-lg-block">
                        <a href="<?php echo base_url('admin/tanggal/tanggal') ?>" class="dropdown-item border-radius-md">
                          <span>Tabel Data Tanggal EPT</span>
                        </a>
                        <a href="<?php echo base_url('admin/tanggal/tanggal_JLPT') ?>" class="dropdown-item border-radius-md">
                          <span>Tabel Data Tanggal JLPT</span>
                        </a>
                        <a href="<?php echo base_url('admin/tanggal/tanggaltoeic') ?>" class="dropdown-item border-radius-md">
                          <span>Tabel Data Tanggal TOEIC</span>
                        </a>
                        <a href="<?php echo base_url('admin/tanggal/Tanggal_ALUMNI') ?>" class="dropdown-item border-radius-md">
                          <span>Tabel Data Tanggal ALUMNI</span>
                        </a>
                      </div>
                      <div class="d-lg-none">
                        <a href="<?php echo base_url('admin/tanggal/tanggal') ?>" class="dropdown-item border-radius-md">
                          <span>Tabel Data Tanggal</span>
                        </a>
                      </div>
                    </ul>
                  </li>

                  <li class="nav-item dropdown dropdown-hover mx-2">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="material-icons opacity-6 me-2 text-md">group</i>
                      Data Peserta
                      <img src="<?php echo base_url() ?>/assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-auto ms-md-2">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md dropdown-md-responsive p-3 border-radius-lg mt-0 mt-lg-3" aria-labelledby="dropdownMenuBlocks">
                      <div class="d-none d-lg-block">
                        <a href="<?php echo base_url('admin/peserta/peserta') ?>" class="dropdown-item border-radius-md">
                          <span>Tabel Data Peserta EPT</span>
                        </a>
                        <a href="<?php echo base_url('admin/peserta/pesertajp') ?>" class="dropdown-item border-radius-md">
                          <span>Tabel Data Peserta JLPT</span>
                        </a>
                        <a href="<?php echo base_url('admin/peserta/pesertatoeic') ?>" class="dropdown-item border-radius-md">
                          <span>Tabel Data Peserta TOEIC</span>
                        </a>
                        <a href="<?php echo base_url('admin/peserta/pesertaalumni') ?>" class="dropdown-item border-radius-md">
                          <span>Tabel Data Peserta ALUMNI</span>
                        </a>
                      </div>
                      <div class="d-lg-none">
                        <a href="<?php echo base_url('admin/peserta/peserta') ?>" class="dropdown-item border-radius-md">
                          <span>Tabel Data Peserta</span>
                        </a>
                      </div>
                    </ul>
                  </li>

                  <li class="nav-item dropdown dropdown-hover mx-2">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="material-icons opacity-6 me-2 text-md">show_chart</i>
                      Score
                      <img src="<?php echo base_url() ?>/assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-auto ms-md-2">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md dropdown-md-responsive p-3 border-radius-lg mt-0 mt-lg-3" aria-labelledby="dropdownMenuBlocks">
                      <div class="d-none d-lg-block">
                        <a href="<?php echo base_url('admin/score/score') ?>" class="dropdown-item border-radius-md">
                          <span>Tabel Score EPT</span>
                        </a>
                        <a href="<?php echo base_url('admin/score/scorejp') ?>" class="dropdown-item border-radius-md">
                          <span>Tabel Score JLPT</span>
                        </a>
                        <a href="<?php echo base_url('admin/score/scoretoeic') ?>" class="dropdown-item border-radius-md">
                          <span>Tabel Score TOEIC</span>
                        </a>
                      </div>
                      <div class="d-lg-none">
                        <a href="<?php echo base_url('admin/score/score') ?>" class="dropdown-item border-radius-md">
                          <span>Tabel Score EPT</span>
                        </a>
                      </div>
                    </ul>
                  </li>
                <?php endif; ?>
                  

                  <li class="nav-item dropdown dropdown-hover mx-2">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuBlocks" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="material-icons opacity-6 me-2 text-md">assignment_ind</i>
                      Laporan
                      <img src="<?php echo base_url() ?>/assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-auto ms-md-2">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md dropdown-md-responsive p-3 border-radius-lg mt-0 mt-lg-3" aria-labelledby="dropdownMenuBlocks">
                      <div class="d-none d-lg-block">
                        <a href="<?php echo base_url('admin/dashboard/laporan_EPT') ?>" class="dropdown-item border-radius-md">
                          <span>EPT</span>
                        </a>
                        <a href="<?php echo base_url('admin/dashboard/laporan_JLPT') ?>" class="dropdown-item border-radius-md">
                          <span>JLPT</span>
                        </a>
                        <a href="<?php echo base_url('admin/dashboard/laporan_TOEIC') ?>" class="dropdown-item border-radius-md">
                          <span>TOEIC</span>
                        </a>
                        <a href="<?php echo base_url('admin/dashboard/laporan_ALUMNI') ?>" class="dropdown-item border-radius-md">
                          <span>ALUMNI</span>
                        </a>
                      </div>
                      <div class="d-lg-none">
                        <a href="<?php echo base_url('admin/dashboard/laporan_EPT') ?>" class="dropdown-item border-radius-md">
                          <span>EPT</span>
                        </a>
                      </div>
                    </ul>
                  </li>

                <?php if($this->session->userdata['role_id'] === '1'): ?>
                  <li class="nav-item dropdown dropdown-hover mx-2">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="material-icons opacity-6 me-2 text-md">settings_backup_restore</i>
                      Backup & Restore
                      <img src="<?php echo base_url() ?>/assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-auto ms-md-2">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md dropdown-md-responsive p-3 border-radius-lg mt-0 mt-lg-3" aria-labelledby="dropdownMenuBlocks">
                      <div class="d-none d-lg-block">
                        <a href="<?php echo base_url('admin/backup') ?>" class="dropdown-item border-radius-md">
                          <span>Backup & Restore Database</span>
                        </a>
                      </div>
                      <div class="d-lg-none">
                        <a href="<?php echo base_url('admin/backup') ?>" class="dropdown-item border-radius-md">
                          <span>Backup & Restore Database</span>
                        </a>
                      </div>
                    </ul>
                  </li>
                

                <li class="nav-item dropdown dropdown-hover mx-2">
                  <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="material-icons opacity-6 me-2 text-md">settings_backup_restore</i>
                    Certificate
                    <img src="<?php echo base_url() ?>/assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-auto ms-md-2">
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md dropdown-md-responsive p-3 border-radius-lg mt-0 mt-lg-3" aria-labelledby="dropdownMenuBlocks">
                    <div class="d-none d-lg-block">
                      <a href="<?php echo base_url('admin/certificate') ?>" class="dropdown-item border-radius-md">
                        <span>Certificate</span>
                      </a>
                    </div>
                    <div class="d-lg-none">
                      <a href="<?php echo base_url('admin/certificate') ?>" class="dropdown-item border-radius-md">
                        <span>Certificate</span>
                      </a>
                    </div>
                  </ul>
                </li>
                <?php endif; ?>
                  <li class="nav-item my-auto ms-3 ms-lg-3">
                    <a href="#" onclick="logout()" class="btn btn-sm bg-gradient-primary mb-0 me-1 mt-2 mt-md-0">Logout</a>
                  </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
  <script>
    function logout() {
      // Display a SweetAlert confirmation dialog
      Swal.fire({
        icon: 'warning',
        title: 'Logout',
        text: 'Are you sure you want to logout?',
        showCancelButton: true,
        confirmButtonText: 'Yes, logout',
        cancelButtonText: 'Cancel'
      }).then((result) => {
        if (result.isConfirmed) {
          // Send an AJAX request to the logout endpoint
          $.ajax({
            url: '<?php echo base_url() ?>admin/dashboard/logout',
            type: 'GET',
            success: function(response) {
              // Display success message when logout is successful
              Swal.fire('Logged Out!', 'You have been logged out.', 'success').then(() => {
                // Redirect to the login page
                window.location.href = '<?php echo base_url() ?>login';
              });
            }
          });
        }
      });
    }
  </script>
<header class="header-2">
  <div class="page-header min-vh-75 relative" style="background-image: url('<?php echo base_url() ?>assets/images/bg2.jpg')">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 text-center mx-auto">
          <h1 class="text-white pt-3 mt-n5">Backup & Restore</h1>
          <p class="lead text-white mt-3">Database</p>
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
          <h6>Backup</h6>
        </div>
        <div class="card-body card-block">
          <div class="col-md-12">
            <button id="backupButton" type="button" class="btn btn-primary"><i class="fas fa-download mr-1"></i>Backup Database</button><br>
            <span class="text-secondary">File yang didownload: .zip</span>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="card-header py-3">
          <h6>Restore</h6>
        </div>
        <div class="card-body card-block">
          <div class="col-md-12">
            <form id="restoreForm" action="<?php echo base_url('admin/backup/restore'); ?>" method="POST" enctype="multipart/form-data">
              <input type="file" name="datafile" required>
              <button type="submit" class="btn btn-primary"><i class="fas fa-upload mr-1"></i>Restore Database</button><br>
              <span class="text-secondary">File yang harus diupload: .sql</span>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  $(document).ready(function() {
    $('#restoreForm').submit(function(event) {
      event.preventDefault(); // Prevent form submission

      // Display the loader and hide the form
      $('#restoreForm').hide();
      $('#loader').show();

      // Display a SweetAlert confirmation dialog
      Swal.fire({
        icon: 'warning',
        title: 'Restore Database',
        text: 'Are you sure you want to restore the database?',
        showCancelButton: true,
        confirmButtonText: 'Yes, restore',
        cancelButtonText: 'Cancel',
        allowOutsideClick: false,
        allowEscapeKey: false
      }).then((result) => {
        if (result.isConfirmed) {
          // Submit the form via AJAX
          $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(response) {
              // Hide the loader
              $('#loader').hide();

              // Display success message when restore is successful
              Swal.fire({
                icon: 'success',
                title: 'Restored!',
                text: 'The database has been restored.',
                allowOutsideClick: false,
                allowEscapeKey: false
              }).then(() => {
                // Redirect to the desired page
                window.location.href = '<?php echo base_url(); ?>admin/dashboard';
              });
            }
          }).done(function(response) {
            // Handle the response and perform the redirect here
            if (response == 'success') {
              window.location.href = '<?php echo base_url(); ?>admin/dashboard';
            } else {
              // Hide the loader and show the form again
              $('#loader').hide();
              $('#restoreForm').show();

              // Handle the error case if needed
            }
          });
        } else {
          // Hide the loader and show the form again
          $('#loader').hide();
          $('#restoreForm').show();
        }
      });
    });
  });
</script>
<script>
  $(document).ready(function() {
    $('#backupButton').click(function() {
      Swal.fire({
        icon: 'question',
        title: 'Backup Database',
        text: 'Are you sure you want to download this database?',
        showCancelButton: true,
        confirmButtonText: 'Yes, download',
        cancelButtonText: 'Cancel',
        allowOutsideClick: false,
        allowEscapeKey: false,
        showLoaderOnConfirm: true,
        preConfirm: () => {
          return new Promise((resolve) => {
            // Simulate an AJAX request with a delay
            setTimeout(() => {
              resolve();
            }, 2000);
          });
        },
        onBeforeOpen: () => {
          Swal.showLoading();
        },
        onClose: () => {
          Swal.hideLoading();
        }
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = '<?php echo base_url(); ?>admin/backup/backup';
        }
      });
    });
  });
</script>
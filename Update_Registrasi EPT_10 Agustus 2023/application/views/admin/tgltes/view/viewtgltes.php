<header class="header-2">
  <div class="page-header min-vh-75 relative" style="background-image: url('<?php echo base_url() ?>assets/images/bg2.jpg')">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 text-center mx-auto">
          <h1 class="text-white pt-3 mt-n5">Tanggal EPT</h1>
          <p class="lead text-white mt-3">Tabel Data Tanggal</p>
        </div>
      </div>
    </div>
  </div>
</header>

<div class="card card-body blur shadow-blur mx-2 mx-md-3 mt-n6">
  <div>
    <?php echo anchor('admin/tanggal/tanggal/input', '<button class="btn btn-sm btn-primary mb-3" id="btn-add"><i class="fas fa-plus fa-sm"> Tambah Tanggal Tes</i></button>') ?>
  </div>
  <form method="post" action="<?php echo base_url('admin/tanggal/tanggal/deletee') ?>" id="form-delete">
    <div class="data-tables datatable-dark">
      <table class="table table-bordered table-striped table-hover" id="dataTable1" style="width:100%">
        <thead>
          <tr style="text-align: center;">
            <th></th>
            <th>No</th>
            <th>Tanggal Tes</th>
            <th>Status</th>
            <th>Waktu</th>
            <th>Venue</th>
            <th>Kuota</th>
            <th>Sisa Kuota</th>
            <th>Aktifkan Tanggal Test</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($tbl_event as $e) : ?>
            <tr style="text-align: center;">
              <td><input type="checkbox" class="check-item" value="<?php echo $e->id_event; ?>" /></td>
              <td><?php echo $no++ ?></td>
              <td><?php echo $e->tanggal_event ?></td>
              <td><?php echo $e->type ?></td>
              <td><?php echo $e->time ?></td>
              <td><?php echo $e->venue ?></td>
              <td><?php echo $e->kuota ?></td>
              <td><?php echo $e->sisa_kuota ?></td>
              <td><?php echo $e->aktif ?></td>
              <td style="text-align: center;">
                <a href="<?php echo base_url(); ?>admin/tanggal/tanggal/update/<?php echo $e->id_event; ?>" class="btn btn-sm btn-primary update-button"><i class="fa fa-edit"></i></a>
                <a href="<?php echo base_url(); ?>admin/tanggal/tanggal/delete/<?php echo $e->id_event; ?>" class="btn btn-sm btn-danger delete-button"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <h6><input type="checkbox" id="check-all"> check all</h6>
      <button class="button" id="btn-delete">
        <svg viewBox="0 0 448 512" class="svgIcon">
          <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path>
        </svg>
      </button>
    </div>
  </form>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Check/Uncheck all checkboxes
    $('#check-all').on('click', function() {
      if ($(this).is(':checked')) {
        $('.check-item').prop('checked', true);
      } else {
        $('.check-item').prop('checked', false);
      }
    });

    $('#btn-add').on('click', function(e) {
      e.preventDefault();

      // Display a SweetAlert confirmation dialog
      Swal.fire({
        icon: 'warning',
        title: 'Tambah Tanggal Tes',
        text: 'Are you sure you want to add a new date?',
        showCancelButton: true,
        confirmButtonText: 'Yes, add',
        cancelButtonText: 'Cancel',
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
          // Redirect to the add page
          window.location.href = '<?php echo base_url("admin/tanggal/tanggal/input"); ?>';
        }
      });
    });
    // Update button click event
    $('.update-button').on('click', function(e) {
      e.preventDefault();
      var url = $(this).attr('href');

      // Display a SweetAlert confirmation dialog
      Swal.fire({
        icon: 'warning',
        title: 'Update',
        text: 'Are you sure you want to update?',
        showCancelButton: true,
        confirmButtonText: 'Yes, update',
        cancelButtonText: 'Cancel',
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
          // Redirect to the update page
          window.location.href = url;
        }
      });
    });

    // Delete button click event
    $('.delete-button').on('click', function(e) {
      e.preventDefault();
      var url = $(this).attr('href');

      // Display a SweetAlert confirmation dialog
      Swal.fire({
        icon: 'warning',
        title: 'Delete',
        text: 'Are you sure you want to delete?',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete',
        cancelButtonText: 'Cancel',
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
          // Send an AJAX request to the delete endpoint
          $.ajax({
            url: url,
            type: 'POST',
            data: {},
            success: function(response) {
              // Display success message when delete is successful
              Swal.fire({
                icon: 'success',
                title: 'Deleted!',
                text: 'The record has been deleted.',
                allowOutsideClick: false,
                allowEscapeKey: false
              }).then((result) => {
                if (result.isConfirmed) {
                  // Refresh the page
                  location.reload();
                }
              });
            }
          });
        }
      });
    });

    // Delete button click event for multiple items
    $('#btn-delete').on('click', function(e) {
      e.preventDefault();

      // Get the selected checkboxes
      var selectedItems = $('.check-item:checked');

      if (selectedItems.length === 0) {
        Swal.fire('No Items Selected', 'Please select at least one item to delete.', 'info');
        return;
      }

      // Display a SweetAlert confirmation dialog
      Swal.fire({
        icon: 'warning',
        title: 'Delete',
        text: 'Apakah Anda yakin ingin menghapus data-data ini?',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete',
        cancelButtonText: 'Cancel',
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
          var idEvents = selectedItems.map(function() {
            return $(this).val();
          }).get();

          // Send an AJAX request to the delete endpoint
          $.ajax({
            url: '<?php echo base_url("admin/tanggal/tanggal/deletee") ?>',
            type: 'POST',
            data: {
              id_event: idEvents
            },
            success: function(response) {
              // Display success message when delete is successful
              Swal.fire({
                icon: 'success',
                title: 'Deleted!',
                text: 'The selected items have been deleted.',
                allowOutsideClick: false,
                allowEscapeKey: false
              }).then((result) => {
                if (result.isConfirmed) {
                  // Refresh the page
                  location.reload();
                }
              });
            }
          });
        }
      });
    });
  });
</script>

<style>
  .button {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: rgb(20, 20, 20);
    border: none;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.164);
    cursor: pointer;
    transition-duration: .3s;
    overflow: hidden;
    position: relative;
  }

  .svgIcon {
    width: 12px;
    transition-duration: .3s;
  }

  .svgIcon path {
    fill: white;
  }

  .button:hover {
    width: 140px;
    border-radius: 50px;
    transition-duration: .3s;
    background-color: rgb(255, 69, 69);
    align-items: center;
  }

  .button:hover .svgIcon {
    width: 50px;
    transition-duration: .3s;
    transform: translateY(60%);
  }

  .button::before {
    position: absolute;
    top: -20px;
    content: "Delete";
    color: white;
    transition-duration: .3s;
    font-size: 2px;
  }

  .button:hover::before {
    font-size: 13px;
    opacity: 1;
    transform: translateY(30px);
    transition-duration: .3s;
  }
</style>
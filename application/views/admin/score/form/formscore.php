<header class="header-2">
  <div class="page-header min-vh-75 relative" style="background-image: url('<?php echo base_url() ?>assets/images/bg2.jpg')">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 text-center mx-auto">
          <h1 class="text-white pt-3 mt-n5">Score EPT</h1>
          <p class="lead text-white mt-3">Upload Score EPT</p>
        </div>
      </div>
    </div>
  </div>
</header>

<div class="card card-body blur shadow-blur mx-2 mx-md-7 mt-n6">
  <div class="card-header">
    <h6>Upload File Excel</h6>
  </div>
  <form id="imporExcel" method="POST" action="<?= site_url('admin/score/score/excel') ?>" enctype="multipart/form-data">
    <div class="card-body">
      <div class="row">
        <div class="col-md-5">
          <div class="form-group row">
            <div class="col-md-12">
              <div class="button download-button" data-tooltip="Size: 9KB" onclick="downloadFile()">
                <div class="button-wrapper">
                  <div class="text">Download Format</div>
                  <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="2em" height="2em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                      <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15V3m0 12l-4-4m4 4l4-4M2 17l.621 2.485A2 2 0 0 0 4.561 21h14.878a2 2 0 0 0 1.94-1.515L22 17"></path>
                    </svg>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div class="form-group row">
            <div class="col-md-12">
              <input type="file" id="excelFileInput" name="file" accept=".xls, .xlsx" required>
              <div class="mt-1">
                <span class="text-secondary">File yang harus diupload : .xls, .xlsx</span>
              </div>
              <?= form_error('file', '<div class="text-danger">', '</div>') ?>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-12">
              <button type="button" onclick="previewExcelFile()" data-toggle="modal" data-target="#previewModal"><i class="fas fa-eye mr-1"></i>Preview</button>
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

<!-- Preview Modal -->
<div class="modal" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="previewModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="previewModalLabel">Preview Excel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="excelPreview"></div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function() {
    $('#imporExcel').submit(function(event) {
      event.preventDefault(); // Prevent form submission

      // Display the loader and hide the form
      $('#imporExcel').hide();
      $('#loader').show();

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

          // Parse the response as JSON
          var data = JSON.parse(response);

          if (data.status === 'success') {
            // Display success message
            Swal.fire({
              icon: 'success',
              title: 'Success!',
              text: 'The score has been imported.',
              allowOutsideClick: false,
              allowEscapeKey: false,
            }).then(() => {
              // Redirect to the desired page
              window.location.href = data.redirect;
            });
          } else if (data.status === 'duplicate') {
            let message = data.message + '\n';

            data.duplicate_data.forEach((duplicateRow) => {
              const rowNumber = duplicateRow.row;
              const columns = duplicateRow.columns;

              // Customize this line to fit your column names
              message += `Row ${rowNumber}: tanggal = ${columns.tanggal}, npm = ${columns.npm}\n`;
            });

            // Show the warning alert for duplicate data with detailed info
            Swal.fire({
              icon: 'warning',
              title: 'Duplicate Data Detected',
              html: message,
              allowOutsideClick: false,
              allowEscapeKey: false,
            }).then(() => {
              window.location.href = data.redirect;
            });
          } else if (data.status === 'no_data') {
            Swal.fire({
              icon: 'info',
              title: 'No Data to Import',
              text: data.message,
              allowOutsideClick: false,
              allowEscapeKey: false,
            }).then(() => {
              // Redirect to the desired page
              window.location.href = data.redirect;
            });
          } else if (data.status === 'empty') {
            // Display empty data message
            var emptyColumns = data.columns.join(', ');
            var emptyRows = data.rows.join(', ');

            Swal.fire({
              icon: 'warning',
              title: 'Empty Data',
              html: 'Empty columns found in the Excel file. Column: ' + emptyColumns + '.<br>' +
                'Empty rows found in the Excel file. Rows: ' + emptyRows + '.<br>' +
                'Please check the data.',
              allowOutsideClick: false,
              allowEscapeKey: false,
            }).then(() => {
              // Redirect to the desired page
              window.location.href = data.redirect;
            });
          } else if (data.status === 'error') {
            // Display format validation failure message
            Swal.fire({
              icon: 'error',
              title: 'Error!',
              text: 'Impor Data tidak sesuai dengan format. Silakan unduh format yang benar.',
              allowOutsideClick: false,
              allowEscapeKey: false,
            }).then(() => {
              // Redirect to the desired page
              window.location.href = data.redirect;
            });
          } else {
            // Display generic error message
            Swal.fire({
              icon: 'error',
              title: 'Error!',
              text: 'Import file failed. Please try again.',
              allowOutsideClick: false,
              allowEscapeKey: false,
            }).then(() => {
              // Redirect to the desired page
              window.location.href = data.redirect;
            });
          }
        },
        error: function() {
          // Hide the loader and show the form again
          $('#loader').hide();
          $('#imporExcel').show();
        },
      });
    });
  });
</script>


<script>
  function previewExcelFile() {
    var fileInput = document.getElementById('excelFileInput');
    var file = fileInput.files[0];
    var excelPreview = document.getElementById('excelPreview');

    if (file) {
      var reader = new FileReader();
      reader.onload = function(e) {
        var data = new Uint8Array(e.target.result);
        var workbook = XLSX.read(data, {
          type: 'array'
        });
        var sheetName = workbook.SheetNames[0];
        var worksheet = workbook.Sheets[sheetName];
        var html = XLSX.utils.sheet_to_html(worksheet);
        excelPreview.innerHTML = html;
      };
      reader.readAsArrayBuffer(file);
    }

    $('#previewModal');
  }
</script>
<script>
  function downloadFile() {
    var link = document.createElement("a");
    link.href = "<?php echo base_url(); ?>assets/file/Template_Score_EPT.xlsx";
    link.download = "Template_Import_Score.xlsx";
    link.click();
  }
</script>
<style>
  .download-button {
    cursor: pointer;
  }
</style>
<style>
  #excelPreview {
    overflow-x: auto;
    border: 1px solid #ccc;
    padding: 10px;
  }

  #excelPreview table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
  }

  #excelPreview th,
  #excelPreview td {
    padding: 8px;
    border: 1px solid #ccc;
    text-align: left;
  }
</style>
<style>
  .button {
    --width: 200px;
    --height: 35px;
    --tooltip-height: 35px;
    --tooltip-width: 90px;
    --gap-between-tooltip-to-button: 18px;
    --button-color: #1163ff;
    --tooltip-color: #fff;
    width: var(--width);
    height: var(--height);
    background: var(--button-color);
    position: relative;
    text-align: center;
    border-radius: 0.45em;
    font-family: "Arial";
    transition: background 0.3s;
  }

  .button::before {
    position: absolute;
    content: attr(data-tooltip);
    width: var(--tooltip-width);
    height: var(--tooltip-height);
    background-color: var(--tooltip-color);
    font-size: 0.9rem;
    color: #111;
    border-radius: .25em;
    line-height: var(--tooltip-height);
    bottom: calc(var(--height) + var(--gap-between-tooltip-to-button) + 10px);
    left: calc(50% - var(--tooltip-width) / 2);
  }

  .button::after {
    position: absolute;
    content: '';
    width: 0;
    height: 0;
    border: 10px solid transparent;
    border-top-color: var(--tooltip-color);
    left: calc(50% - 10px);
    bottom: calc(100% + var(--gap-between-tooltip-to-button) - 10px);
  }

  .button::after,
  .button::before {
    opacity: 0;
    visibility: hidden;
    transition: all 0.5s;
  }

  .text {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .button-wrapper,
  .text,
  .icon {
    overflow: hidden;
    position: absolute;
    width: 100%;
    height: 100%;
    left: 0;
    color: #fff;
  }

  .text {
    top: 0
  }

  .text,
  .icon {
    transition: top 0.5s;
  }

  .icon {
    color: #fff;
    top: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .icon svg {
    width: 24px;
    height: 24px;
  }

  .button:hover {
    background: #6c18ff;
  }

  .button:hover .text {
    top: -100%;
  }

  .button:hover .icon {
    top: 0;
  }

  .button:hover:before,
  .button:hover:after {
    opacity: 1;
    visibility: visible;
  }

  .button:hover:after {
    bottom: calc(var(--height) + var(--gap-between-tooltip-to-button) - 20px);
  }

  .button:hover:before {
    bottom: calc(var(--height) + var(--gap-between-tooltip-to-button));
  }
</style>
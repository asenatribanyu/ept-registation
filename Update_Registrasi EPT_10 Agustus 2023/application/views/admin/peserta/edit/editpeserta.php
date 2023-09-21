<header class="header-2">
	<div class="page-header min-vh-75 relative" style="background-image: url('<?php echo base_url() ?>assets/images/bg2.jpg')">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 text-center mx-auto">
					<h1 class="text-white pt-3 mt-n5">Data Peserta EPT</h1>
					<p class="lead text-white mt-3">Edit Data Peserta</p>
				</div>
			</div>
		</div>
	</div>
</header>

<div class="card card-body blur shadow-blur mx-2 mx-md-3 mt-n6">
	<div class="container-fluid">
		<form id="tanggalForm" action="<?php echo site_url('admin/peserta/peserta/update_aksi') ?>" method="post" enctype="multipart/form-data">
			<?php foreach ($tbl_peserta as $p) : ?>
				<label>Nama Peserta</label>
				<div class="input-group input-group-outline mb-3">
					<input type="hidden" name="id_peserta" value="<?php echo $p->id_peserta ?>" class="form-control border border-primary" />
					<input type="text" name="nama_peserta" value="<?php echo $p->nama_peserta ?>" class="form-control border border-primary" />
					<br><?php echo form_error('nama_peserta', '<div class="text-danger small" ml-3>', '</div>') ?>
				</div>
				<label>NPM</label>
				<div class="input-group input-group-outline mb-3">
					<input type="text" name="npm" value="<?php echo $p->npm ?>" class="form-control border border-primary" />
					<br><?php echo form_error('npm', '<div class="text-danger small" ml-3>', '</div>') ?>
				</div>
				<label>Email</label>
				<div class="input-group input-group-outline mb-3">
					<input type="text" name="email" value="<?php echo $p->email ?>" class="form-control border border-primary" />
					<br><?php echo form_error('email', '<div class="text-danger small" ml-3>', '</div>') ?>
				</div>
				<label>No HP</label>
				<div class="input-group input-group-outline mb-3">
					<input type="text" name="no_hp" value="<?php echo $p->no_hp ?>" class="form-control border border-primary" />
					<br><?php echo form_error('no_hp', '<div class="text-danger small" ml-3>', '</div>') ?>
				</div>
				<button type="submit" class="btn btn-primary mb-5">Simpan</button>
				<a href="<?php echo site_url('admin/peserta/peserta'); ?>" class="btn btn-secondary mb-5">Kembali</a>
			<?php endforeach; ?>
		</form>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
<script>
	$(document).ready(function() {
		$('#tanggalForm').submit(function(event) {
			event.preventDefault(); // Prevent form submission

			// Display a SweetAlert confirmation dialog
			Swal.fire({
				icon: 'warning',
				title: 'Save',
				text: 'Are you sure you want to save?',
				showCancelButton: true,
				confirmButtonText: 'Yes, save',
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
					// Submit the form via AJAX
					$.ajax({
						url: $(this).attr('action'),
						type: $(this).attr('method'),
						data: $(this).serialize(),
						success: function(response) {
							// Display success message when save is successful
							Swal.fire({
								icon: 'success',
								title: 'Saved!',
								text: 'Your changes have been saved.',
								allowOutsideClick: false,
								allowEscapeKey: false
							}).then(() => {
								// Redirect to the desired page
								window.location.href = '<?php echo base_url() ?>admin/peserta/peserta';
							});
						}
					}).done(function(response) {
						// Handle the response and perform the redirect here
						if (response == 'success') {
							window.location.href = '<?php echo base_url() ?>admin/peserta/peserta';
						} else {
							// Handle the error case if needed
						}
					});
				}
			});
		});
	});
</script>
<style>
	.loader-overlay {
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background-color: rgba(0, 0, 0, 0.5);
		display: none;
		z-index: 9999;
	}

	.loader {
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		border: 5px solid #f3f3f3;
		border-top: 5px solid #3498db;
		border-radius: 50%;
		width: 50px;
		height: 50px;
		animation: spin 1s linear infinite;
	}

	@keyframes spin {
		0% {
			transform: translate(-50%, -50%) rotate(0deg);
		}

		100% {
			transform: translate(-50%, -50%) rotate(360deg);
		}
	}
</style>
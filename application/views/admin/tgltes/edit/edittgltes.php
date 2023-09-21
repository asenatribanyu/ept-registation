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
		<form id="tanggalForm" action="<?php echo site_url('admin/tanggal/tanggal/update_aksi') ?>" method="post" enctype="multipart/form-data">
			<?php foreach ($tbl_event as $e) : ?>
				<label>Tanggal Tes</label>
				<div class="input-group input-group-outline mb-3">
					<input type="hidden" name="id_event" value="<?php echo $e->id_event ?>" />
					<input type="date" name="tanggal_event" class="form-control border border-primary" value="<?php echo $e->tanggal_event ?>" />
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
					<input type="time" name="time" class="form-control border border-primary" value="<?php echo $e->time ?>" />
					<br><?php echo form_error('time', '<div class="text-danger small" ml-3>', '</div>') ?>
				</div>
				<label>Venue</label>
				<div class="input-group input-group-outline mb-3">
					<input type="text" name="venue" class="form-control border border-primary" value="<?php echo $e->venue ?>" />
					<br><?php echo form_error('venue', '<div class="text-danger small" ml-3>', '</div>') ?>
				</div>
				<label>Kuota</label>
				<div class="input-group input-group-outline mb-3">
					<input type="number" name="kuota" class="form-control border border-primary" value="<?php echo $e->kuota ?>" />
					<br><?php echo form_error('kuota', '<div class="text-danger small" ml-3>', '</div>') ?>
				</div>
				<div class="mb-3">
					<label for="aktif">Status Test : <span class="text-danger">*</span></label>
					<input type="radio" name="aktif" value="Aktif" required=""> Aktif
					<input type="radio" name="aktif" value="Tidak Aktif" required=""> Tidak Aktif
				</div>
				<button type="submit" class="btn btn-primary mb-5">Simpan</button>
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
				allowEscapeKey: false
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
								window.location.href = '<?php echo base_url() ?>admin/tanggal/tanggal';
							});
						}
					}).done(function(response) {
						// Handle the response and perform the redirect here
						if (response == 'success') {
							window.location.href = '<?php echo base_url() ?>admin/tanggal/tanggal';
						} else {
							// Handle the error case if needed
						}
					});
				}
			});
		});
	});
</script>
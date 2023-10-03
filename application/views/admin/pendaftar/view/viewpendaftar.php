<header class="header-2">
	<div class="page-header min-vh-75 relative" style="background-image: url('<?php echo base_url() ?>assets/images/bg2.jpg')">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 text-center mx-auto">
					<h1 class="text-white pt-3 mt-n5">Data Pendaftar EPT</h1>
					<p class="lead text-white mt-3">Tabel Data Pendaftar</p>
				</div>
			</div>
		</div>
	</div>
</header>

<div class="card card-body blur shadow-blur mx-2 mx-md-3 mt-n6">
	<form method="post" action="<?php echo base_url('admin/pendaftar/pendaftar/deletee') ?>" id="form-delete">
		<div class="data-tables datatable-dark">
			<table class="table table-bordered table-striped table-hover" id="dataTable1" style="width:100%">
				<thead>
					<tr style="text-align: center;">
						<th></th>
						<th>No</th>
						<th>Tanggal Tes</th>
						<th>Tipe Test</th>
						<th>Waktu</th>
						<th>Venue</th>
						<th>Nama Lengkap</th>
						<th>Status</th>
						<th>NPM / NIK</th>
						<th>Email</th>
						<th>No HP</th>
						<th>Fakultas</th>
						<th>Prodi</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = $this->uri->segment(5)+1 ?? 0;
					foreach ($records as $r) : ?>
						<tr style="text-align: center;">
							<td><input type='checkbox' class='check-item' name='id_registrant[]' value='<?php echo $r->id_registrant ?>'></td>
							<td width="20px"><?php echo $no++ ?></td>
							<td><?php echo $r->tanggal_event ?></td>
							<td><?php echo $r->type ?></td>
							<td><?php echo $r->time ?></td>
							<td><?php echo $r->venue ?></td>
							<td><?php echo $r->nama_peserta ?></td>
							<td><?php echo $r->status ?></td>
							<td><?php echo $r->npm ?></td>
							<td><?php echo $r->email ?></td>
							<td><?php echo $r->no_hp ?></td>
							<td><?php echo $r->nama_fakultas ?></td>
							<td><?php echo $r->nama_prodi ?></td>
							<td style="text-align: center;">
								<a href="<?php echo base_url(); ?>admin/pendaftar/pendaftar/delete/<?php echo $r->id_registrant; ?>" class="btn btn-sm btn-danger delete-button"><i class="fa fa-trash"></i></a>
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
		<div class="pagination justify-content-center">
   <?php echo $pagination; ?>
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
		// Delete button click event for individual items
		$('.delete-button').on('click', function(e) {
			e.preventDefault();

			var deleteUrl = $(this).attr('href');

			// Display a SweetAlert confirmation dialog with loader
			Swal.fire({
				icon: 'warning',
				title: 'Delete',
				text: 'Are you sure you want to delete this item?',
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
						url: deleteUrl,
						type: 'GET',
						success: function(response) {
							// Display success message when delete is successful
							Swal.fire({
								icon: 'success',
								title: 'Deleted!',
								text: 'The item has been deleted.',
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

			// Display a SweetAlert confirmation dialog with loader
			Swal.fire({
				icon: 'warning',
				title: 'Delete',
				text: 'Are you sure you want to delete the selected items?',
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
					var idRegistrants = selectedItems.map(function() {
						return $(this).val();
					}).get();

					// Send an AJAX request to the delete endpoint
					$.ajax({
						url: $('#form-delete').attr('action'),
						type: 'POST',
						data: {
							id_registrant: idRegistrants
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
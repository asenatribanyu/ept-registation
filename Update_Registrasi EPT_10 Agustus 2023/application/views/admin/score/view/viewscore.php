<header class="header-2">
	<div class="page-header min-vh-75 relative" style="background-image: url('<?php echo base_url() ?>assets/images/bg2.jpg')">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 text-center mx-auto">
					<h1 class="text-white pt-3 mt-n5">Score EPT</h1>
					<p class="lead text-white mt-3">Tabel Score EPT</p>
				</div>
			</div>
		</div>
	</div>
</header>

<div class="card card-body blur shadow-blur mx-2 mx-md-3 mt-n6">
	<div>
		<?php echo anchor('admin/score/score/create', '<button class="btn btn-sm btn-primary mb-3" id="btn-import"><i class="fa fa-upload"> Import</i></button>') ?>
	</div>

	<form method="post" action="<?php echo base_url('admin/score/score/deletee') ?>" id="form-delete">
		<div class="data-tables datatable-dark">
			<table class="table table-bordered table-striped table-hover" id="dataTable1" style="width:100%">
				<thead>
					<tr style="text-align: center;">
						<th></th>
						<th>No</th>
						<th data-sort="date-euro">Tanggal Tes</th>
						<th>Nama Mahasiswa</th>
						<th>NPM</th>
						<th>Sec1</th>
						<th>Sec2</th>
						<th>Sec3</th>
						<th>Score</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($tbl_score as $s) : ?>
						<tr style="text-align: center;">
							<td><input type='checkbox' class='check-item' name='id_score[]' value='<?php echo $s->id_score ?>'></td>
							<td width="20px"><?php echo $no++ ?></td>
							<td data-sort-value="<?php echo date('Y-m-d', strtotime($s->tanggal)); ?>"><?php echo date('d F Y', strtotime($s->tanggal)); ?></td>
							<td><?php echo $s->nama ?></td>
							<td><?php echo $s->npm ?></td>
							<td><?php echo $s->sec1 ?></td>
							<td><?php echo $s->sec2 ?></td>
							<td><?php echo $s->sec3 ?></td>
							<td><?php echo $s->score ?></td>
							<td style="text-align: center;">
								<a href="<?php echo base_url(); ?>admin/score/score/delete/<?php echo $s->id_score; ?>" class="btn btn-danger btn-sm delete-button"><i class="fa fa-trash"></i></a>
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
<!-- Add these lines to include the required libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.11.2/sorting/datetime-moment.js"></script>
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

		$('#btn-import').on('click', function(e) {
			e.preventDefault();

			// Display a SweetAlert confirmation dialog
			Swal.fire({
				icon: 'warning',
				title: 'Import Score',
				text: 'Are you sure you want to import the score?',
				showCancelButton: true,
				confirmButtonText: 'Yes, import',
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
					// Handle the import action here
					// You can redirect to the import page or perform any other necessary actions
					window.location.href = '<?php echo base_url('admin/score/score/create'); ?>';
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
					var idScore = selectedItems.map(function() {
						return $(this).val();
					}).get();

					// Send an AJAX request to the delete endpoint
					$.ajax({
						url: '<?php echo base_url("admin/score/score/deletee") ?>',
						type: 'POST',
						data: {
							id_score: idScore
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
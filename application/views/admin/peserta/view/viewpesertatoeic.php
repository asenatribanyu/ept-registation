<header class="header-2">
    <div class="page-header min-vh-75 relative" style="background-image: url('<?php echo base_url() ?>assets/images/bg2.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 text-center mx-auto">
                    <h1 class="text-white pt-3 mt-n5">Data Peserta TOEIC</h1>
                    <p class="lead text-white mt-3">Tabel Data Peserta</p>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="card card-body blur shadow-blur mx-2 mx-md-3 mt-n6">
<div class="row" style="justify-content: flex-end;">
			<div class="col-md-3">
				<!-- Fitur Search -->
				<form action="<?= base_url(); ?>" method="post">
					<div class="input-group mb-3 gap-2">
						<input type="text" class="form-control p-2" style="border: 1px solid #808080; height: 40px; border-radius: 5px;" placeholder="Search" name="keyword" autocomplete="off" >
						<button class="btn btn-success" type="submit" name="submit" style="border-radius: 5px">search</button>
					</div>
				</form>
				<!-- End of Fitur Search -->
			</div>
		</div>
    <?php echo $this->session->flashdata('pesan') ?>
    <form method="post" action="<?php echo base_url('admin/peserta/pesertatoeic/deletee') ?>" id="form-delete">
        <div class="data-tables datatable-dark">
            <table class="table table-bordered table-striped table-hover" style="width:100%">
                <thead>
                    <tr style="text-align: center;">
                        <th> </th>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Status</th>
                        <th>NPM / NIK</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Fakultas</th>
                        <th>Prodi</th>
                        <th style="width: 70px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = $this->uri->segment(5)+1 ?? 0;
                    foreach ($records as $p) : ?>
                        <tr style="text-align: center;">
                            <td><input type='checkbox' class='check-item' name='id_peserta_toeic[]' value='<?php echo $p->id_peserta_toeic ?>'></td>
                            <td width="20px"><?php echo $no++ ?></td>
                            <td><?php echo $p->nama_peserta ?></td>
                            <td><?php echo $p->status ?></td>
                            <td><?php echo $p->npm ?></td>
                            <td><?php echo $p->email ?></td>
                            <td><?php echo $p->no_hp ?></td>
                            <td><?php echo $p->nama_fakultas ?></td>
                            <td><?php echo $p->nama_prodi ?></td>
                            <td style="text-align: center;">
                                <a href="<?php echo base_url(); ?>admin/peserta/pesertatoeic/update/<?php echo $p->id_peserta_toeic; ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="<?php echo base_url(); ?>admin/peserta/pesertatoeic/delete/<?php echo $p->id_peserta_toeic; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <h6><input type="checkbox" id="check-all"> check all</h6>
            <button type="button" id="btn-delete" class="btn btn-danger mb-1"><i class="fa fa-trash"></i> Delete</button>
        </div>
        <div class="pagination justify-content-center">
   <?php echo $pagination; ?>
</div>
    </form>
</div>
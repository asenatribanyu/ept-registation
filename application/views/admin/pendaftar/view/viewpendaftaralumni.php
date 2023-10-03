<header class="header-2">
    <div class="page-header min-vh-75 relative" style="background-image: url('<?php echo base_url() ?>assets/images/bg2.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 text-center mx-auto">
                    <h1 class="text-white pt-3 mt-n5">Data Pendaftar ALUMNI</h1>
                    <p class="lead text-white mt-3">Tabel Data Pendaftar</p>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="card card-body blur shadow-blur mx-2 mx-md-3 mt-n6">

    <?php echo $this->session->flashdata('pesan') ?>

    <form method="post" action="<?php echo base_url('admin/pendaftar/pendaftaralumni/deletee') ?>" id="form-delete">
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
                            <td><input type='checkbox' class='check-item' name='id_registrant_alumni[]' value='<?php echo $r->id_registrant_alumni ?>'></td>
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
                                <a href="<?php echo base_url(); ?>admin/pendaftar/pendaftaralumni/delete/<?php echo $r->id_registrant_alumni; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <h6><input type="checkbox" id="check-all"> check all</h6>
            <button type="button" id="btn-delete" class="btn btn-danger mb-5"><i class="fa fa-trash"></i> Delete</button>
        </div>
        <div class="pagination justify-content-center">
   <?php echo $pagination; ?>
</div>
    </form>
</div>
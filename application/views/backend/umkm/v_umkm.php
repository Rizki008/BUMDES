<div class="col-md-12">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Data UMKM</h3>

			<div class="card-tools">
				<a href="<?= base_url('umkm/add') ?>" type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>
					Tambah Umkm</a>
			</div>
			<!-- /.card-tools -->
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<?php
			if ($this->session->flashdata('pesan')) {
				echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
				echo $this->session->flashdata('pesan');
				echo '</h5></div>';
			}
			?>
			<table id="example1" class="table table-bordered" id="example1">
				<thead class="text-center">
					<tr>
						<th>No</th>
						<th>Pemilik UMKM</th>
						<th>Nama UMKM</th>
						<th>Deskripsi</th>
						<th>Gambar</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($umkm as $key => $value) { ?>
						<tr class="text-center">
							<td><?= $no++; ?></td>
							<td><?= $value->pemilik ?></td>
							<td><?= $value->nama_umkm ?></td>
							<td><?= $value->deskripsi ?></td>
							<td><img src="<?= base_url('assets/umkm/' . $value->gambar) ?>" width="150px"></td>
							<td>
								<a href="<?= base_url('umkm/edit/' . $value->id_umkm) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_umkm ?>"><i class="fa fa-trash"></i></button>
							</td>
						</tr>

					<?php } ?>
				</tbody>
			</table>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</div>


<!-- /.modal Delete -->
<?php foreach ($umkm as $key => $value) { ?>
	<div class="modal fade" id="delete<?= $value->id_umkm ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Delete <?= $value->nama_umkm ?></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h5>Apakah Anda Yakin Akan Hapus Data ini?</h5>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<a href="<?= base_url('umkm/delete/' . $value->id_umkm) ?> " class="btn btn-primary">Delete</a>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
<?php } ?>
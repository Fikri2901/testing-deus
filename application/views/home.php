<div class="container mt-5">

	<!-- <div class="float-right">
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
			+ Add
		</button>
	</div>
	<br> -->

	<?php if($this->session->flashdata('sukses')): ?>
	<div class="alert alert-success" role="alert">
		<?= $this->session->flashdata('sukses') ?>
	</div>
	<?php endif; ?>

	<?php if(validation_errors()): ?>
	<div class="alert alert-danger" role="alert">
		<?= validation_errors() ?>
	</div>
	<?php endif; ?>

	<div class="mb-3">
		<table id="myTable" class="display table table-bordered" style="width: 100%;" border="1">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>alamat</th>
					<th>tanggal lahir</th>
					<th>status</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no =1 ; 
                foreach($customer as $c) : 
            	?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $c['nama'] ?></td>
					<td><?= $c['alamat'] ?></td>
					<td><?= $c['tanggal_lahir'] ?></td>
					<td><?= $c['status'] ?></td>
					<td>
						<a href="<?= base_url(); ?>index.php/Home/delete/<?= $c['id'] ;?>"
							class="badge rounded-pill bg-danger" onClick="return confirm('yakin mau hapus');">
							Delete
						</a>
						<a href="<?= base_url(); ?>index.php/Home/edit/<?= $c['id'] ;?>"
							class="badge rounded-pill bg-success">
							Edit
						</a>
						<a href="<?= base_url(); ?>index.php/Home/show/<?= $c['id'] ;?>"
							class="badge rounded-pill bg-primary">
							View
						</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			<tfoot>
				<tr>
					<td><b>No</b></td>
					<th>Nama</th>
					<td><b>Alamat</b></td>
					<td><b>Tanggal lahir</b></td>
					<td><b>Status</b></td>
					<td><b>Aksi</b></td>
				</tr>
			</tfoot>
		</table>

	</div>

	<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah data Customer</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form method="post" action="<?= base_url() ?>index.php/Home/addCustomer">
						<div class="mb-3">
							<label for="nama" class="form-label">Nama</label>
							<input type="text" class="form-control" id="nama" aria-describedby="Nama" name="nama"
								required>
						</div>
						<div class="mb-3">
							<label for="jenis" class="form-label">Jenis</label>
							<select class="form-select" id="jenis" name="jenis" required>
								<option value="">Choose...</option>
								<?php
                                     foreach($type as $t) : 
                                ?>
								<option value="<?= $t['id'] ?>"><?= $t['nama'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="mb-3">
							<label for="alamat" class="form-label">Alamat</label>
							<input type="text" class="form-control" id="alamat" aria-describedby="Alamat" name="alamat"
								required>
						</div>
						<div class="mb-3">
							<label for="tanggal" class="form-label">Tanggal</label>
							<input type="date" class="form-control" id="tanggal" name="tanggal_lahir" required>
						</div>
						<div class="mb-3">
							<div class="row mb-3">
								<div class="col">
									<label for="latitude" class="form-label">Latitude</label>
									<input type="number" class="form-control" aria-label="Latitude" name="latitude"
										id="latitude" readonly required>
								</div>
								<div class="col">
									<label for="longitude" class="form-label">Longitude</label>
									<input type="number" class="form-control" aria-label="Longitude" name="longitude"
										id="longitude" readonly required>
								</div>
							</div>
							<div id="map_canvas" style="width:100%; height:350px"></div>
						</div>
						<div class="mb-3">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="status" id="status1" value="active"
									checked>
								<label class="form-check-label" for="status1">
									Active
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="status" id="status2"
									value="inactive">
								<label class="form-check-label" for="status2">
									InActive
								</label>
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Tambah</button>
				</div>
				</form>
			</div>
		</div>
	</div>


	<!-- <?php foreach($customer as $c) { ?>
	<div class="modal fade" id="edit<?= $c['id']?>" role="dialog" tabindex="-1" aria-labelledby="edit"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit data Customer</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form method="post" action="<?= base_url() ?>index.php/Home/update">
						<input type="hidden" value="<?= $c['id'] ?>" name="id">
						<div class="mb-3">
							<label for="nama" class="form-label">Nama</label>
							<input type="text" class="form-control" id="nama" aria-describedby="Nama" name="nama"
								value="<?= $c['nama'] ?>">
						</div>
						<div class="mb-3">
							<label for="jenis" class="form-label">Jenis</label>
							<select class="form-select" id="jenis" name="jenis">
								<option value="" hidden>  </option>
								<?php
                                    foreach($type as $t) : 
                                ?>
								<option value="<?= $t['id'] ?>"><?= $t['nama'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="mb-3">
							<label for="alamat" class="form-label">Alamat</label>
							<input type="text" class="form-control" id="alamat" aria-describedby="Alamat" name="alamat"
								value="<?= $c['alamat'] ?>">
						</div>
						<div class="mb-3">
							<label for="tanggal" class="form-label">Tanggal</label>
							<input type="date" class="form-control" id="tanggal" name="tanggal_lahir"
								value="<?= $c['tanggal_lahir'] ?>">
						</div>
						<div class="mb-3">
							<div class="row mb-3">
								<div class="col">
									<label for="latitude" class="form-label">Latitude</label>
									<input type="number" class="form-control" aria-label="Latitude" name="latitude"
										id="latitude" readonly>
								</div>
								<div class="col">
									<label for="longitude" class="form-label">Longitude</label>
									<input type="number" class="form-control" aria-label="Longitude" name="longitude"
										id="longitude" readonly>
								</div>
							</div>
							<div id="map_canvas" style="width:100%; height:350px"></div>
						</div>
						<div class="mb-3">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="status" id="status1" value="active"
									<?php if ($c['status'] == 'active') { ?> checked <?php } ?>>
								<label class="form-check-label" for="status1">
									Active
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="status" id="status2" value="inActive"
									<?php if ($c['status'] == 'inActive') { ?> checked <?php } ?>>
								<label class="form-check-label" for="status2">
									InActive
								</label>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php } ?> -->
</div>

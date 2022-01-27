<div class="container mt-5">

	<?php if(validation_errors()): ?>
	<div class="alert alert-danger" role="alert">
		<?= validation_errors() ?>
	</div>
	<?php endif; ?>

	<form method="post" action="<?= base_url() ?>index.php/Home/update">
		<input type="hidden" value="<?= $customer['id'] ?>" name="id">
		<div class="mb-3">
			<label for="nama" class="form-label">Nama</label>
			<input type="text" class="form-control" id="nama" aria-describedby="Nama" name="nama"
				value="<?= $customer['nama'] ?>">
		</div>
		<div class="mb-3">
			<label for="jenis" class="form-label">Jenis</label>
			<select class="form-select" id="jenis" name="jenis">
				<option value="<?= $namatype['id'] ?>" hidden> <?= $namatype['nama'] ?> </option>
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
				value="<?= $customer['alamat'] ?>">
		</div>
		<div class="mb-3">
			<label for="tanggal" class="form-label">Tanggal</label>
			<input type="date" class="form-control" id="tanggal" name="tanggal_lahir"
				value="<?= $customer['tanggal_lahir'] ?>">
		</div>
		<div class="mb-3">
			<div class="row mb-3">
				<div class="col">
					<label for="latitude" class="form-label">Latitude</label>
					<input type="number" class="form-control" aria-label="Latitude" name="latitude" id="latitude"
						readonly>
				</div>
				<div class="col">
					<label for="longitude" class="form-label">Longitude</label>
					<input type="number" class="form-control" aria-label="Longitude" name="longitude" id="longitude"
						readonly>
				</div>
			</div>
			<div id="map_canvas" style="width:100%; height:350px"></div>
		</div>
		<div class="mb-3">
			<div class="form-check">
				<input class="form-check-input" type="radio" name="status" id="status1" value="active"
					<?php if ($customer['status'] == 'active') { ?> checked <?php } ?>>
				<label class="form-check-label" for="status1">
					Active
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="status" id="status2" value="inActive"
					<?php if ($customer['status'] == 'inActive') { ?> checked <?php } ?>>
				<label class="form-check-label" for="status2">
					InActive
				</label>
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>

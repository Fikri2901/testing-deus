<div class="container mt-5">
	<div class="float-right">
		<a href="<?= base_url(). 'index.php/Home/add' ?>" class="btn btn-primary"> + add</a>
	</div>
	<br>

	<?php if($this->session->flashdata('sukses')): ?>
	<div class="alert alert-success" role="alert">
		<?= $this->session->flashdata('sukses') ?>
	</div>
	<?php endif; ?>

	<table id="myTable" class="display" style="width: 100%;">
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

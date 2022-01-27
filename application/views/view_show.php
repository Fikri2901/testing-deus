<div class="container mt-5">
	<div class="card" style="width: 18rem;">
		<div class="card-header">
			Detail
		</div>
		<ul class="list-group list-group-flush">
			<li class="list-group-item">Nama : <?= $customer['nama'] ?></li>
			<li class="list-group-item">Alamat : <?= $customer['alamat'] ?></li>
			<li class="list-group-item">Jenis : <?= $namatype['nama'] ?></li>
			<li class="list-group-item">Tanggal Lahir : <?= $customer['tanggal_lahir'] ?></li>
			<li class="list-group-item">Status : <?= $customer['status'] ?></li>
		</ul>
	</div>
</div>

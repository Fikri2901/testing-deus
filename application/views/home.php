
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

        <table id="myTable" class="display">
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
                    <a href="<?= base_url(); ?>index.php/Home/delete/<?= $c['id'] ;?>" class="btn btn-danger"
                        onClick="return confirm('yakin mau hapus');">
                        Delete
                    </a>
                    <a href="<?= base_url(); ?>index.php/Home/edit/<?= $c['id'] ;?>" class="btn btn-success">
                        Edit
                    </a>
                    <a href="<?= base_url(); ?>index.php/Home/show/<?= $c['id'] ;?>" class="btn btn-primary">
                        View
                    </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>alamat</th>
                    <th>tanggal lahir</th>
                    <th>status</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>


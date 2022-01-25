<div class="container mt-5">

        <?php if(validation_errors()): ?>  
          <div class="alert alert-danger" role="alert">
            <?= validation_errors() ?>
          </div>
        <?php endif; ?>

    <form method="post" action="<?= base_url() ?>index.php/Home/addCustomer">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" aria-describedby="Nama" name="nama">
        </div>
        <div class="mb-3">
            <label for="jenis" class="form-label">Jenis</label>
            <select class="form-select" id="jenis" name="jenis">
                <option selected>Choose...</option>
                <?php
                    foreach($type as $t) : 
                ?>
                <option value="<?= $t['id'] ?>"><?= $t['nama'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" aria-describedby="Alamat" name="alamat">
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal_lahir">
        </div>
        <div class="mb-3">
            <label for="longitude" class="form-label">Longitude</label>
            <input type="text" class="form-control" id="longitude" aria-describedby="longitude" name="longitude">
        </div>
        <div class="mb-3">
            <label for="latitude" class="form-label">Latitude</label>
            <input type="text" class="form-control" id="latitude" aria-describedby="latitude" name="latitude">
        </div>
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status1" value="active" checked>
                <label class="form-check-label" for="status1">
                    Active
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status2" value="inactive">
                <label class="form-check-label" for="status2">
                    InActive
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
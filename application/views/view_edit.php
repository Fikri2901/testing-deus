<div class="container">
    <form>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" aria-describedby="Nama" name="nama" value="<?= $customer['nama'] ?>" >
        </div>
        <div class="mb-3">
            <label for="jenis" class="form-label">Jenis</label>
            <select class="form-select" id="jenis" name="jenis">
                <option value="<?= $customer['id_m_customer'] ?>"> <?= $customer['id_m_customer'] ?> </option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" aria-describedby="Alamat" name="alamat" value="<?= $customer['alamat'] ?>">
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" value="<?= $customer['tanggal_lahir'] ?>">
        </div>
        <div class="mb-3">
            <label for="longitude" class="form-label">Longitude</label>
            <input type="text" class="form-control" id="longitude" aria-describedby="longitude" name="longitude" value="<?= $customer['longitude'] ?>">
        </div>
        <div class="mb-3">
            <label for="latitude" class="form-label">Latitude</label>
            <input type="text" class="form-control" id="latitude" aria-describedby="latitude" name="latitude" value="<?= $customer['latitude'] ?>">
        </div>
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status1" value="active"
                <?php if ($customer['status'] == 'active') { ?>
                     checked
                 <?php } ?>
                >
                <label class="form-check-label" for="status1">
                    Active
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status2" value="inActive"
                <?php if ($customer['status'] == 'inActive') { ?>
                 checked
                 <?php } ?>
                >
                <label class="form-check-label" for="status2">
                    InActive
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
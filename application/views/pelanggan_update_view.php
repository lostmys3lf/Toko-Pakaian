<html>
    <head><title>Pelanggan</title></head>
    <body>
        <div class="container">
        <div class="row mt-3">
        <div class="card">
        <div class="card-header "><h5>Form Ubah Data Pelanggan</h5></div>
        <div class="card-body">
    
        <form action="update" method="post">
        <div class="row g-5">
        <div class="col-sm-5">
            <?php echo $model->labels['id_pelanggan'];?><br>
            <input class="form-control" type="text" name="id_pelanggan" readonly value="<?php echo $model->id_pelanggan;?>"/><br><br>

            <?php echo $model->labels['nama_pelanggan'];?><br>
            <input class="form-control" type="text" name="nama_pelanggan" value="<?php echo $model->nama_pelanggan;?>"/><br><br>

            <?php echo $model->labels['jenis_kelamin'];?><br>
            <input class="form-control" type="text" name="jenis_kelamin" readonly value="<?php echo $model->jenis_kelamin;?>"/><br>
            <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki<br>
            <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan<br><br>
        </div>
        
        <div class="col-sm-5">

            <?php echo $model->labels['no_telp_utama'];?><br>
            <input class="form-control" type="text" name="no_telp_utama" value="<?php echo $model->no_telp_utama;?>"/><br><br>

            <?php echo $model->labels['no_telp_cadangan'];?><br>
            <input class="form-control" type="text" name="no_telp_cadangan" value="<?php echo $model->no_telp_cadangan;?>"/><br><br>

            <?php echo $model->labels['alamat'];?><br>
            <input class="form-control" type="text" name="alamat" value="<?php echo $model->alamat;?>"/><br><br>

            <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
            <input class="btn btn-secondary" type="button" value="Batal" onclick="javascript:history.go(-1);"/><br><br>

        </form>
        </div>
        </div>
        </div>
        </div>
        </div>
    </body>
</html>
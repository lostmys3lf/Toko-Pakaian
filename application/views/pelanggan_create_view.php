<html>
    <head>
        <title>Pelanggan</title>
    </head>
    <body>
    <div class="container">
    <div class="row mt-3">
    <div class="col-md-8"></div>
    <div class="card">
    <div class="card-header "><h5>Form Tambah Data Pelanggan</h5></div>
    <div class="card-body">
        
        <!--<h2>Pelanggan</h2>
        <p><strong>Tambah Data</strong></p>-->
        <form action="create" method="post">
        <div class="row g-5">
        <div class="col-sm-5">
            <?php echo $model->labels['id_pelanggan'];?><br>
            <input class="form-control" type="text" name="id_pelanggan" placeholder="eg : PL01"><br><br>
            
            <?php echo $model->labels['nama_pelanggan'];?><br>
            <input class="form-control" type="text" name="nama_pelanggan" placeholder="eg : Hitna Qotrun Nada"><br><br>           
            
            <?php echo $model->labels['jenis_kelamin'];?><br>
            <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki <br>
            <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan<br><br>           
            </div>
            <div class="col-sm-5">
            <?php echo $model->labels['no_telp_utama'];?><br>
            <input class="form-control" type="text" name="no_telp_utama" placeholder="eg : 081999000888"><br><br>
            
            <?php echo $model->labels['no_telp_cadangan'];?><br>
            <input class="form-control" type="text" name="no_telp_cadangan" placeholder="eg : 082777888999"><br><br>
            
            <?php echo $model->labels['alamat'];?><br>
            <input class="form-control" type="text" name="alamat" placeholder="eg : Jl. Sukapura atau Nama Kota"><br><br>

            <input class="btn btn-primary" type="submit" name="submit"  value="Simpan">
            <input class="btn btn-secondary" type="button"  value="Batal" onclick="javascript:history.go(-1);"/><br><br>
            </div>
            </div>
        </form>
        </div>
        </div>
        </div>
    </div>
    </div><br><br>
    </body>
</html>
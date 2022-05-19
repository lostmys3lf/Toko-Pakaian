<html>
<head><title>Pegawai</title></head>
<body>
<div class="container">
        <div class="row mt-3">
        <div class="card">
        <div class="card-header "><h5>Form Ubah Data Pegawai</h5></div>
        <div class="card-body">

<form action="update" method="post">
<div class="row g-5">
<div class="col-sm-5">
<?php echo $model->labels['id_pegawai']; ?> <br  />
<input class="form-control" type ="text" name="id_pegawai" size="10" maxlength="4" 
readonly value="<?php echo $model->id_pegawai;?>"  /><br  /><br  />

<?php echo $model->labels['nama_pegawai']; ?> <br  />
<input class="form-control" type ="text" name="nama_pegawai" size="30" 
maxlength="25" value="<?php echo $model->nama_pegawai;?>"  /><br  /><br  />

<?php echo $model->labels['jenis_kelamin'];?><br>
            <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki<br>
            <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan<br><br>
</div>
<div class="col-sm-5">
<?php echo $model->labels['no_telp']; ?> <br  />
<input class="form-control" type ="text" name="no_telp" size="20" 
value="<?php echo $model->no_telp;?>"/><br  /><br  />

<?php echo $model->labels['alamat']; ?> <br  />
<input class="form-control" type ="text" name="alamat" size="10" 
value="<?php echo $model->alamat;?>"/><br  /><br  />

<input class="btn btn-primary" type ="submit" name="btnSubmit"  value="Simpan">
<input class="btn btn-secondary" type ="button" value="Batal" onclick="javascript:history.go(-1);"/>
</form>
</div>
        </div>
        </div>
        </div>
        </div>
</body>
</html>


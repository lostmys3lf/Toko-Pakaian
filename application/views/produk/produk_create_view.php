<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk1</title>
</head>
<body>
    <div class="container">
    <div class="row mt-3">
    <div class="col-md-8"></div>
    <div class="card">
    <div class="card-header "><h5>Form Tambah Data Produk</h5></div>
    <div class="card-body">
<!--<h2>Daftar Produk
</h2>
<p><strong>Tambah Data</strong></p>-->

<form action="create" method="post">
<div class="row g-5">
        <div class="col-sm-5">
<?php echo $model->labels['id_produk']; ?> <br  />
<input class="form-control" type ="text" name="id_produk" size="10" maxlength="9"  /><br  /><br  />

<?php echo $model->labels['nama_produk']; ?> <br  />
<input class="form-control" type ="text" name="nama_produk" size="30" maxlength="30"  /><br  /><br  />

<?php echo $model->labels['jenis_pakaian']; ?> <br  />
<select class="form-control" name="jenis_pakaian" value="<?php echo $model->jenis_mobil;?>">
<option value="#" disabled selected>--Pilih Jenis Pakaian--</option>
    <option value="Baju">Baju</option>
    <option value="Celana">Celana</option>
</select><br><br>
</div>
<div class="col-sm-5">

<?php echo $model->labels['stock']; ?> <br  />
<input class="form-control" type ="text" name="stock" size="30" maxlength="30"  /><br  /><br  />

<?php echo $model->labels['harga_satuan']; ?> <br  />
<input class="form-control" type ="text" name="harga_satuan" size="30" maxlength="30"  /><br  /><br  />

<input class="btn btn-primary" type ="submit" name="btnSubmit"  value="Simpan">
<input class="btn btn-secondary" type ="button" value="Batal" onclick="javascript:history.go(-1);"/>
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



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pemasok</title>
</head>
<body>
<div class="container">
    <div class="row mt-3">
    <div class="col-md-8"></div>
    <div class="card">
    <div class="card-header "><h5>Form Tambah Data Pemasok</h5></div>
    <div class="card-body">

<form action="create" method="post">
<div class="row g-5">
<div class="col-sm-5">
<?php echo $model->labels['id_pemasok']; ?> <br  />
<input class="form-control" type ="text" name="id_pemasok" size="10" maxlength="9" placeholder="id pemasok" /><br  /><br  />

<?php echo $model->labels['nama_pemasok']; ?> <br  />
<input class="form-control" type ="text" name="nama_pemasok" size="auto" maxlength="25" placeholder="nama pemasok" /><br  /><br  />

<?php echo $model->labels['nama_produk']; ?> <br  />
<input class="form-control" type ="text" name="nama_produk" size="auto" maxlength="25" placeholder="nama produk" /><br  /><br  />

<?php echo $model->labels['no_telp_pemasok']; ?> <br  />
<input class="form-control" type ="text" name="no_telp_pemasok" size="auto" maxlength="13" placeholder="no telp pemasok" /><br  /><br  />


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
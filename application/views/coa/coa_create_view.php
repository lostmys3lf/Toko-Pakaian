<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Coa</title>
</head>
<body>
<div class="container">
    <div class="row mt-3">
    <div class="col-md-8"></div>
    <div class="card">
    <div class="card-header "><h5>Form Tambah Data COA</h5></div>
    <div class="card-body">

<form action="create" method="post">
<div class="row g-5">
<div class="col-sm-5">
<?php echo $model->labels['no_akun']; ?> <br  />
<input class="form-control" type ="text" name="no_akun" size="10" maxlength="4"  /><br  /><br  />

<?php echo $model->labels['header_akun']; ?> <br  />
<input class="form-control" type ="text" name="header_akun" size="30" maxlength="2"  /><br  /><br  />

<?php echo $model->labels['nama_akun']; ?> <br  />
<input class="form-control" type ="text" name="nama_akun" size="30" maxlength="30"  /><br  /><br  />

<?php echo $model->labels['saldo_awal']; ?> <br  />
<input class="form-control" type ="text" name="saldo_awal" size="30" maxlength="20"  /><br  /><br  />


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



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row mt-3">
    <div class="col-md-8"></div>
    <div class="card">
    <div class="card-header "><h5>Form Tambah Data Modal</h5></div>
    <div class="card-body">
    <form action="selesai_transaksi" method="post">
    <div class="row g-5">
    <div class="col-sm-5">
        Id Transaksi : <br> <input class="form-control" type="text" name="id_transaksi">
        <br><br>
        No Transaksi : <br> <input class="form-control" type="text" name="no_transaksi">
        <br><br>
        Id Pegawai : <br> <input class="form-control" type="text" name="id_pegawai">
        <br><br>
    </div>
    <div class="col-sm-5">
        Tanggal Transaksi : <br> <input class="form-control" type="date" name="tanggal_transaksi">
        <br><br>
        Nominal : <br> <input class="form-control" type="number" name="nominal">
        <br><br>
        Status Transaksi : <br> <input class="form-control" type="text" name="status_transaksi">
        <br><br>
       <button class="btn btn-primary" type="submit" name="submit">Submit</button>
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
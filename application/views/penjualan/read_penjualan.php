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
<div class="col-md-15">
<div class="card">
<div class="card-header "><h5> Data Transaksi Penjualan</h5></div>
<div class="row mt-3">
</div>
<div class="card-body">
    <a class="btn btn-success" href="c_penjualan/create" role="button">Tambah</a><br><br>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Pakaian</title>
</head>
<body>
<table class = 'table table-bordered table-striped' border="2">
    <thead>
        <tr>
            <th width="auto" class="text-center">Tanggal Transaksi</th>
            <th width="auto" class="text-center">Nama Transaksi</th>
            <th width="auto" class="text-center">PPN</th>
            <th width="auto" class="text-center">Total Penjualan</th>
        </tr>
        </thead>
        <?php foreach ($data as $d):?>
            <tr>
                <td><?=$d['tanggal_transaksi']; ?></td>
                <td><?=$d['status_transaksi']; ?></td>
                <td><?=rupiah($d['PPN']); ?></td>
                <td><?=rupiah($d['total_penjualan']); ?></td>
            </tr>   
        <?php  endforeach; ?>
    </table>
    </div>
</div>
</div>
</div>
</div>
</div>	
</body>
</html>
</body>
</html>

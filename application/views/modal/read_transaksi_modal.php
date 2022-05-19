<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Pakaian</title>
</head>

<body>
    
<div class="container">
<div class="row mt-3">
<div class="col-md-15">
<div class="card">
<div class="card-header "><h5> Data Penyetoran Modal</h5></div>
<div class="row mt-3">
</div>
<div class="card-body">
<p> <a class="btn btn-success" role="botton" href="c_penyetoran_modal/create">Tambah</a> </p>
<table class = 'table table-bordered table-striped' border="2">
    <thead>
        <tr>
            <th width="auto" class="text-center">Tanggal Transaksi</th>
            <th width="auto" class="text-center">Nama Transaksi</th>
            <th width="auto" class="text-center">Nominal</th>
        </tr>
        </thead>
        <?php foreach ($data as $d):?>
            <tr>
                <td><?=$d['tanggal_transaksi']; ?></td>
                <td><?=$d['nama_transaksi']; ?></td>
                <td><?=rupiah($d['nominal']); ?></td>
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
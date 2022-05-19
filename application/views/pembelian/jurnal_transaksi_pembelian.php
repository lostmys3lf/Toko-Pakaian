<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jurnal Pembelian</title>
</head>
<body>
<div class="container">
<div class="row mt-3">
<div class="col-md-15">
<div class="card">
<div class="card-header "><h5> Jurnal Umum</h5></div>
<div class="row mt-3">
</div>
<div class="card-body">
<table class = 'table table-bordered table-striped' border="2">
    <thead>
    <tr>
        <td class="text-center">Tanggal</td>
        <td class="text-center">Nama Akun</td>
        <td class="text-center">Ref</td>
        <td class="text-center">Debit</td>
        <td class="text-center">Kredit</td>
    </tr>
    </thead>
    <?php foreach($data as $d): ?>
        <?php if($d["posisi_db_cr"]=="debit"): ?>
            <tr>
                <td><?= $d["tgl_jurnal"];?></td>
                <td><?= $d["nama_akun_pembelian"];?></td>
                <td><?= $d["ref"];?></td>
                <td><?= rupiah($d["nominal"]);?></td>
                <td></td>
            </tr>
            <?php elseif($d["posisi_db_cr"]=="kredit"): ?>
            <tr>
                <td><?= $d["tgl_jurnal"];?></td>
                <td align='center'><?= $d["nama_akun_pembelian"];?></td>
                <td><?= $d["ref"];?></td>
                <td></td>
                <td><?= rupiah($d["nominal"]);?></td>
            </tr>
            
        <?php endif; ?>
    <?php endforeach; ?>
    
</table>
</div>
</div>
</div>
</div>
</div>
</div>	
</body>
</html>
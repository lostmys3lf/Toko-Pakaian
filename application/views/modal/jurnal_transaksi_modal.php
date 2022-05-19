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
<div class="col-md-8">
<div class="card">
<div class="card-header "><h5> Jurnal Umum</h5></div>
<div class="row mt-3">
</div>
<div class="card-body">
<table class="table table-bordered border-secondary" border="1">
    <tr>
        <th>Tanggal</th>
        <th>Nama Akun</th>
        <th>Ref</th>
        <th>Debit</th>
        <th>Kredit</th>
    </tr>
    <?php foreach($data as $d): ?>
        <?php if($d["posisi_db_cr"]=="Debit"): ?>
            <tr>
                <td><?= $d["tgl_jurnal"];?></td>
                <td><?= $d["nama_akun"];?></td>
                <td><?= $d["ref"];?></td>
                <td><?= rupiah($d["nominal"]);?></td>
            </tr>
            <?php elseif($d["posisi_db_cr"]=="Kredit"): ?>
            <tr>
                <td><?= $d["tgl_jurnal"];?></td>
                <td text-align="center"><?= $d["nama_akun"];?></td>
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
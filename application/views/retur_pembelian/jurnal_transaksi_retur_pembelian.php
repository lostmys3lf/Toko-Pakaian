<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jurnal Retur Pembelian</title>
</head>
<h2>Jurnal Retur Pembelian</h2>
<body>
<table border="1">
    <tr>
        <td>Tanggal</td>
        <td>Ref</td>
        <td>Debit</td>
        <td>Kredit</td>
    </tr>
    <?php foreach($data as $d): ?>
        <?php if($d["posisi_db_cr"]=="debit"): ?>
            <tr>
                <td><?= $d["tgl_jurnal"];?></td>
                <td><?= $d["ref"];?></td>
                <td><?= $d["nominal"];?></td>
                <td></td>
            </tr>
            <?php elseif($d["posisi_db_cr"]=="kredit"): ?>
            <tr>
                <td align='center'><?= $d["tgl_jurnal"];?></td>
                <td><?= $d["ref"];?></td>
                <td></td>
                <td><?= $d["nominal"];?></td>
            </tr>
            
        <?php endif; ?>
    <?php endforeach; ?>
    
</table>
</body>
</html>
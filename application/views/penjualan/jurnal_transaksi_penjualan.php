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
<div class="card-header "><h5> Jurnal Penjualan</h5></div>
<div class="row mt-3">
</div>
<div class="card-body">
<table class="table table-bordered border-secondary" border="1">
    <tr>
        <th align="center"  width="200">Tanggal</th>
        <th align="center" width="200">Nama Akun</th>
        <th align="center" width="200">Ref</th>
        <th align="center" width="200">Debit</th>
        <th align="center" width="200">Kredit</th>
    </tr>
        <?php
				$total_debit = 0;
				$total_kredit = 0;
				$spasi = '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
					foreach($data as $d){
						echo "
							<tr>
								<td>".$d['tgl_jurnal']."</td>
							";
                            if($d["posisi_db_cr"]=="Debit"){
							echo "
								<td>".$d['nama_akun']."</td>
								<td>".$d['ref']."</td>
								<td align = 'right'>Rp".($d['nominal'])."</td>
								<td align = 'right'></td>
							</tr>
							";
							$total_debit = $total_debit + $d['nominal'];
						}else {
							echo "
								<td>".$spasi.$d['nama_akun']."</td>
								<td>".$d['ref']."</td>
								<td align = 'right'></td>
								<td align = 'right'>".($d['nominal'])."</td>
							</tr>
							";
							$total_kredit = $total_kredit + $d['nominal'];
						}
					}
				?>
                <tr>
					<td colspan = 3>Total</td>
					<td align = 'right'><?php echo($total_debit);?></td>
					<td align = 'right'><?php echo ($total_kredit);?></td>
				</tr>
               <a class="btn btn-secondary" href="index" role="button">Kembali</a>
    
</table>
</div>
</div>
</div>
</div>
</div>
</div>	
</body>
</html>


<!-- <?php foreach($data as $d): ?>
        <?php if($d["posisi_db_cr"]=="Debit"): ?>
            <tr>
                <td align="center"><?= $d["tgl_jurnal"];?></td>
                <td><?= $d["nama_akun"];?></td>
                <td align="center"><?= $d["ref"];?></td>
                <td><?= $d["nominal"];?></td>
                <td>-</td>
            </tr>
            <?php elseif($d["posisi_db_cr"]=="Kredit"): ?>
            <tr>
                <td align="center"><?= $d["tgl_jurnal"];?></td>
                <td align="center"><?= $d["nama_akun"];?></td>
                <td align="center"><?= $d["ref"];?></td>
                <td>-</td>
                <td><?= $d["nominal"];?></td>
            </tr>
            
        <?php endif; ?>
    <?php endforeach; ?> -->


<!DOCTYPE html>
<html>
<head>
	<title>Jurnal Umum</title>
</head>
<body>
<div class="container">
<div class="row mt-3">
<div class="col-md-8">
<div class="card">
<div class="card-header "><h5>Jurnal Umum</h5></div>
<div class="row mt-3">
</div>
<div class="card-body">
    <input class="btn btn-secondary" type="button"  value="Kembali" onclick="javascript:history.go(-1);"/>
	<table class="table table-bordered border-secondary" border="1">
    <tr>
	    <th width="80">Tanggal</th>
        <th width="120">Nama Akun</th>
	    <th width="120">Ref</th>
        <th width="80">Debit</th>
	    <th width="80">Kredit</th>
			
	</tr>
    <?php
					$total_debit = 0;
					$total_kredit = 0;
					$spasi = '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
					foreach($jurnal as $d){
						echo "
							<tr>
								<td>".$d['tgl_jurnal']."</td>
							";
						if($d['posisi_db_cr'] == 'Debit'){
							echo "
								<td>".$d['nama_akun']."</td>
								<td align='center'>".$d['ref']."</td>
								<td align = 'right'>".rupiah($d['nominal'])."</td>
								<td align = 'right'></td>
							</tr>
							";
							$total_debit = $total_debit + $d['nominal'];
						}else{
							echo "
								<td>".$spasi.$d['nama_akun']."</td>
								<td align='center'>".$d['ref']."</td>
								<td align = 'right'></td>
								<td align = 'right'>".rupiah($d['nominal'])."</td>
							</tr>
							";
							$total_kredit = $total_kredit + $d['nominal'];
						}
					}
				?>
				<tr>
					<td colspan = 3>Total</td>
					<td align = 'right'><?php echo rupiah($total_debit);?></td>
					<td align = 'right'><?php echo rupiah($total_kredit);?></td>
				</tr>
	</table>
    </div>
</div>
</div>
</div>
</div>
</div>	
</body>
</html>
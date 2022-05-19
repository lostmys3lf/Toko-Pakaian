

<!DOCTYPE html>
<html>
<head>
	<title>Jurnal Umum</title>
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
<center>
			  <form class="row row-cols-lg-auto g-3 align-items-center" method = "POST" action = "<?php echo site_url('c_jurnal/index');?>">
			  <div class="col-9">
					Tanggal Awal :</div><div class="col-9"> <input type = 'date' name = 'tgl_awal' class = 'form-control'>
			  </div>
			  <div class="col-9">
					Tanggal Akhir :</div><div class="col-9"> <input type = 'date' name = 'tgl_akhir' class = 'form-control'>
			  </div>
				<button type="submit" class="btn btn-primary">Submit</button>
			  </form><br>
			</center>
    <input type="button" class="btn btn-secondary"  value="Kembali" onclick="javascript:history.go(-1);"/>
	<input type="button" class="btn btn-secondary"  value="Maju" onclick="javascript:history.go(+1);"/><br><br>
	<table class = 'table table-bordered table-striped' border="2">
		<thead>
    <tr>
	    <th width="80" class="text-center">Tanggal</th>
        <th width="150" class="text-center">Nama Akun</th>
	    <th width="80" class="text-center">Ref</th>
        <th width="80" class="text-center">Debit</th>
	    <th width="80" class="text-center">Kredit</th>
			
	</tr>
	</thead>
    <?php
					$total_debit = 0;
					$total_kredit = 0;
					$spasi = '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
					foreach($jurnal as $d){
						echo "
							<tr>
							<td class='text-center'>".$d['tgl_jurnal']."</td>
							";
						if($d['posisi_db_cr'] == 'Debit'){
							echo "
								<td>".$d['nama_akun']."</td>
								<td align='center'>".$d['no_akun']."</td>
								<td align = 'right'>".rupiah($d['nominal'])."</td>
								<td align = 'right'></td>
							</tr>
							";
							$total_debit = $total_debit + $d['nominal'];
						}else{
							echo "
								<td>".$spasi.$d['nama_akun']."</td>
								<td align='center'>".$d['no_akun']."</td>
								<td align = 'right'></td>
								<td align = 'right'>".rupiah($d['nominal'])."</td>
							</tr>
							";
							$total_kredit = $total_kredit + $d['nominal'];
						}
					}
				?>
				<tfoot>
				<tr>
					<td colspan = 3 align="center">Total</td>
					<td align = 'right'><?php echo rupiah($total_debit);?></td>
					<td align = 'right'><?php echo rupiah($total_kredit);?></td>
				</tr>
				</tfoot>
	</table>
    </div>
</div>
</div>
</div>
</div>
</div>	
</body>
</html>
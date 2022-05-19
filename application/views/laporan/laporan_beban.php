

<!DOCTYPE html>
<html>
<head>
	<title>Laporan Beban</title>
</head>
<body>
<div class="container">
<div class="row mt-3">
<div class="col-md-15">
<div class="card">
<div class="card-header "><h5>Laporan Beban</h5></div>
<div class="row mt-3">
</div>
<div class="card-body">
<center>
			  <form class="row row-cols-lg-auto g-3 align-items-center" method = "POST" action = "<?php echo site_url('c_laporan_beban/index');?>">
			  <div class="col-9">
					Tanggal Awal :</div><div class="col-9"> <input type = 'date' name = 'tgl_awal' class = 'form-control'>
			  </div>
			  <div class="col-9">
					Tanggal Akhir :</div><div class="col-9"> <input type = 'date' name = 'tgl_akhir' class = 'form-control'>
			  </div>
				<button type="submit" class="btn btn-primary">Submit</button>
			  </form><br>
			</center>
    <input type="button" class="btn btn-secondary"  value="Kembali" onclick="javascript:history.go(-1);"/><br><br>
	<table class = 'table table-bordered table-striped' border="2">
		<thead>
    <tr>
	    <th width="80" class="text-center">Tanggal</th>
        <th width="150" class="text-center">Keterangan</th>
        <th width="120" class="text-center">Saldo</th>
			
	</tr>
	</thead>
    <?php
    
					$total = 0;
					foreach($laporan_beban as $d){
						echo "
							<tr>
								<td class='text-center'>".$d['tgl_jurnal']."</td>
								<td>".$d['nama_akun']."</td>
								<td align = 'left'>".rupiah($d['nominal'])."</td>
							</tr>
							";
							$total = $total + $d['nominal'];
					}
				?>
				<tfoot>
				<tr>
					<td colspan = 2 align="center">Total</td>
					<td align = 'left'><?php echo rupiah($total);?></td>
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
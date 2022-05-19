<html>
	<head>
		<title>Neraca Saldo</title>
	</head>
	<body>
	<div class="container">
<div class="row mt-3">
<div class="col-md-15">
<div class="card">
<div class="card-header "><h5>Neraca Saldo</h5></div>
<div class="row mt-3">
</div>
<div class="card-body">
		<table class = 'table table-bordered table-striped' border="2">
		<thead>
			<tr>
                <tr>
				<th rowspan="2" width="80" class="text-center">No Akun</th>
				<th rowspan="2" width="150" class="text-center">Nama Akun</th>
                <th colspan="2" width="80" class="text-center">Saldo</th>
                </tr>
                <tr>
                <th width="120" class="text-center">Debit</th>
				<th width="120" class="text-center">Kredit</th>
			</tr>
			</thead>
			<?php
    
					$total_debit = 0;
					$total_kredit = 0;
					$spasi = '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
                    $saldo=0;
					foreach($neraca_saldo as $d){
                        echo "
						<tr>
							<td>".$d['no_akun']."</td>
							<td>".$d['nama_akun']."</td>
						";
						//if($d['posisi_db_cr'] == 'Debit'){
						if($d['header_akun'] == 1 or $d['header_akun'] == 5 or $d['header_akun'] == 6){
							$saldo = $d['debit'] - $d['kredit'];
							
							echo "
							<td align = 'right'>".rupiah($saldo)."</td> 
							<td></td>
							";
							$total_debit = $total_debit + $saldo;
						}else{
							$saldo = $d['kredit'] - $d['debit'];
							echo "
							<td></td>
								<td align = 'right'>".rupiah($saldo)."</td>
							</tr>
							";
							$total_kredit = $total_kredit + $saldo;
						}
					}
				?>
				<tfoot>
				<tr>
					<td colspan = 2 align="center">Total</td>
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
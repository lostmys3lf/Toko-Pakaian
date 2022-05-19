<html>
	<head>
	</head>
	<body>
	<div class="container">
<div class="row mt-3">
<div class="col-md-15">
<div class="card">
<div class="card-header "><h5>Buku Besar <?php echo $dataakun['nama_akun'];?></h5></div>
<div class="row mt-3">
</div>
<div class="card-body">
		<form  method = "POST"  action = "" class="row row-cols-lg-auto g-3 align-items-center">
		<div class="col-9">
		  <center> <select name = "no_akun" class = "form-control input-sm">
			<option value="#" disabled selected>Pilih Akun</option>
			<?php
				foreach($akun as $data){
					echo "
						<option value = ".$data['no_akun'].">".$data['nama_akun']."</option>
					";
				}
			?>
		  </select>
			</div>
		  <div class="col-12">
		  <button class = "btn btn-primary" type = "submit">Submit</button></center><br>
		</div>
		
		</form><br>
		<h4 class="text-center">Buku Besar <?php echo $dataakun['nama_akun'];?></h4>
		<table class = 'table table-bordered table-striped' border="2">
			<thead>
			<tr>
                <tr>
				<th rowspan="2" width="120" class="text-center">Tanggal</th>
				<th rowspan="2" width="150" class="text-center">Keterangan</th>
				<th rowspan="2" width="120" class="text-center">Debit</th>
				<th rowspan="2" width="120" class="text-center">Kredit</th>
                <th colspan="2" width="80" class="text-center">Saldo</th>
                </tr>
                <tr>
                <th width="120" class="text-center">Debit</th>
				<th width="120" class="text-center">Kredit</th>
                </tr>
				
			</tr>
			</thead>
			<?php
				$saldo = 0;
				foreach($jurnal as $data){
					echo "
						<tr>
							<td class='text-center'>".$data['tgl_jurnal']."</td>
							<td>".$data['nama_akun']."</td>
						";
					if($data['posisi_db_cr'] == 'Debit'){
						if($dataakun['header_akun'] == 1 or $dataakun['header_akun'] == 5 or $dataakun['header_akun'] == 6){
							$saldo = $saldo + $data['nominal'];
						}else{
							$saldo = $saldo - $data['nominal'];
						}
						echo "
							<td align = 'left'>".rupiah($data['nominal'])."</td>
							<td></td>
							
						
						";

					}else{
						if($dataakun['header_akun'] == 1 or $dataakun['header_akun'] == 5 or $dataakun['header_akun'] == 6){
							$saldo = $saldo - $data['nominal'];
						}else{
							$saldo = $saldo + $data['nominal'];
						}
						echo "
							<td></td>
							<td align = 'left'>".rupiah($data['nominal'])."</td>
						
						";
					}
				
                if($dataakun['header_akun'] == 1 or $dataakun['header_akun'] == 5 or $dataakun['header_akun'] == 6){
					
					echo "
							<td align = 'left'>".rupiah($saldo)."</td>
							<td></td>
							
						</tr>
						";
						
				}else{
					
				echo "
				<td></td>
				<td align = 'left'>".rupiah($saldo)."</td>
							
						</tr>
						";
                
            }
		}
		if($dataakun['header_akun'] == 1 or $dataakun['header_akun'] == 5 or $dataakun['header_akun'] == 6){
			echo "
			<tfoot>
					<tr>
						<td class='text-center'>".date('y-m-d')."</td>
						<td>Saldo Akhir</td>
						<td></td>
						<td></td>
						<td align = 'left'>".rupiah($saldo)."</td>
                        <td></td>
					</tr>
					</tfoot>
				";
		}else{
			echo "
			<tfoot>
					<tr>
						<td class='text-center'>".date('y-m-d')."</td>
						<td>Saldo Akhir</td>
						<td></td>
						<td></td>
                        <td></td>
						<td align = 'left'>".rupiah($saldo)."</td>
					</tr>
					</tfoot>
				";
		}
		
			?>
		</table>
		</div>
</div>
</div>
</div>
</div>
</div>	
	</body>
</html>
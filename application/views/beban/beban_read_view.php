<!DOCTYPE html>
<html>
<head>
	<title>Transaksi Beban</title>
</head>
<body>
<div class="container">
<div class="row mt-3">
<div class="col-md-15">
<div class="card">
<div class="card-header "><h5>Transaksi Beban</h5></div>
<div class="row mt-3">
</div>
<div class="card-body">
<!--<a class="btn btn-success" href="c_beban/tambah/" role="button">Tambah</a><br><br>-->
<a class="btn btn-success" <?php echo anchor('c_beban/tambah','Tambah'); ?> <br><br>
<table class = 'table table-bordered table-striped' border="2">
	<!--<center><h1>Transaksi Beban</h1></center>
	<table style="margin:20px auto;" border="1">-->
		<thead>
    <tr>
	    <th width="auto" class="text-center">Id Transaksi</th>
        <th width="auto" class="text-center">Id Beban</th>
	    <th width="auto" class="text-center">Nama Beban</th>
        <th width="auto" class="text-center">Total Beban</th>
	    <th width="auto" class="text-center">Nama Pegawai</th>
			
	</tr>
	</thead>
		<?php 
		$no = 1;
		foreach($beban as $row){ 
		?>
		<tr>
        <td align="center"><?php echo $row->id_transaksi;?></td>
        <td align="center"><?php echo $row->id_beban;?></td>
	    <td><?php echo $row->nama_transaksi;?></td>
        <td align="left"><?php echo rupiah($row->total_beban);?></td>
	    <td align="center"><?php echo $row->nama_pegawai;?></td>
		</tr>
		<?php } ?>
	</table>
    </div>
</div>
</div>
</div>
</div>
</div>	
</body>
</html>
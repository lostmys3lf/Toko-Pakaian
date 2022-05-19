<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Pakaian</title>
</head>
<body>
<div class="container">
<div class="row mt-3">
<div class="col-md-15">
<div class="card">
<div class="card-header "><h5> Data COA</h5></div>
<div class="row mt-3">
</div>
<div class="card-body">
<a class="btn btn-success" href="c_coa/create/" role="button">Tambah</a><br><br>
<table class="table table-bordered border-secondary" border="2">
	<thead>
	<tr>
	<th width="auto" class="text-center">No Akun</th>
	<th width="auto" class="text-center">Header Akun </th>
	<th width="auto" class="text-center">Nama Akun </th>
	<th width="auto" class="text-center">Saldo Awal</th>
	<th width="100" class="text-center">Ubah</th>
	<th width="100" class="text-center">Hapus</th>
</tr>
</thead>
<?php
foreach ($rows as $row){
?>
<tr>
	<td align="center"><?php echo $row->no_akun;?></td>
	<td align="center"><?php echo $row->header_akun;?></td>
	<td align="center"><?php echo $row->nama_akun;?></td>
	<td align="center"><?php echo rupiah($row->saldo_awal);?></td>

	<td align="center">
	<a class="btn btn-warning" href="c_coa/update/<?php echo $row->no_akun; ?>" role="button">Ubah</a>
	</td>
	<td align="center">
	<a class="btn btn-danger" href="c_coa/delete/<?php echo $row->no_akun; ?>" role="button">Hapus</a>
	</td>
</tr>
<?php
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

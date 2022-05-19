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
<div class="card-header "><h5> Data Pemasok</h5></div>
<div class="row mt-3">
</div>
<div class="card-body">
<a class="btn btn-success" href="c_pemasok/create/" role="button">Tambah</a><br><br>
<table class="table table-bordered border-secondary" border="2">
	<thead>
<tr>
	<th width="120"class="text-center">Id Pemasok</th>
	<th width="120"class="text-center">Nama Pemasok </th>
	<th width="120"class="text-center">Nama Produk </th>
	<th width="120"class="text-center">No. Telp </th>
	<th width="80"class="text-center">Ubah</th>
	<th width="80"class="text-center">Hapus</th>
</tr>
</thead>
<?php
foreach ($rows as $row){
?>
<tr>
	<td align="center"><?php echo $row->id_pemasok;?></td>
	<td align="center"><?php echo $row->nama_pemasok;?></td>
	<td align="center"><?php echo $row->nama_produk;?></td>
	<td align="center"><?php echo $row->no_telp_pemasok;?></td>
	<td align="center">
	<a class="btn btn-warning" href="c_pemasok/update/<?php echo $row->id_pemasok; ?>" role="button">Ubah</a>
	</td>
	<td align="center">
	<a class="btn btn-danger" href="c_pemasok/delete/<?php echo $row->id_pemasok; ?>" role="button">Hapus</a>
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

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
<div class="card-header "><h5> Data Produk</h5></div>
<div class="row mt-3">
</div>
<div class="card-body">
<a class="btn btn-success" href="c_produk/create/" role="button">Tambah</a><br><br>
<table class="table table-bordered border-secondary" border="2">
	<thead>
	<tr>
	<th width="80" class="text-center">Id_Produk</th>
	<th width="120" class="text-center">Nama Produk </th>
	<th width="120" class="text-center">Jenis Pakaian </th>
	<th width="120" class="text-center">Stock</th>
	<th width="100" class="text-center">Harga_satuan</th>
	
	<th width="100" class="text-center">Ubah</th>
	<th width="100" class="text-center">Hapus</th>
</tr>
</thead>
<?php
foreach ($rows as $row){
?>
<tr>
	<td align="center"><?php echo $row->id_produk;?></td>
	<td align="center"><?php echo $row->nama_produk;?></td>
	<td align="center"><?php echo $row->jenis_pakaian;?></td>
	<td align="center"><?php echo $row->stock;?></td>
	<td align="center"><?php echo rupiah($row->harga_satuan);?></td>
	<td align="center">
	<a class="btn btn-warning" href="c_produk/update/<?php echo $row->id_produk; ?>" role="button">Ubah</a>
	</td>
	<td align="center">
	<a class="btn btn-danger" href="c_produk/delete/<?php echo $row->id_produk; ?>" role="button">Hapus</a>
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

<html>
<head><title>Pelanggan</title></head>
<body>
<div class="container">
<div class="row mt-3">
<div class="col-md-15">
<div class="card">
<div class="card-header "><h5> Data Pelanggan</h5></div>
<div class="row mt-3">
</div>
<div class="card-body">
<a class="btn btn-success" href="c_pelanggan/create/" role="button">Tambah</a><br><br>
<table class="table table-bordered border-secondary" border="2">
	<thead>
<tr>
	<th width="auto" class="text-center">Id Pelanggan</th>
	<th width="auto" class="text-center">Nama Pelanggan</th>
	<th width="auto" class="text-center">Jenis Kelamin</th>
	<th width="auto" class="text-center">No.telp Utama</th>
	<th width="auto" class="text-center">No.telp Cadangan</th>
    <th width="auto" class="text-center">Alamat</th>
	<th width="auto" class="text-center">Ubah</th>
	<th width="auto" class="text-center">Hapus</th>
</tr>
</thead>
<?php
foreach ($rows as $row){
?>
<tr>
	<td class="text-center"><?php echo $row->id_pelanggan;?></td>
	<td><?php echo $row->nama_pelanggan;?></td>
	<td><?php echo $row->jenis_kelamin;?></td>
	<td><?php echo $row->no_telp_utama;?></td>
	<td><?php echo $row->no_telp_cadangan;?></td>
    <td><?php echo $row->alamat;?></td>
	
	<td align="center">
	<a class="btn btn-warning" href="c_pelanggan/update/<?php echo $row->id_pelanggan; ?>" role="button">Ubah</a>
	</td>
	<td align="center">
	<a class="btn btn-danger" href="c_pelanggan/delete/<?php echo $row->id_pelanggan; ?>" role="button">Hapus</a>
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
<html>
<head><title>Pegawai</title></head>
<body>
<div class="container">
<div class="row mt-3">
<div class="col-md-15">
<div class="card">
<div class="card-header "><h5> Data Pegawai</h5></div>
<div class="row mt-3">
</div>
<div class="card-body">
<a class="btn btn-success" href="c_pegawai/create/" role="button">Tambah</a><br><br>
<table class="table table-bordered border-secondary" border="2">
	<thead>
<tr>
	<th width="auto" class="text-center">ID Pegawai</th>
	<th width="auto" class="text-center">Nama Pegawai</th>
	<th width="auto" class="text-center">Jenis Kelamin</th>
	<th width="auto" class="text-center">No Telp</th>
	<th width="auto" class="text-center">Alamat</th>
	<th width="100" class="text-center">Ubah</th>
	<th width="100" class="text-center">Hapus</th>
</tr>
</thead>
<?php
foreach ($rows as $row){
?>
<tr>
	<td align="center"><?php echo $row->id_pegawai;?></td>
	<td align="center"><?php echo $row->nama_pegawai;?></td>
	<td align="center"><?php echo $row->jenis_kelamin;?></td>
	<td align="center"><?php echo $row->no_telp;?></td>
	<td align="center"><?php echo $row->alamat;?></td>
	<td align="center">
	<a class="btn btn-warning" href="c_pegawai/update/<?php echo $row->id_pegawai; ?>" role="button">Ubah</a>
	</td>
	<td align="center">
	<a class="btn btn-danger" href="c_pegawai/delete/<?php echo $row->id_pegawai; ?>" role="button">Hapus</a>
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

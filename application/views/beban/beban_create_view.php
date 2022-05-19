<!DOCTYPE html>
<html>
<head>
	<title>Transaksi Beban</title>
</head>
<body>
<div class="container">
    <div class="row mt-3">
    <div class="col-md-8"></div>
    <div class="card">
    <div class="card-header "><h5>Form Tambah Data Beban</h5></div>
    <div class="card-body">
	<form action="<?php echo base_url(). "index.php/c_beban/insert"; ?>" method="post">
    
		<table style="margin:20px auto;">
        <div class="row g-5">
    <div class="col-sm-5">
			Id Transaksi : <br>
            <input class="form-control" type="text" name="id_transaksi" placeholder="eg : KK01"><br><br>
            No. Transaksi : <br>
            <input class="form-control" type="text" name="no_transaksi" placeholder="eg : 123"><br><br>
            Tanggal Transaksi : <br>
            <input class="form-control" type="date" name="tanggal_transaksi"><br><br>
			Nama Pegawai : <br>
			<select class="form-control" name="id_pegawai" id="id_pegawai" required>
            <option value="#" disabled selected >--Pilih Pegawai--</option>
                <?php
                $kon = mysqli_connect("localhost",'root',"","toko_pakaian");
                if (!$kon){
                    die("Koneksi database gagal:".mysqli_connect_error());
                }
                $sql="select * from pegawai";
                $hasil=mysqli_query($kon,$sql);
                $no=0;
                while ($data = mysqli_fetch_array($hasil)) {
                    $no++;
                    ?>
                <option value="<?php echo $data['id_pegawai'];?>"><?php echo $data['nama_pegawai'];?></option>
                <?php } ?>
            </select><br><br>
    </div>  
    <div class="col-sm-5">
			Nama Transaksi : <br>
            <input class="form-control" type="text" name="nama_transaksi" placeholder="eg : Sewa Mesin"> <br><br>
            Total Beban : <br>
            <input class="form-control" type="text" name="total_beban" placeholder="eg : 10000"><br><br>
            Status Transaksi : <br>
            <select class="form-control" name="status_transaksi">
                    <option value="#" disabled selected >--Pilih Status Transaksi--</option>
					<option value="Penyetoran Modal">Penyetoran Modal</option>
					<option value="Pembayaran Beban">Pembayaran Beban</option>
					<option value="Penjualan">Penjualan</option>
					<option value="Pembelian">Pembelian</option>
					<option value="Retur Penjualan">Retur Penjualan</option>
					<option value="Retur Pembelian">Retur Pembelian</option>
			</select><br><br><br>
			<input class="btn btn-primary" type="submit" name="submit" value="Simpan">
             <input class="btn btn-secondary" type="button"  value="Batal" onclick="javascript:history.go(-1);"/><br><br>
             </div>
            </div>
		</table>
            
	</form>
    </div>
    </div>
    </div>
    </div>
    </div><br><br>	
</body>
</html>
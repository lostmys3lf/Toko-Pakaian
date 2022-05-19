<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row mt-3">
    <div class="col-md-8"></div>
    <div class="card">
    <div class="card-header "><h5>Form Tambah Data Penjualan</h5></div>
    <div class="card-body">
    <form action="selesai_transaksi" method="post">
    <div class="row g-5">
        <div class="col-sm-5">
    Id transaksi : <input class="form-control" type="text" name="id_transaksi">
    <br><br>
    No transaksi : <input class="form-control" type="text" name="no_transaksi">
    <br><br>
    Tanggal Penjualan : <input class="form-control" type="date" name="tanggal_transaksi">
    <br>
    <br>
    Pilih Pegawai :
    <select class="form-control" name="id_pegawai" id="id_pegawai" required>
                <option value="">-Pilih Pegawai-</option>
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
        
    Pilih Produk :
    <?php   
                          $con = mysqli_connect("localhost","root","","toko_pakaian");  
    ?>  
    <select class="form-control" name="id_produk" id="id_produk" class="form-control" onchange='changeValue(this.value)' required > 
                         <option value="">-Pilih Produk-</option>
                          <?php   
                          $query = mysqli_query($con, "select * from produk order by id_produk esc");  
                          $result = mysqli_query($con, "select * from produk");  
                          $a          = "var harga_satuan = new Array();\n;";  
                          while ($row = mysqli_fetch_array($result)) {  
                               echo '<option name="id_produk" value="'.$row['id_produk'] . '">' . $row['nama_produk'] . '</option>';   
                          $a .= "harga_satuan['" . $row['id_produk'] . "'] = {harga_satuan:'" . addslashes($row['harga_satuan'])."'};\n";
                          
                          }  
                          ?>  
    </select>
    <br>
    <br> 
    </div>
        <div class="col-sm-5">
    Harga Satuan :<input class="form-control" type="number" name="nominal" id="harga_satuan" readonly> 
    <br>
    <br>
    Jumlah : <input class="form-control" type="number" name="quantity">   
    <br>
    <br>
    Pilih Pelanggan :
    <select class="form-control" name="id_pelanggan" id="id_pelanggan" required>
                <option value="">-Pilih pelanggan-</option>
                <?php
                $kon = mysqli_connect("localhost",'root',"","toko_pakaian");
                if (!$kon){
                    die("Koneksi database gagal:".mysqli_connect_error());
                }
                $sql="select * from pelanggan";
                $hasil=mysqli_query($kon,$sql);
                $no=0;
                while ($data = mysqli_fetch_array($hasil)) {
                    $no++;
                    ?>
                <option value="<?php echo $data['id_pelanggan'];?>"><?php echo $data['nama_pelanggan'];?></option>
                <?php } ?>
            </select><br><br>
        Status Transaksi : <br>
            <select class="form-control" name="status_transaksi">
                    <option value="">-Pilih Transaksi-</option>
					<option value="Penyetoran Modal">Penyetoran Modal</option>
					<option value="Pembayaran Beban">Pembayaran Beban</option>
					<option value="Penjualan">Penjualan</option>
					<option value="Pembelian">Pembelian</option>
					<option value="Retur Penjualan">Retur Penjualan</option>
					<option value="Retur Pembelian">Retur Pembelian</option>
			</select><br><br> <br>
             <button class="btn btn-primary" type="submit">submit</button>
             <input class="btn btn-secondary" type="button"  value="Batal" onclick="javascript:history.go(-1);"/>
        </div>
    </div>
    </form>
    </div>
        </div>
        </div>
    </div>
    </div><br><br>
</body>
<script type="text/javascript">   
                          <?php   
                          echo $a;   
                           ?>  
                          function changeValue(id){  
                            document.getElementById('harga_satuan').value = harga_satuan[id].harga_satuan;  
                          };  
                          </script>  

</html>


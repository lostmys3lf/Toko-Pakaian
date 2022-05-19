<div class="container">
<div class="row mt-3">
<div class="col-md-15">
<div class="card">
<div class="card-header "><h5>Laporan Penjualan</h5></div>
<div class="row mt-3">
</div>
<div class="card-body">
<?php
echo form_open('c_penjualan/laporan_penjualan');
?>

<table class="table table-bordered">
    <tr><td>
            <div class="col-sm-2"">
                <input type="date" name="tanggal1" class="form-control" placeholder="Tanggal Mulai">
            </div>
            <div class="col-sm-2"">
                <input type="date" name="tanggal2" class="form-control" placeholder="Tanggal Selesai">
            </div>
        </td></tr>
    <tr><td><button class="btn btn-primary btn-sm" type="submit" name="submit">Proses</button></td></tr>
</table>
<input type="button" class="btn btn-secondary"  value="Kembali" onclick="javascript:history.go(-1);"/>
</form>

<hr>
<table class = 'table table-bordered table-striped' border="2">
    <thead>
    <tr><th class="text-center">No</th><th class="text-center">Tanggal Transaksi</th><th class="text-center">Nama Pelanggan</th><th class="text-center">Produk Terjual</th><th class="text-center">Quantity</th><th class="text-center">Total Transaksi</th></tr>
    </thead>
    <?php
    $no=1;
    $total=0;
    foreach ($record->result() as $r)
    {
        echo "<tr>
            <td width='10'>$no</td>
            <td width='160'>$r->tanggal_transaksi</td>
            <td>$r->nama_pelanggan</td>
            <td>$r->nama_produk</td>
            <td align='center'>$r->quantity</td>
            <td align='right'>".rupiah($r->total_penjualan)."</td>
            </tr>";
        $no++;
        $total=$total+$r->total_penjualan;
    }
    ?>
    <tfoot>
    <tr><td class="text-center" colspan="5">Total</td><td align="right"><?php echo rupiah($total) ;?></td></tr>
    </tfoot>
</table>
<a href="index">Kembali</a>
</div>
</div>
</div>
</div>
</div>
</div><br><br>	


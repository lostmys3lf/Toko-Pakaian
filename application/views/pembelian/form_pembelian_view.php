<h3>Form Transaksi Pembelian</h3>
<p><a href="c_pembelian/jurnal">Jurnal Pembelian</a></p>
<p><a href="c_laporan_pembelian">Lihat Laporan Pembelian</a></p>
<?php
echo form_open('c_pembelian');
?>
<table class="table table-bordered">
    <tr class="success" style="background-color: lavender;"><th>Form</th></tr>
    <tr><td>
<div class="col-sm-1">
                <input type="text" name="id_transaksi" placeholder="id_transaksi" class="form-control">
            </div>
<div class="col-sm-1">
                <input type="text" name="id_pembelian" placeholder="id_pembelian" class="form-control">
            </div>   
<div class="col-sm-1">
                <input type="date" name="tgl" placeholder="tgl" class="form-control">
            </div>
<div class="col-sm-1">
                <input type="text" name="ppn" placeholder="ppn" class="form-control">
            </div>
<div class="col-sm-1">
                <input type="text" name="total_pembelian" placeholder="total_pembelian" class="form-control">
            </div>
<div class="col-sm-1">
                <input type="text" name="id_termin" placeholder="id_termin" class="form-control">
            </div>            
</td></tr>
    <tr><td>
            <button type="submit" name="submit" class="btn btn-default">Simpan</button>
            <?php echo anchor('C_pembelian/selesai_belanja','Selesai',array('class'=>'btn btn-default'))?>
        </td></tr>
</table>
</form>

<table class="table table-bordered" border=2>
    <tr class="succes" style="background-color: lightsalmon;"><th colspan="10">Detail Pembelian</th></tr>
    <tr style="background-color: lightgoldenrodyellow;"><th>Id Transaksi</th><th>Id Pembelian</th><th>Tanggal</th><th>PPn</th><th>Total Pembelian</th><th>Id Termin</th>
    <?php
    foreach ($pembelian->result() as $d)
    {
        echo "<tr>
        <td> $d->id_transaksi</td>
        <td> $d->id_pembelian</td>
        <td> $d->tgl</td>
        <td> $d->PPN</td>
        <td> $d->total_pembelian</td>
        <td> $d->id_termin</td>";
    }
    ?>
</table>

<datalist id="pemasok">
    <?php

    foreach ($pemasok->result() as $a)
    {
        echo "<option value='$a->id_pemasok'>";
    }
    ?>
</datalist>

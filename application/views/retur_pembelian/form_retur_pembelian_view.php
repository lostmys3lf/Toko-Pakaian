<h3>Form Transaksi Retur Pembelian</h3>
<?php echo anchor('c_jurnal/index','Lihat Jurnal'); ?>
<p><a href="c_laporan_retur_pembelian">Lihat Laporan Retur Pembelian</a></p>
<?php
echo form_open('c_retur_pembelian');
?>
<table class="table table-bordered">
    <tr class="success" style="background-color: blue;"><th>Form</th></tr>
    <tr><td>
<div class="col-sm-1">
                <input type="text" name="id_retur_pemb" placeholder="ID RETUR PEMBELIAN" class="form-control">
            </div>
<div class="col-sm-1">
                <input type="list" name="id_pembelian" placeholder="ID PEMBELIAN" class="form-control">
            </div>   
<div class="col-sm-1">
                <input type="date" name="tgl" placeholder="TGL" class="form-control">
            </div>
<div class="col-sm-1">
                <input type="text" name="alasan_retur" placeholder="ALASAN RETUR" class="form-control">
            </div>
<div class="col-sm-1">
                <input type="number" name="jumlah" placeholder="JUMLAH" class="form-control">
            </div>
<div class="col-sm-1">
                <input type="number" name="total_retur_pemb" placeholder="TOTAL RETUR PEMBELIAN" class="form-control">
            </div>
<div class="col-sm-1">
                <input type="number" name="ppn" placeholder="PPN" class="form-control">
            </div>           
</td></tr>
    <tr><td>
            <button type="submit" name="submit" class="btn btn-default">Simpan</button>
            <?php echo anchor('c_retur_pembelian/selesai_belanja','Selesai',array('class'=>'btn btn-default'))?>
        </td></tr>
</table>
</form>

<datalist id="pembelian">
    <?php

    foreach ($pembelian->result() as $a)
    {
        echo "<option value='$a->id_pembelian'>";
    }
    ?>
</datalist>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan setor modal</title>
    </head>
    <div class="container">
<div class="row mt-3">
<div class="col-md-15">
<div class="card">
<div class="card-header "><h5>Laporan Penyetoran Modal</h5></div>
<div class="row mt-3">
</div>
<div class="card-body">
    <?php
    echo form_open('http://localhost/ci/index.php/c_penyetoran_modal/laporan');
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
    </form>
    <table class = 'table table-bordered table-striped' border="2">
        <thead>
        <tr><th class="text-center">No</th><th class="text-center">Tanggal Pembelian</th><th class="text-center">ID Pembelian</th><th class="text-center">Total Transaksi</th></tr>
        </thead>
        <?php
        $no=1;
        $total=0;
        foreach ($record->result() as $r)
        {
            echo "<tr>
                <td width='10'>$no</td>
                <td width='160'>$r->tanggal_transaksi</td>
                <td>$r->id_modal</td>
                <td align='right'>".rupiah($r->nominal)."</td>
                </tr>";
            $no++;
            $total=$total+$r->nominal;
        }
        ?>
        <tfoot>
        <tr><td colspan="3" align="center">Total</td><td align="right"><?php echo rupiah($total);?></td></tr>
        </tfoot>
    </table>
    </div>
</div>
</div>
</div>
</div>
</div>	
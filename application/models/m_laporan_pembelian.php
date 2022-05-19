<?php

class m_laporan_pembelian extends CI_Model{
    function laporan_periode($tanggal1,$tanggal2)
    {
        $query="SELECT * FROM pembelian 
        WHERE tgl between '$tanggal1' and '$tanggal2' 
        group by id_pembelian";
        return $this->db->query($query);
    }

    function laporan_default()
    {
        $query="SELECT * FROM pembelian join transaksi on pembelian.id_transaksi=transaksi.id_transaksi
        group by id_pembelian";
        return $this->db->query($query);
    }
}

?>
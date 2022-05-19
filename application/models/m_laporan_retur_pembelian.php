<?php

class m_laporan_retur_pembelian extends CI_Model{
    function laporan_periode($tanggal1,$tanggal2)
    {
        $query="SELECT * FROM retur_pembelian 
        WHERE tgl between '$tanggal1' and '$tanggal2' 
        group by id_retur_pemb";
        return $this->db->query($query);
    }

    function laporan_default()
    {
        $query="SELECT * FROM retur_pembelian 
        group by id_retur_pemb";
        return $this->db->query($query);
    }
}

?>
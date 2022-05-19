<?php
class m_pemasok_transaksi extends CI_Model{
    
    
    function tampil_data_pembelian()
    {
        $query= "SELECT *FROM pembelian";
        return $this->db->query($query);
    }

    function tampil_data_pemasok()
    {
        $query= "SELECT *FROM pemasok";
        return $this->db->query($query);
    }

    function post($data)
    {
        $this->db->insert('pembelian',$data);
    }
    
    function get_one($id)
    {
        $param = array('id_pembelian'=>$id);
        return $this->db->get_where('pembelian',$param);
    }

}
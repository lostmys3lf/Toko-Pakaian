<?php

class c_laporan_retur_pembelian extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model(array('m_laporan_retur_pembelian'));
  
    }

    function index()
    {
        $data['judul']='Laporan Retur Pembelian';
	    $this->load->view('templates/header',$data);
        if(isset($_POST['submit']))
        {
            $tanggal1 = $this->input->post('tanggal1');
            $tanggal2 = $this->input->post('tanggal2');
                $data['record']=$this->m_laporan_retur_pembelian->laporan_periode($tanggal1,$tanggal2);
            $this->load->view('laporan/view_laporan_retur_pembelian',$data);
        }
        else 
        {
        $data['record']= $this->m_laporan_retur_pembelian->laporan_default();
        $this->load->view('laporan/view_laporan_retur_pembelian',$data);
        }
    }
}

?>
<?php
class c_pembelian extends CI_Controller{
 function __construct() {
        parent::__construct();
        $this->load->model(array('m_pemasok_transaksi','m_pembelian'));
    }
    
    function index()
    {
        $data['judul']='Transaksi Pembelian';
        $this->load->view('templates/header',$data);
        if(isset($_POST['submit']))
        {
            $this->m_pembelian->id_transaksi=$_POST['id_transaksi'];
            $this->m_pembelian->id_pembelian=$_POST['id_pembelian'];
            $this->m_pembelian->tgl=$_POST['tgl'];
            $this->m_pembelian->ppn=$_POST['ppn'];
            $this->m_pembelian->total_pembelian=$_POST['total_pembelian'];
            $this->m_pembelian->id_termin=$_POST['id_termin'];
            $this->m_pembelian->simpan_pembelian();
            redirect('c_pembelian');
        }
        else
        {
            $data['pembelian']= $this->m_pembelian->tampil_data_pembelian();
            $this->load->view('pembelian/form_pembelian_view',$data);
        }
    }
        public function jurnal(){
        $data['judul']='Transaksi Pembelian';
        $this->load->view('templates/header',$data);
        $data=[
        'data'=>$this->m_pembelian->jurnal(),
        ];
        return $this->load->view('pembelian/jurnal_transaksi_pembelian',$data);
    }
}
<?php
class c_retur_pembelian extends CI_Controller{
 function __construct() {
        parent::__construct();
        $this->load->model('m_retur_pembelian');
    }
    function index()
    {
    $d['judul']='Retur Pembelian';
	$this->load->view('templates/header',$d);
        if(isset($_POST['submit']))
        {
            $this->m_retur_pembelian->id_retur_pemb=$_POST['id_retur_pemb'];
            $this->m_retur_pembelian->id_pembelian=$_POST['id_pembelian'];
            $this->m_retur_pembelian->tgl=$_POST['tgl'];
            $this->m_retur_pembelian->alasan_retur=$_POST['alasan_retur'];
            $this->m_retur_pembelian->jumlah=$_POST['jumlah'];
            $this->m_retur_pembelian->total_retur_pemb=$_POST['total_retur_pemb'];
            $this->m_retur_pembelian->ppn=$_POST['ppn'];
            $this->m_retur_pembelian->simpan_retur_pembelian();
            redirect('c_retur_pembelian');
        }
        else
        {
            $data['retur_pembelian']= $this->m_retur_pembelian->tampil_data_retur_pembelian();
            $this->load->view('retur_pembelian/form_retur_pembelian_view',$data);
        }
        $this->load->view('templates/footer');
    }
        public function jurnal(){
            $data['judul']='Retur Pembelian';
	$this->load->view('templates/header',$data);
        $data=[
        'data'=>$this->m_retur_pembelian->jurnal(),
        ];
        return $this->load->view('retur_pembelian/jurnal_transaksi_retur_pembelian',$data);
        $this->load->view('templates/footer');
    }
}
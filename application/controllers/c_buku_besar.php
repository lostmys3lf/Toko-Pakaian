<?php 
 
class c_buku_besar extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('m_buku_besar');

	}
  
    function index(){
		$data['judul']='Buku Besar';
	    $this->load->view('templates/header',$data);
		if(isset($_POST['no_akun'])){
			$no_akun = $_POST['no_akun'];
		}else{
			$no_akun = '1101';
		}
		$data['akun'] = $this->m_buku_besar->Akun(); 
		$data['dataakun'] = $this->m_buku_besar->SaldoAkun($no_akun);
		$data['jurnal'] = $this->m_buku_besar->BukuBesar($no_akun); 
		$this->load->view('laporan/buku_besar', $data);
		$this->load->view('templates/footer');
	}
 
	
	}
  
    

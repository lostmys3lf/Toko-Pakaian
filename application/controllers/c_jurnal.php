<?php 
 
class c_jurnal extends CI_Controller{
 
	public function __construct(){
		parent::__construct();		
		$this->load->model('m_jurnal');

	}
    public function index(){
		$data['judul']='Jurnal Umum';
	    $this->load->view('templates/header',$data);
		$data['jurnal'] = $this->m_jurnal->jurnal_umum(); 
		$this->load->view('laporan/jurnal',$data);
	}

}
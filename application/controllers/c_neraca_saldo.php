<?php 
 
class c_neraca_saldo extends CI_Controller{
 
	public function __construct(){
		parent::__construct();		
		$this->load->model('m_neraca_saldo');

	}
    public function index(){
		$data['judul']='Neraca Saldo';
	    $this->load->view('templates/header',$data);
		$data['neraca_saldo'] = $this->m_neraca_saldo->neraca_saldo();
		$this->load->view('laporan/neraca_saldo', $data);
        
        
    }
}
<?php 
 
class c_laporan_beban extends CI_Controller{
 
	public function __construct(){
		parent::__construct();		
		$this->load->model('m_laporan_beban');

	}
    public function index(){
		$data['judul']='Laporan Beban';
	    $this->load->view('templates/header',$data);
		$data['laporan_beban'] = $this->m_laporan_beban->laporan();
		$this->load->view('laporan/laporan_beban', $data);
        
    }
}
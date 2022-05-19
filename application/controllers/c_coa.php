<?php
class c_coa extends CI_controller{
	public $model = NULL;
	
	public function __construct(){
		parent::__construct();
		//memuat model
	$this->load->model('m_coa');
	$this->model =$this->m_coa;
	
	//memuat librari database
	$this->load->database();
	}
	
	public function index(){
	$data['judul']='COA';
	$this->load->view('templates/header',$data);
	$this->read();
	$this->load->view('templates/footer');
	}
	public function create() {
	//belum implementasi
	$data['judul']='COA';
	$this->load->view('templates/header',$data);
        if (isset($_POST['btnSubmit'])) {
			$this->model->no_akun=$_POST['no_akun'];
			$this->model->header_akun=$_POST['header_akun'];
            $this->model->nama_akun=$_POST['nama_akun'];
			$this->model->saldo_awal=$_POST['saldo_awal'];
			$this->model->insert();
			redirect('c_coa');
		}else{
			$this->load->view('coa/coa_create_view',['model'=>$this->model]);
		}
		$this->load->view('templates/footer');
	}
	
	public function read() {
		$rows=$this->model->read();
		$this->load->view('coa/coa_read_view', ['rows'=>$rows]);
	}
	public function update($id) {
		//belum implementasi
		$data['judul']='COA';
	$this->load->view('templates/header',$data);
		if (isset($_POST['btnSubmit'])) {
			$this->model->no_akun=$_POST['no_akun'];
			$this->model->header_akun=$_POST['header_akun'];
            $this->model->nama_akun=$_POST['nama_akun'];
			$this->model->saldo_awal=$_POST['saldo_awal'];
			$this->model->harga_beli=$_POST['harga_beli'];
            $this->model->harga_jual=$_POST['harga_jual'];
			$this->model->update();
			redirect('c_coa');
		}else{
			$query = $this->db->query("SELECT * FROM coa WHERE 
			no_akun='$id'");
			//if ($query->num_row() ==0) exit(1);
				$row =$query->row();
				$this->model->no_akun=$row->no_akun;
				$this->model->header_akun=$row->header_akun;
                $this->model->nama_akun=$row->nama_akun;
				$this->model->saldo_awal=$row->saldo_awal;

				$this->load->view('coa/coa_update_view',
				['model'=>$this->model]);
		}
		$this->load->view('templates/footer');
	}
	public function delete($id) {
		//menentukan no_akun yang akan di hapus
		$this->model->no_akun = $id;
		//menghapus baris data di dalam tabel barang
		$this->model->delete();
		//mengarahkan kembali ke halaman utama/index
		redirect('c_coa');
	}
}

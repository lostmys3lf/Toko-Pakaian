<?php
class c_pegawai extends CI_controller{
	public $model = NULL;
	
	public function __construct(){
		parent::__construct();
		//memuat model
	$this->load->model('m_pegawai');
	$this->model =$this->m_pegawai;
	
	//memuat librari database
	$this->load->database();
	}
	
	public function index(){
		$data['judul']='Pegawai';
		$this->load->view('templates/header',$data);
	$this->read();
	$this->load->view('templates/footer');
	}
	public function create() {
		$data['judul']='Pegawai';
		$this->load->view('templates/header',$data);
	//belum implementasi
        if (isset($_POST['btnSubmit'])) {
			$this->model->id_pegawai=$_POST['id_pegawai'];
			$this->model->nama_pegawai=$_POST['nama_pegawai'];
			$this->model->jenis_kelamin=$_POST['jenis_kelamin'];
			$this->model->no_telp=$_POST['no_telp'];
			$this->model->alamat=$_POST['alamat'];
			$this->model->create();
			redirect('c_pegawai');
		}else{
			$this->load->view('pegawai/pegawai_create_view',['model'=>$this->model]);
		}
		$this->load->view('templates/footer');
	}
	
	public function read() {
		$rows=$this->model->read();
		$this->load->view('pegawai/pegawai_read_view', ['rows'=>$rows]);
	}
	public function update($id) {
		$data['judul']='Pegawai';
		$this->load->view('templates/header',$data);
		//belum implementasi
		if (isset($_POST['btnSubmit'])) {
			$this->model->id_pegawai=$_POST['id_pegawai'];
			$this->model->nama_pegawai=$_POST['nama_pegawai'];
			$this->model->jenis_kelamin=$_POST['jenis_kelamin'];
			$this->model->no_telp=$_POST['no_telp'];
			$this->model->alamat=$_POST['alamat'];
			$this->model->update();
			redirect('c_pegawai');
		}else{
			$query = $this->db->query("SELECT * FROM pegawai WHERE 
			id_pegawai='$id'");
			//if ($query->num_row() ==0) exit(1);
				$row =$query->row();
				$this->model->id_pegawai=$row->id_pegawai;
				$this->model->nama_pegawai=$row->nama_pegawai;
				$this->model->no_telp=$row->no_telp;
				$this->model->alamat=$row->alamat;
				$this->load->view('pegawai/pegawai_update_view',['model'=>$this->model]);
		}
		$this->load->view('templates/footer');
	}
	public function delete($id) {
		//menentukan kode yang akan di hapus
		$this->model->id_pegawai = $id;
		//menghapus baris data di dalam tabel barang
		$this->model->delete();
		//mengarahkan kembali ke halaman utama/index
		redirect('c_pegawai');
	}
}

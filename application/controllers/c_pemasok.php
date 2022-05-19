<?php
class c_pemasok extends CI_controller{
	public $model = NULL;
	
	public function __construct(){
		parent::__construct();
		//memuat model
	$this->load->model('m_pemasok');
	$this->model =$this->m_pemasok;
	
	//memuat librari database
	$this->load->database();
	}
	
	public function index(){
		$data['judul']='Pemasok';
		$this->load->view('templates/header',$data);
	$this->read();
	$this->load->view('templates/footer');
	}
	public function create() {
		$data['judul']='Pemasok';
		$this->load->view('templates/header',$data);
	//belum implementasi
        if (isset($_POST['btnSubmit'])) {
			$this->model->id_pemasok=$_POST['id_pemasok'];
			$this->model->nama_pemasok=$_POST['nama_pemasok'];
			$this->model->nama_produk=$_POST['nama_produk'];
            $this->model->no_telp_pemasok=$_POST['no_telp_pemasok'];
			$this->model->insert();
			redirect('c_pemasok');
		}else{
			$this->load->view('pemasok/pemasok_create_view',['model'=>$this->model]);
		}
		$this->load->view('templates/footer');
	}
	
	public function read() {
		$rows=$this->model->read();
		$this->load->view('pemasok/pemasok_read_view', ['rows'=>$rows]);
	}
	public function update($id) {
		$data['judul']='Pemasok';
		$this->load->view('templates/header',$data);
		//belum implementasi
		if (isset($_POST['btnSubmit'])) {
			$this->model->id_pemasok=$_POST['id_pemasok'];
			$this->model->nama_pemasok=$_POST['nama_pemasok'];
			$this->model->nama_produk=$_POST['nama_produk'];
            $this->model->no_telp_pemasok=$_POST['no_telp_pemasok'];
			$this->model->update();
			redirect('c_pemasok');
		}else{
			$query = $this->db->query("SELECT * FROM pemasok WHERE 
			id_pemasok='$id'");
			//if ($query->num_row() ==0) exit(1);
				$row =$query->row();
				$this->model->id_pemasok=$row->id_pemasok;
				$this->model->nama_pemasok=$row->nama_pemasok;
				$this->model->nama_produk=$row->nama_produk;
                $this->model->no_telp_pemasok=$row->no_telp_pemasok;
				$this->load->view('pemasok/pemasok_update_view',
				['model'=>$this->model]);
		}
		$this->load->view('templates/footer');
	}
	public function delete($id) {
		//menentukan id_pemasok yang akan di hapus
		$this->model->id_pemasok =$id;
		//menghapus baris data di dalam tabel barang
		$this->model->delete();
		//mengarahkan kembali ke halaman utama/index
		redirect('c_pemasok');
	}
}
?>
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class c_produk extends CI_controller{
	public $model = NULL;
	
	public function __construct(){
		parent::__construct();
		//memuat model
	$this->load->model('m_produk');
	$this->model =$this->m_produk;
	
	//memuat librari database
	$this->load->database();
	}
	
	public function index(){
	$data['judul']='Produk';
	$this->load->view('templates/header',$data);
	$this->read();
	$this->load->view('templates/footer');
	}
	public function create() {
	//belum implementasi
	$data['judul']='Produk';
	$this->load->view('templates/header',$data);
        if (isset($_POST['btnSubmit'])) {
			$this->model->id_produk=$_POST['id_produk'];
			$this->model->nama_produk=$_POST['nama_produk'];
            $this->model->jenis_pakaian=$_POST['jenis_pakaian'];
			$this->model->stock=$_POST['stock'];
			$this->model->harga_satuan=$_POST['harga_satuan'];
			$this->model->insert();
			redirect('c_produk');
		}else{
			$this->load->view('produk/produk_create_view',['model'=>$this->model]);
		}
		$this->load->view('templates/footer');
	}
	
	public function read() {
		$rows=$this->model->read();
		$this->load->view('produk/produk_read_view', ['rows'=>$rows]);
	}
	public function update($id) {
		//belum implementasi
	$data['judul']='Produk';
	$this->load->view('templates/header',$data);
		if (isset($_POST['btnSubmit'])) {
			$this->model->id_produk=$_POST['id_produk'];
			$this->model->nama_produk=$_POST['nama_produk'];
            $this->model->jenis_pakaian=$_POST['jenis_pakaian'];
			$this->model->stock=$_POST['stock'];
			$this->model->harga_satuan=$_POST['harga_satuan'];
			$this->model->update();
			redirect('c_produk');
		}else{
			$query = $this->db->query("SELECT * FROM produk WHERE 
			id_produk='$id'");
			//if ($query->num_row() ==0) exit(1);
				$row =$query->row();
				$this->model->id_produk=$row->id_produk;
				$this->model->nama_produk=$row->nama_produk;
                $this->model->jenis_pakaian=$row->jenis_pakaian;
				$this->model->stock=$row->stock;
				$this->model->harga_satuan=$row->harga_satuan;
				$this->load->view('produk/produk_update_view',
				['model'=>$this->model]);
		}
		$this->load->view('templates/footer');
	}
	public function delete($id) {
		//menentukan id_produk yang akan di hapus
		$this->model->id_produk = $id;
		//menghapus baris data di dalam tabel barang
		$this->model->delete();
		//mengarahkan kembali ke halaman utama/index
		redirect('c_produk');
	}
}

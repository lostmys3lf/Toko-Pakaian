<?php
class c_pelanggan extends CI_controller{
	public $model = NULL;
	
	public function __construct(){
		parent::__construct();
		//memuat model
	$this->load->model('m_pelanggan');
	$this->model =$this->m_pelanggan;
	
	//memuat librari database
	$this->load->database();
	}
	
	public function index(){
	$data['judul']='Pelanggan';
	$this->load->view('templates/header',$data);
	$this->read();
	$this->load->view('templates/footer');
	}
	public function create() {
	//belum implementasi
        if (isset($_POST['submit'])) {
			$this->model->id_pelanggan=$_POST['id_pelanggan'];
			$this->model->nama_pelanggan=$_POST['nama_pelanggan'];
			$this->model->jenis_kelamin=$_POST['jenis_kelamin'];
			$this->model->no_telp_utama=$_POST['no_telp_utama'];
			$this->model->no_telp_cadangan=$_POST['no_telp_cadangan'];
            $this->model->alamat=$_POST['alamat'];
			$this->model->insert();
			redirect('c_pelanggan');
		}else{
			$data['judul']='Pelanggan';
			$this->load->view('templates/header',$data);
			$this->load->view('pelanggan_create_view',['model'=>$this->model]);
			$this->load->view('templates/footer');
		}
	$this->load->view('templates/footer');
	}
	
	public function read() {
		$rows=$this->model->read();
		$this->load->view('pelanggan_read_view', ['rows'=>$rows]);
	}
	public function update($id) {
		//belum implementasi
	$data['judul']='Pelanggan';
	$this->load->view('templates/header',$data);
		if (isset($_POST['submit'])) {
			$this->model->id_pelanggan=$_POST['id_pelanggan'];
			$this->model->nama_pelanggan=$_POST['nama_pelanggan'];
			$this->model->jenis_kelamin=$_POST['jenis_kelamin'];
			$this->model->no_telp_utama=$_POST['no_telp_utama'];
			$this->model->no_telp_cadangan=$_POST['no_telp_cadangan'];
            $this->model->alamat=$_POST['alamat'];
			$this->model->update();
			redirect('c_pelanggan');
		}else{
			$query = $this->db->query("SELECT * FROM pelanggan WHERE 
			id_pelanggan='$id'");
			//if ($query->num_row() ==0) exit(1);
            $row =$query->row();
            $this->model->id_pelanggan=$row->id_pelanggan;
            $this->model->nama_pelanggan=$row->nama_pelanggan;
			$this->model->jenis_kelamin=$row->jenis_kelamin;
            $this->model->no_telp_utama=$row->no_telp_utama;
            $this->model->no_telp_cadangan=$row->no_telp_cadangan;
            $this->model->alamat=$row->alamat;
            $this->load->view('pelanggan_update_view',
            ['model'=>$this->model]);
    }
	$this->load->view('templates/footer');
}
    public function delete($id) {
        //menentukan kode yang akan di hapus
        $this->model->id_pelanggan = $id;
        //menghapus baris data di dalam tabel barang
        $this->model->delete();
        //mengarahkan kembali ke halaman utama/index
        redirect('c_pelanggan');
    }
}

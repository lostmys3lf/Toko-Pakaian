<?php
class m_pegawai extends CI_model{
	public $id_pegawai;
	public $nama_pegawai;
	public $jenis_kelamin;
	public $no_telp;
	public $alamat;
	
	//array untuk menyimpan label dari masing-masing atribut
	public $labels=[];
	
	//konstuktor model
	public function __construct(){
		parent::__construct();
		$this->labels = $this->_attributelabels();
		
		//memuat librari database
		$this->load->database();	
	}
	//untuk menambah baris data dalam tabel
	public function create(){
		$sql=sprintf("INSERT INTO pegawai VALUES('%s','%s','%s','%s', '%s')",
		$this->id_pegawai,
		$this->nama_pegawai,
		$this->jenis_kelamin,
		$this->no_telp,
		$this->alamat
		);
		$this->db->query($sql);
	}
	public function update(){
		$sql=sprintf("UPDATE pegawai SET nama_pegawai ='%s',jenis_kelamin ='%s' ,no_telp= '%s', alamat= '%s' WHERE id_pegawai='%s'",
		$this->nama_pegawai,
		$this->jenis_kelamin,
		$this->no_telp,
		$this->alamat,
        $this->id_pegawai
		);
		$this->db->query($sql);
	}
	public function delete(){
		$sql=sprintf("DELETE FROM pegawai WHERE id_pegawai='%s'",$this->id_pegawai);
		$this->db->query($sql);
	}
	public function read(){
		$sql="SELECT * FROM pegawai ORDER BY id_pegawai";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	//metode untuk menentukan label dari masing-masing atribut 
	
	public function _attributelabels(){
		return [
		'id_pegawai'=>'ID Pegawai:',
		'nama_pegawai'=>'Nama Pegawai:',
		'jenis_kelamin'=>'Jenis Kelamin :',
		'no_telp'=>'No Telp:',
		'alamat'=>'Alamat:'
		];
		
	}
	
}

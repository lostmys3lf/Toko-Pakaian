<?php
class m_pelanggan extends CI_Model{
    public $id_pelanggan;
    public $nama_pelanggan;
    public $jenis_kelamin;
    public $no_telp_utama;
    public $no_telp_cadangan;
    public $alamat;   

    public $labels=[];

    public function __construct(){
        parent::__construct();
        $this->labels=$this->_attributelabels();
    }
    public function insert(){
        $sql=sprintf("INSERT INTO pelanggan VALUES ('%s','%s','%s','%s','%s','%s')",
        $this->id_pelanggan,
        $this->nama_pelanggan,
        $this->jenis_kelamin,
        $this->no_telp_utama,
        $this->no_telp_cadangan,
        $this->alamat,
    );
    $this->db->query($sql);
    }
    public function update(){
        $sql=sprintf ("UPDATE pelanggan SET nama_pelanggan='%s', jenis_kelamin='%s', no_telp_utama='%s', no_telp_cadangan='%s', alamat='%s' WHERE id_pelanggan='%s'",
        $this->nama_pelanggan,
        $this->jenis_kelamin,
        $this->no_telp_utama,
        $this->no_telp_cadangan,
        $this->alamat,
        $this->id_pelanggan
    );
    $this->db->query($sql);
    }
    public function delete(){
        $sql=sprintf("DELETE FROM pelanggan WHERE id_pelanggan='%s'", $this->id_pelanggan);
        $this->db->query($sql);
    }
    public function read(){
        $sql="SELECT*FROM pelanggan ORDER BY id_pelanggan";
        $query=$this->db->query($sql);
        return $query->result();
    }
    public function _attributelabels(){
        return[
            'id_pelanggan'=>'Id Pelanggan :',
            'nama_pelanggan'=>'Nama Pelanggan :',
            'jenis_kelamin'=>'Jenis Kelamin :',
            'no_telp_utama'=>'No.telp Utama:',
            'no_telp_cadangan'=>'No.telp Cadangan :',
            'alamat'=>'Alamat :',
            
        ];
    }
    
        
    
}
<?php 
    class m_produk extends CI_Model {
        public $id_produk;
        public $nama_produk;
        public $jenis_pakaian;
        public $stock;
        public $harga_satuan;
       
        
        public $labels=[];

        public function __construct(){
            parent::__construct();
            $this->labels = $this->attributelabels();

            $this->load->database();
        }
        public function insert(){
            $sql=sprintf("INSERT INTO produk VALUES('%s','%s','%s',%d,%d)",
            $this->id_produk,
            $this->nama_produk,
            $this->jenis_pakaian,
            $this->stock,
            $this->harga_satuan,
           
        
            );
            $this->db->query($sql);
        }
        public function update(){
            $sql=sprintf("UPDATE produk SET nama_produk ='%s',jenis_pakaian ='%s' ,stock= %d, harga_satuan= %d WHERE id_produk='%s'",
		        $this->nama_produk,
		        $this->jenis_pakaian,
		        $this->stock,
		        $this->harga_satuan,
                $this->id_produk
		);
		$this->db->query($sql);
        }
        public function delete(){
            $sql=sprintf("DELETE FROM produk WHERE id_produk='%s'",$this->id_produk);
            $this->db->query($sql);
        }
        public function read(){
            $sql="SELECT * FROM produk ORDER BY id_produk";
            $query=$this->db->query($sql);
            return $query->result();
        }
        public function attributelabels(){
            return[
        'id_produk'=>'Id_Produk:',
        'nama_produk'=>'Nama produk:',
        'jenis_pakaian'=>'Jenis Pakaian',
        'stock'=>'Stock:',
        'harga_satuan'=>'Harga_satuan:',
        
            ];
        }  
    }
?>


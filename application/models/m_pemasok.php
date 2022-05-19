<?php 
    class m_pemasok extends CI_Model {
        public $id_pemasok;
        public $nama_pemasok;
        public $nama_produk;
        public $no_telp_pemasok;
        
        public $labels=[];

        public function __construct(){
            parent::__construct();
            $this->labels = $this->attributelabels();

            $this->load->database();
        }
        public function insert(){
            $sql=sprintf("INSERT INTO pemasok VALUES('%s','%s','%s','%s')",
            $this->id_pemasok,
            $this->nama_pemasok,
            $this->nama_produk,
            $this->no_telp_pemasok
            );
            $this->db->query($sql);
        }
        public function update(){
            $sql=sprintf("UPDATE pemasok 
            SET nama_pemasok='%s', nama_produk='%s',no_telp_pemasok='%s'
            WHERE id_pemasok='%s'",
               $this->nama_pemasok,
               $this->nama_produk,
               $this->no_telp_pemasok,
               $this->id_pemasok
            );
            $this->db->query($sql);
        }
        public function delete(){
            $sql=sprintf("DELETE FROM pemasok WHERE id_pemasok='%s'",$this->id_pemasok);
            $this->db->query($sql);
        }
        public function read(){
            $sql="SELECT * FROM pemasok ORDER BY id_pemasok";
            $query=$this->db->query($sql);
            return $query->result();
        }
        public function attributelabels(){
            return[
        'id_pemasok'=>'Id Pemasok:',
        'nama_pemasok'=>'Nama Pemasok:',
        'nama_produk'=>'Nama Produk:',
        'no_telp_pemasok'=>'No Telp Pemasok',
            ];
        }
       
       
    }

 
?>


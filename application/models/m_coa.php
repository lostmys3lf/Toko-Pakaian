<?php 
    class m_coa extends CI_Model {
        public $no_akun;
        public $header_akun;
        public $nama_akun;
        public $saldo_awal;
        
        public $labels=[];

        public function __construct(){
            parent::__construct();
            $this->labels = $this->attributelabels();

            $this->load->database();
        }
        public function insert(){
            $sql=sprintf("INSERT INTO coa VALUES('%s','%s','%s',%d)",
            $this->no_akun,
            $this->header_akun,
            $this->nama_akun,
            $this->saldo_awal,
        
            );
            $this->db->query($sql);
        }
        public function update(){
            $sql=sprintf("UPDATE coa 
            SET header_akun='%s',nama_akun='%s', saldo_awal=%d
            WHERE no_akun='%s'",
               $this->header_akun,
               $this->nama_akun,
               $this->saldo_awal,
               $this->no_akun,
            );
            $this->db->query($sql);
        }
        public function delete(){
            $sql=sprintf("DELETE FROM coa WHERE no_akun='%s'",$this->no_akun);
            $this->db->query($sql);
        }
        public function read(){
            $sql="SELECT * FROM coa ORDER BY no_akun";
            $query=$this->db->query($sql);
            return $query->result();
        }
        public function attributelabels(){
            return[
        'no_akun'=>'No Akun :',
        'header_akun'=>'Header Akun :',
        'nama_akun'=>'Nama Akun :',
        'saldo_awal'=>'Saldo Awal :',
        
            ];
        }
       
       
    }

 
?>


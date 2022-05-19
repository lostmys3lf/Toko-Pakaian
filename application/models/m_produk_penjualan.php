<?php 
    class m_produk_penjualan extends CI_Model{
        public function index(){
            return $this->db->get("produk")->result_array();
        }
        public function create(){
            return $this->db->get('produk')->result_array();
        }
    }


?>

    
    
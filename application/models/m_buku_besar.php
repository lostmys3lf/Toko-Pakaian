<?php 
 
class m_buku_besar extends CI_Model{
    
public function Akun(){
	return $this->db->get('coa')->result_array();
}

public function SaldoAkun($no_akun){
	$this->db->where('no_akun', $no_akun);
	return $this->db->get('coa')->row_array();
}
public function BukuBesar($no_akun){
	$this->db->where('a.no_akun', $no_akun);
	$this->db->select('a.no_akun, tgl_jurnal, nama_akun, a.posisi_db_cr, nominal');
	$this->db->from('jurnal a');
	$this->db->join('coa b', 'b.no_akun = a.no_akun');
	$this->db->order_by('a.tgl_jurnal','ASC');
	$query = $this->db->get();	
	return $query->result_array();
}
}
  
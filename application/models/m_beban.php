<?php 
 
class m_beban extends CI_Model{
  
  public function tampil_data(){
    $this->db->select('beban.id_beban,beban.nama_transaksi,pegawai.id_pegawai, pegawai.nama_pegawai, transaksi.id_transaksi, beban.total_beban');
		$this->db->from('pegawai');
		$this->db->join('transaksi', 'transaksi.id_pegawai=pegawai.id_pegawai');
		$this->db->join('beban', 'beban.id_transaksi=transaksi.id_transaksi');
		$query = $this->db->get();
    return $query->result();    
    
	}
	/*public function tampil_jurnal(){
		return $this->db->query('SELECT tgl_jurnal,nama_akun,jurnal.no_akun as ref, posisi_db_cr, nominal 
	FROM `jurnal` join coa ON jurnal.no_akun=coa.no_akun ORDER BY jurnal.id_transaksi, jurnal.no_akun
	')->result_array();
}*/
}
  
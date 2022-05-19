<?php
class m_jurnal extends CI_Model{
    
    public function jurnal_umum(){
		if(isset($_POST['tgl_awal'], $_POST['tgl_akhir'])){
			$this->db->where('tgl_jurnal >=', $_POST['tgl_awal']);
			$this->db->where('tgl_jurnal <=', $_POST['tgl_akhir']);
		}
		$this->db->select('a.no_akun, tgl_jurnal, nama_akun, a.posisi_db_cr, nominal');
		$this->db->from('jurnal a');
		$this->db->join('coa b', 'b.no_akun = a.no_akun');
		$this->db->order_by('tgl_jurnal','ASC');
		$this->db->order_by('id_transaksi');
		$this->db->order_by('no_akun');
		$query = $this->db->get();	
		return $query->result_array();
	}

}
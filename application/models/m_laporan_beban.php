<?php
class m_laporan_beban extends CI_Model{
    public function laporan(){
        if(isset($_POST['tgl_awal'], $_POST['tgl_akhir'])){
			$this->db->where('tgl_jurnal >=', $_POST['tgl_awal']);
			$this->db->where('tgl_jurnal <=', $_POST['tgl_akhir']);
		}
        $this->db->select('a.tgl_jurnal, b.nama_akun, b.no_akun, a.nominal');
		$this->db->from('jurnal a');
		$this->db->join('coa b', 'b.no_akun = a.no_akun');
		$this->db->order_by('tgl_jurnal','ASC');
        $this->db->where('b.no_akun=6101');
		$query = $this->db->get();	
		return $query->result_array();
        /*return $this->db->query('SELECT tgl_jurnal,nama_akun, nominal
		FROM jurnal join coa ON jurnal.no_akun=coa.no_akun WHERE coa.no_akun="6101"
		')->result_array();*/
    }
}
<?php
class m_neraca_saldo extends CI_Model{
    /*public function GetDataAkun(){
        return $this->db->get('coa')->result_array();
    }
    public function GetSaldoAkun($no_akun){
        //mengambil data saldo akun
        $this->db->where('no_akun', $no_akun);
        return $this->db->get('coa')->row_array();
    }*/
    public function neraca_saldo(){
        return $this->db->query('SELECT jurnal.no_akun, coa.header_akun, coa.nama_akun, jurnal.posisi_db_cr, jurnal.nominal,
        sum(if(jurnal.posisi_db_cr LIKE"%Debit%", jurnal.nominal,0)) as debit, 
        sum(if(jurnal.posisi_db_cr LIKE"%Kredit%", jurnal.nominal,0)) as kredit
        FROM `jurnal` join coa ON jurnal.no_akun=coa.no_akun   GROUP BY jurnal.no_akun ORDER BY jurnal.id_transaksi, jurnal.no_akun
        ')->result_array();
        
    }
}
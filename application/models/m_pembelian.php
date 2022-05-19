<?php
class m_pembelian extends CI_Model
{
    
    public $labels=[];

    public function __construct(){
        parent::__construct();
        $this->labels = $this->_attributelabels();
        
        $this->load->database();    
    }

        function tampil_data_pembelian()
    {
        $query= "SELECT *FROM pembelian";
        return $this->db->query($query);
    }

    function tampil_data_pemasok()
    {
        $query= "SELECT *FROM pemasok";
        return $this->db->query($query);
    }

    function post($data)
    {
        $this->db->insert('pembelian',$data);
    }
    
    function get_one($id)
    {
        $param  =   array('id_pembelian'=>$id);
        return $this->db->get_where('pembelian',$param);
    }

    public function jurnal(){
        return $this->db->query('SELECT tgl_jurnal,jurnal.no_akun as ref, nama_akun_pembelian, posisi_db_cr, 
        nominal FROM `jurnal` join coa ON jurnal.no_akun=coa.no_akun ORDER BY jurnal.id_transaksi, jurnal.no_akun
        ')->result_array();
    }
        function simpan_pembelian()
    {
        $id_pembelian=$this->db->query("SELECT id_pemasok FROM `pemasok` where nama_pemasok='no_telp_pemasok'")->result_array();

        $sql=sprintf("INSERT INTO pembelian VALUES ('%s','%d','%s','%d','%d','%d')",
        $this->id_transaksi,
        $this->id_pembelian,
        $this->tgl,
        $this->ppn,
        $this->total_pembelian,
        $this->id_termin
        );
        $this->db->query($sql);

        $debit = [
            'id_transaksi' => $this->input->post('id_transaksi'),
            'no_akun' => '5101',
            'nama_akun_pembelian'  => 'Pembelian',
            'tgl_jurnal' => $this->input->post('tgl'),
            'posisi_db_cr' => 'debit',
            'nominal'=> $this->total_pembelian
        ];
        $kredit = [
            'id_transaksi' => $this->input->post('id_transaksi'),
            'no_akun' => '1101',
            'nama_akun_pembelian'  => 'Kas',
            'tgl_jurnal' => $this->input->post('tgl'),
            'posisi_db_cr' => 'kredit',
            'nominal'=> $this->total_pembelian
          ];
        $this->db->trans_start();
        $this->db->insert('jurnal', $debit);
        $this->db->insert('jurnal', $kredit);
        $this->db->trans_complete();
        redirect('c_Pembelian');
    }
    
    public function _attributelabels(){
        return [
        'id_transaksi'=>'id_transaksi:',
        'id_pembelian'=>'id_pembelian:',
        'tgl'=>'tgl:',
        'ppn'=>'ppn:',
        'total_pembelian'=>'total_pembelian:',
        'id_termin'=>'id_termin:',
        ];
        
    }
    
}
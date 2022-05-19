<?php
class m_retur_pembelian extends CI_Model
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

        function tampil_data_retur_pembelian()
    {
        $query= "SELECT *FROM retur_pembelian";
        return $this->db->query($query);
    }

    function post($data)
    {
        $this->db->insert('retur_pembelian',$data);
    }
    
    function get_one($id)
    {
        $param  =   array('id_retur_pemb'=>$id);
        return $this->db->get_where('retur_pembelian',$param);
    }

    function jurnal(){
        return $this->db->query("SELECT tgl_jurnal,jurnal.no_akun as ref, posisi_db_cr, 
        nominal FROM `jurnal` join coa ON jurnal.no_akun=coa.no_akun ORDER BY jurnal.id_transaksi, jurnal.no_akun")->result_array();
    }
    
    function simpan_retur_pembelian()
        {
        $sql1=sprintf("INSERT INTO retur_pembelian VALUES('%d','%d','%s','%s','%d','%d','%d')",
            $this->id_retur_pemb,
            $this->id_pembelian,
            $this->tgl,
            $this->alasan_retur,
            $this->jumlah,
            $this->total_retur_pemb,
            $this->ppn
        
            );
        $sql2=sprintf("INSERT INTO detail_retur_pemb VALUES('%d','%d')",
            $this->id_pembelian,
            $this->id_retur_pemb
        
            );
            $this->db->query($sql1);
            $this->db->query($sql2);

        $debit = [
            'id_transaksi' => $this->input->post('id_retur_pemb'),
            'no_akun' => '1101',
            'tgl_jurnal' => $this->input->post('tgl'),
            'posisi_db_cr' => 'debit',
            'nominal'=> $this->total_retur_pemb
            ];
        $kredit = [
            'id_transaksi' => $this->input->post('id_retur_pemb'),
            'no_akun' => '5103',
            'tgl_jurnal' => $this->input->post('tgl'),
            'posisi_db_cr' => 'kredit',
            'nominal'=> $this->total_retur_pemb
            ];
        $this->db->trans_start();
        $this->db->insert('jurnal', $debit);
        $this->db->insert('jurnal', $kredit);
        $this->db->trans_complete();
        redirect('c_retur_pembelian');
    
        }
    
    function _attributelabels(){
        return [
        'id_retur_pemb'=>'id_retur_pemb:',
        'id_pembelian'=>'id_pembelian:',
        'tgl'=>'tgl:',
        'alasan_retur'=>'alasan_retur:',
        'jumlah'=>'jumlah:',
        'total_retur_pemb'=>'total_retur_pemb:',
        'ppn'=>'ppn:',
        ];
        
    }
}    
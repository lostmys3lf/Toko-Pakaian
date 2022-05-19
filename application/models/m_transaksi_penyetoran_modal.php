<?php 
class m_transaksi_penyetoran_modal extends CI_Model{

    // function selesai_transaksi()
    // {
    //     $id_transaksi=$this->input->post('id_transaksi');
    //     $no_transaksi=$this->input->post('no_transaksi');
    //     $id_pegawai=$this->input->post('id_pegawai');
    //     $tanggal_transaksi=$this->input->post('tanggal_transaksi');
    //     $nominal=$this->input->post('nominal');
    //     $status_transaksi=$this->input->post('status_transaksi');
    //     // $idbarang       = $this->db->get_where('barang',array('nama_barang'=>$nama_barang))->row_array();
    //     $data           = array('id_transaksi'=>$id_transaksi,
    //                             'no_transaksi'=>$no_transaksi,
    //                             'id_pegawai'=>$id_pegawai,
    //                             'tanggal_transaksi'=>$tanggal_transaksi,
    //                             'nominal'=>$nominal,
    //                             'status_transaksi'=>$status_transaksi,

    //                             );
    //     $this->db->insert('transaksi',$data);
    // }

    public function index(){
        return $this->db->query('SELECT tanggal_transaksi,nama_transaksi,total_transaksi_modal as nominal 
        FROM penyetoran_modal 
        JOIN transaksi ON penyetoran_modal.id_transaksi=transaksi.id_transaksi')->result_array();
    }

    public function jurnal(){
        return $this->db->query('SELECT tgl_jurnal,nama_akun,jurnal.no_akun as ref, posisi_db_cr, nominal 
        FROM `jurnal` join coa ON jurnal.no_akun=coa.no_akun ORDER BY jurnal.id_transaksi, jurnal.no_akun
        ')->result_array();
    }

    public function create(){
        return $this->db->get('transaksi')->result_array();
    }

    public function insert($data){
        $this->db->insert('transaksi',$data);

        $id_transaksi=$this->db->query("SELECT id_transaksi as id_transaksi FROM `transaksi` where id_transaksi='".$data['id_transaksi'] ."'")->result_array();

        $id_transaksi=$id_transaksi[0]['id_transaksi'];
        $status_transaksi=$this->input->post('status_transaksi');
        $nominal=$this->input->post('nominal');
        $penyetoran_modal=[
            'id_transaksi'=>$id_transaksi,
            'nama_transaksi'=>$status_transaksi,
            'total_transaksi_modal'=>$nominal,
        ];
        $this->db->insert('penyetoran_modal', $penyetoran_modal);

        $jurnal_debit=[
            'id_transaksi'=>$id_transaksi,
            'no_akun'=>1101,
            'tgl_jurnal'=>$data['tanggal_transaksi'],
            'posisi_db_cr'=>"Debit",
            'nominal'=>$data['nominal']
        ];
        $this->db->insert('jurnal',$jurnal_debit);

        $jurnal_kredit=[
            'id_transaksi'=>$id_transaksi,
            'no_akun'=>3101,
            'tgl_jurnal'=>$data['tanggal_transaksi'],
            'posisi_db_cr'=>"Kredit",
            'nominal'=>$data['nominal']
        ];
        $this->db->insert('jurnal',$jurnal_kredit);

       
    }
    function laporan_periode($tanggal1,$tanggal2)
    {
        $query="SELECT * FROM transaksi 
        WHERE tanggal_transaksi between '$tanggal1' and '$tanggal2' 
        group by id_transaksi";
        return $this->db->query($query);
    }

    function laporan_default()
    {
        $query="SELECT * FROM penyetoran_modal join transaksi on penyetoran_modal.id_transaksi=transaksi.id_transaksi
        group by id_modal";
        return $this->db->query($query);
    }
}

?>
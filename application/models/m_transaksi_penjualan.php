<?php
class m_transaksi_penjualan extends CI_Model
{
    public function ind()
    {
        return $this->db->get("pelanggan")->result_array();
    }

    public function index()
    {
        return $this->db->query('SELECT tanggal_transaksi,status_transaksi,PPN,total_penjualan 
            FROM penjualan JOIN transaksi ON penjualan.id_transaksi=transaksi.id_transaksi')->result_array();
    }

    public function jurnal()
    {
        return $this->db->query('SELECT tgl_jurnal,nama_akun,jurnal.no_akun as ref, posisi_db_cr, nominal 
            FROM `jurnal` join coa ON jurnal.no_akun=coa.no_akun order by tgl_jurnal,id_transaksi,jurnal.no_akun
            ')->result_array();
    }

    public function create()
    {
        return $this->db->get('transaksi')->result_array();
    }

    public function laporan_default()
    {
        $query = "SELECT tanggal_transaksi,nama_pelanggan,nama_produk,quantity,total_penjualan FROM transaksi 
            JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan 
            JOIN penjualan ON transaksi.id_transaksi=penjualan.id_transaksi 
            join detail_jual ON penjualan.id_penjualan=detail_jual.id_penjualan 
            JOIN produk ON detail_jual.id_produk=produk.id_produk 
            WHERE status_transaksi='Penjualan' GROUP BY transaksi.id_transaksi ORDER BY tanggal_transaksi";
        return $this->db->query($query);
    }

    public function laporan_periode($tanggal1, $tanggal2)
    {
        $query = "SELECT t.tanggal_transaksi,p.nama_pelanggan,pr.nama_produk,quantity,total_penjualan 
        FROM transaksi as t,penjualan as td,pelanggan as p,produk as pr, detail_jual as dj 
        WHERE td.id_transaksi=t.id_transaksi and p.id_pelanggan=t.id_pelanggan and dj.id_penjualan=td.id_penjualan and pr.id_produk=dj.id_produk 
        and t.tanggal_transaksi between '$tanggal1' and '$tanggal2' group by t.id_transaksi ORDER BY t.tanggal_transaksi";
        return $this->db->query($query);
    }

    public function insert($data, $total, $PPN, $id_produk)
    {
        $this->db->insert('transaksi', $data);

        $id_transaksi = $this->db->query("SELECT id_transaksi as id_transaksi FROM `transaksi` 
            where id_transaksi='" . $data['id_transaksi'] . "'")->result_array();

        $id_transaksi = $id_transaksi[0]['id_transaksi'];
        $id_penjualan = $this->db->query('SELECT max(id_penjualan) as id_penjualan FROM penjualan')->result_array();
        $id_penjualan = $id_penjualan[0]['id_penjualan'];

        $penjualan = [
            'id_transaksi' => $id_transaksi,
            // 'nama_transaksi'=>$status_transaksi,
            'id_penjualan' => $id_penjualan + 1,
            'total_penjualan' => $total,
            // 'id_pegawai'=>$id_pegawai,
            'PPN' => $PPN,

        ];
        $this->db->insert('penjualan', $penjualan);

        $detail_jual = [
            // 'nama_transaksi'=>$status_transaksi,
            // 'total_transaksi_modal'=>$nominal,
            'id_penjualan' => $id_penjualan + 1,
            'id_produk' => $id_produk,
            'tipe_pembayaran' => 'lunas',
        ];
        $this->db->insert('detail_jual', $detail_jual);

        $jurnal_debit = [
            'id_transaksi' => $id_transaksi,
            'no_akun' => 1101,
            'tgl_jurnal' => $data['tanggal_transaksi'],
            'posisi_db_cr' => "Debit",
            'nominal' => $total,
        ];
        $this->db->insert('jurnal', $jurnal_debit);

        $jurnal_kredit = [
            'id_transaksi' => $id_transaksi,
            'no_akun' => 4101,
            'tgl_jurnal' => $data['tanggal_transaksi'],
            'posisi_db_cr' => "Kredit",
            'nominal' => $data['nominal'] * $data['quantity'],
        ];
        $this->db->insert('jurnal', $jurnal_kredit);


        $jurnal_kredit_ppn = [
            'id_transaksi' => $id_transaksi,
            'no_akun' => 2201,
            'tgl_jurnal' => $data['tanggal_transaksi'],
            'posisi_db_cr' => "Kredit",
            'nominal' => $PPN
        ];
        $this->db->insert('jurnal', $jurnal_kredit_ppn);
    }
}

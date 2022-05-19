<?php 
    class c_penjualan extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->model('m_transaksi_penjualan');
            $this->load->model('m_produk_penjualan');
           
        }

    public function index(){
        $data['judul']='Transaksi Penjualan';
        $this->load->view('templates/header',$data);
        $data=[
            'data'=>$this->m_transaksi_penjualan->index()
        ];
        return $this->load->view('penjualan/read_penjualan',$data);
        $this->load->view('templates/footer');
    }

    public function create(){
        $data['judul']='Transaksi Penjualan';
        $this->load->view('templates/header',$data);
        $transaksi=$this->m_transaksi_penjualan->create();
        $produk=$this->m_produk_penjualan->create();
        $data=[
            'transaksi'=>$transaksi,
            'produk'=>$produk,
        ];
        return $this->load->view('penjualan/form_create_penjualan',$data);
        $this->load->view('templates/footer');
    }
    
   
    function selesai_transaksi()
    {
        $data['judul']='Transaksi Penjualan';
        $this->load->view('templates/header',$data);
        $subtotal=$this->input->post("quantity")*$this->input->post("nominal");
        $PPN=$subtotal*0.1;
        $total=$subtotal+$PPN;
        $data=[
                'id_transaksi'=>$this->input->post('id_transaksi'),
                'no_transaksi'=>$this->input->post('no_transaksi'),
                'id_pegawai'=>$this->input->post('id_pegawai'),
                'id_pelanggan'=>$this->input->post('id_pelanggan'),
                'tanggal_transaksi'=>$this->input->post('tanggal_transaksi'),
                'nominal'=>$this->input->post('nominal'),
                'quantity'=>$this->input->post('quantity'),
                // 'total_penjualan'=>$total,
                // 'ppn'=>$PPN,
                'status_transaksi'=>$this->input->post('status_transaksi'),
        ];
       $this->m_transaksi_penjualan->insert($data,$total,$PPN,$this->input->post("id_produk"));
       redirect('c_penjualan/');
       $this->load->view('templates/footer');
    }
    public function jurnal(){
        $data['judul']='Transaksi Penjualan';
        $this->load->view('templates/header',$data);
        $data=[
            'data'=>$this->m_transaksi_penjualan->jurnal(),
        ];
        return $this->load->view('penjualan/jurnal_transaksi_penjualan',$data);
        $this->load->view('templates/footer');
    }
    public function laporan_penjualan(){
        $data['judul']='Laporan Penjualan';
        $this->load->view('templates/header',$data);
        if(isset($_POST['submit']))
        {
			$tanggal1 = $this->input->post('tanggal1');
			$tanggal2 = $this->input->post('tanggal2');
            $data['record']= $this->m_transaksi_penjualan->laporan_periode($tanggal1,$tanggal2);
			$this->load->view('laporan/laporan_penjualan_view',$data);
        }
        else
       {
			$data['record']= $this->m_transaksi_penjualan->laporan_default();
			$this->load->view('laporan/laporan_penjualan_view',$data);
        }
        $this->load->view('templates/footer');
    }   
    }

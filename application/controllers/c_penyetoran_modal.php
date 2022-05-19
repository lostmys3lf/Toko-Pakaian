<?php 
    class c_penyetoran_modal extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->model('m_transaksi_penyetoran_modal');
        
        }
        

    public function index(){
        $data['judul']='Transaksi Penyetoran Modal';
        $this->load->view('templates/header',$data);
        $data=[
            'data'=>$this->m_transaksi_penyetoran_modal->index()
        ];
        return $this->load->view('modal/read_transaksi_modal',$data);
        $this->load->view('templates/footer');
    }

    public function create(){
        $data['judul']='Transaksi Penyetoran Modal';
        $this->load->view('templates/header',$data);
        $transaksi=$this->m_transaksi_penyetoran_modal->create();
        $data=[
            'transaksi'=>$transaksi,
        ];
        return $this->load->view('modal/form_transaksi_modal',$data);
        $this->load->view('templates/footer');
    }
    
   
    function selesai_transaksi()
    {
        $data['judul']='Transaksi Penyetoran Modal';
        $this->load->view('templates/header',$data);
        $data=[
                'id_transaksi'=>$this->input->post('id_transaksi'),
                'no_transaksi'=>$this->input->post('no_transaksi'),
                'id_pegawai'=>$this->input->post('id_pegawai'),
                'tanggal_transaksi'=>$this->input->post('tanggal_transaksi'),
                'nominal'=>$this->input->post('nominal'),
                'status_transaksi'=>$this->input->post('status_transaksi'),
        ];
       $this->m_transaksi_penyetoran_modal->insert($data);
       redirect('c_penyetoran_modal');
       $this->load->view('templates/footer');
    }
    public function jurnal(){
        $data['judul']='Transaksi Penyetoran Modal';
        $this->load->view('templates/header',$data);
        $data=[
            'data'=>$this->m_transaksi_penyetoran_modal->jurnal(),
        ];
        return $this->load->view('modal/jurnal_transaksi_modal',$data);
        $this->load->view('templates/footer');
    }
    public function laporan()
    {
        $data['judul']='Transaksi Penyetoran Modal';
        $this->load->view('templates/header',$data);
        if(isset($_POST['submit']))
        {
            $tanggal1 = $this->input->post('tanggal1');
            $tanggal2 = $this->input->post('tanggal2');
            $data['record']=$this->m_transaksi_penyetoran_modal->laporan_periode($tanggal1,$tanggal2);
            $this->load->view('laporan/laporan_transaksi_modal',$data);
        }
        else 
        {
        $data['record']= $this->m_transaksi_penyetoran_modal->laporan_default();
        $this->load->view('laporan/laporan_transaksi_modal',$data);
        }
    }
    }
?>
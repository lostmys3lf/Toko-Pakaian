<?php 
 
class c_beban extends CI_Controller{
 
	public function __construct(){
		parent::__construct();		
		$this->load->model('m_beban');
                $this->load->helper(array('url'));
	}
	public function index(){
        $data['judul']='Transaksi Beban';
        $this->load->view('templates/header',$data);
		$data['beban'] = $this->m_beban->tampil_data();
		$this->load->view('beban/beban_read_view',$data);
        $this->load->view('templates/footer');
		}
  
	public function tambah(){
        $data['judul']='Transaksi Beban';
	    $this->load->view('templates/header',$data);
			$this->load->view('beban/beban_create_view');
            $this->load->view('templates/footer');
	}
	/*public function jurnal(){
		$data['judul']='Transaksi Beban';
	    $this->load->view('templates/header',$data);
			$data['jurnal'] = $this->m_beban->tampil_jurnal();
			$this->load->view('beban/beban_jurnal', $data);
	}*/
	public function insert(){
        $data['judul']='Transaksi Beban';
	    $this->load->view('templates/header',$data);
        $id_transaksi = $this->input->post('id_transaksi');
		$no_transaksi = $this->input->post('no_transaksi');
        $tanggal_transaksi = $this->input->post('tanggal_transaksi');
        $total_beban = $this->input->post('total_beban');
		$id_pegawai = $this->input->post('id_pegawai');
        $status_transaksi = $this->input->post('status_transaksi');
 
		$data = array(
			'id_transaksi' => $id_transaksi,
			'no_transaksi' => $no_transaksi,
            'tanggal_transaksi' => $tanggal_transaksi,
            'nominal' => $total_beban,
			'id_pegawai' => $id_pegawai,
            'status_transaksi' => $status_transaksi,
			);
            $this->db->insert('transaksi', $data);
        
		$id_transaksi = $this->input->post('id_transaksi');
		$nama_transaksi = $this->input->post('nama_transaksi');
		$total_beban = $this->input->post('total_beban');
 
		$data = array(
			'id_transaksi' => $id_transaksi,
			'nama_transaksi' => $nama_transaksi,
			'total_beban' => $total_beban,
			);
            $this->db->insert('beban', $data);

			$id_transaksi = $this->input->post('id_transaksi');
			$tanggal_transaksi = $this->input->post('tanggal_transaksi');
			$total_beban = $this->input->post('total_beban');
	
			$jurnal_debit=[
					'id_transaksi'=>$id_transaksi,
					'no_akun'=>6101,
					'tgl_jurnal'=>$tanggal_transaksi,
					'posisi_db_cr'=>"Debit",
					'nominal'=>$total_beban
				];
				$this->db->insert('jurnal',$jurnal_debit);
			
				$id_transaksi = $this->input->post('id_transaksi');
				$tanggal_transaksi = $this->input->post('tanggal_transaksi');
				$total_beban = $this->input->post('total_beban');
	
			$jurnal_kredit=[
					'id_transaksi'=>$id_transaksi,
					'no_akun'=>1101,
					'tgl_jurnal'=>$tanggal_transaksi,
					'posisi_db_cr'=>"Kredit",
					'nominal'=>$total_beban
				];
				$this->db->insert('jurnal',$jurnal_kredit);
            redirect('c_beban/index');
            $this->load->view('templates/footer');
        }
  
	 
    }

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->model('m_home');		
	}

	public function index()
	{
		$data["menu"] = "home"; 
		$data['berita_list'] = $this->m_home->get_berita();
		$this->load->view('home/_partial/header', $data);
		$this->load->view('home/overview', $data);
	}
	public function berita()
	{
		$data["menu"] = "berita";

		//konfigurasi pagination
	    $config['base_url'] = site_url('home/berita'); //site url
	    $config['total_rows'] = $this->db->count_all('prci_post'); //total row
	    $config['per_page'] = 12;  //show record per halaman
	    $config["uri_segment"] = 4;  // uri parameter
	    $choice = $config["total_rows"] / $config["per_page"];
	    $config["num_links"] = floor($choice);

	    // Membuat Style pagination untuk BootStrap v4
	    $config['first_link']       = 'First';
	    $config['last_link']        = 'Last';
	    $config['next_link']        = 'Next';
	    $config['prev_link']        = 'Prev';
	    $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
	    $config['full_tag_close']   = '</ul></nav></div>';
	    $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
	    $config['num_tag_close']    = '</span></li>';
	    $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
	    $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	    $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
	    $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
	    $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
	    $config['prev_tagl_close']  = '</span>Next</li>';
	    $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	    $config['first_tagl_close'] = '</span></li>';
	    $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	    $config['last_tagl_close']  = '</span></li>';

	    $this->pagination->initialize($config);
	    $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

	    //panggil function get_berita_list yang ada pada mmodel berita_model. 
	    $data['data'] = $this->m_home->get_berita_list($config["per_page"], $data['page']);           

	    $data['pagination'] = $this->pagination->create_links();

		$data['berita_list'] = $this->m_home->get_berita();

		$this->load->view('home/_partial/publikasi_header', $data);
		$this->load->view('home/berita', $data);
	}
	public function dataJatim()
	{
		// $id_bidang = 1;
		$tahun = $this->uri->segment(3);
		if (!$tahun) {
			$tahun = 2019;
		}
		$bidang = $this->uri->segment(4);
		if (!$bidang) {
			$bidang = 1;
		}
		$kategori = $this->uri->segment(5);
		if (!$kategori) {
			$kategori = 1;
		}

		$bid = $this->m_home->get_bidang_by_id($bidang);
		$kat = $this->m_home->get_kategori_by_id($kategori);
		$des = $this->m_home->get_deskripsi($bidang, $kategori);
		$getbid = $this->m_home->get_bidang();

		foreach ($getbid->result() as $row) {
			$getkatbid = $this->m_home->get_kategori_by_bidang($row->id_bidang);
			$n = 0;	
			foreach ($getkatbid->result_array() as $rw) {
				$data['kategori_bidang'][$row->id_bidang][$n] = "<option value=".$rw['id_kategori_data'].">".$rw['nama_kategori']."</option>";		
				$n++;		
			}	
			$data['jumlah_bidang'][$row->nama_bidang] = $this->m_home->count_bidang($row->id_bidang);
		}

		$data['tahun_data'] = $tahun;
		$data["menu"] = "data";
		$data['bidang'] = $getbid;
		$data['id_bidang_sekarang'] = $bid['id_bidang'];
		$data['bidang_sekarang'] = $bid['nama_bidang'];
		$data['id_kategori_sekarang'] = $kat['id_kategori_data'];
		$data['kategori_sekarang'] = $kat['nama_kategori'];
		$data['kategori_list'] = $this->m_home->get_kategori_by_bidang($bidang);
		$data['hasil'] = $this->m_home->get_data_prov($tahun, $des['id_deskripsi']);
		$data['kab'] = $this->m_home->get_kab();
		$data['hg1'] = 1;

		$this->load->view('home/_partial/publikasi_header', $data);
		$this->load->view("home/dataJatim", $data);
  		$this->load->view('home/_partial/highchart', $data);
	}
	public function proses_cari(){
		$tahun = $this->input->post('tahun');
		$bidang = $this->input->post('bidang');
		$kategori = $this->input->post('kategori');
        header("location:".base_url()."home/datajatim/".$tahun."/".$bidang."/".$kategori."");
	}
	public function detailkab(){
		$data["menu"] = "data";
		$kategori = $this->uri->segment(7);
		if (!$kategori) {
			$kategori = 1;
		}
		$bidang = $this->uri->segment(6);
		if (!$bidang) {
			$bidang = 1;
		}
		$kabs = $this->uri->segment(5);
		if (!$kabs) {
			$kabs = 'data_kab1';
		}
		$tahun_akhir = $this->uri->segment(4);
		if (!$tahun_akhir) {
			$tahun_akhir = 2019;
		}
		$tahun_awal = $this->uri->segment(3);
		if (!$tahun_awal) {
			$tahun_awal = 2015;
		}
		$bid = $this->m_home->get_bidang_by_id($bidang);
		$des = $this->m_home->get_deskripsi($bidang, $kategori);		
		$kb = $this->m_home->get_kab_id($kabs);
		$kat = $this->m_home->get_kategori_by_id($kategori);
		$kabupatens = $this->m_home->get_kab();

		$data['id_kabupaten_sekarang'] = $kb['kd_kab'];
		$data['kabupaten_sekarang'] = $kb['nama_kab'];
		$data['kabupatens'] = $kabupatens;
		$data['id_bidang_sekarang'] = $bid['id_bidang'];
		$data['bidang_sekarang'] = $bid['nama_bidang'];
		$data['id_kategori_sekarang'] = $kat['id_kategori_data'];
		$data['kategori_sekarang'] = $kat['nama_kategori'];
		$data['kategori_list'] = $this->m_home->get_kategori_by_bidang($bidang);
		$data['kabupat']['nama'] = $kb['nama_kab'];
		$data['hg1'] = 2;
		$data['tahun_awal'] = $tahun_awal;
		$data['tahun_akhir'] = $tahun_akhir;

		$kd_kab = $kb['kd_kab'];
		for ( $i=$tahun_awal;$i<=$tahun_akhir;$i++){
			$dta = $this->m_home->get_data_prov($i, $des['id_deskripsi']);
			$data['hasil'][$i] = $dta[$kd_kab];
		}

		$no=0;

		$this->load->view('home/_partial/publikasi_header', $data);
		$this->load->view("home/detailkab", $data);
  		$this->load->view('home/_partial/highchart', $data);

	}

	public function ambil_data(){
		// $id = $this->input->get('id');
		$rst = $this->db->get('ambil_data');
		$result = array();

		foreach ($rst->result_array() as $value) {
			$result[] = $value;
		}

		echo json_encode($result);
	}
}

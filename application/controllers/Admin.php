<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		// $this->load->library('form_validation');
		$this->load->library('form_validation');
        $this->load->model('m_admin');
        $this->load->library('upload');        
        $this->load->model('m_home');
        $this->load->helper('file');
		$role_id = $this->session->userdata('role_id');
		if ($role_id == 2) {					
		} else if ($role_id == 1) {			
			redirect('adminsuper','refresh');	
		} else {
			redirect('auth','refresh');
		}
	}

	public function index()
	{

		$this->session->set_flashdata('breadcrumb', 'Dashboard');
		$this->session->set_flashdata('menu', 'dashboard');
		$this->session->set_flashdata('menuName', 'Dashboard');
		$this->session->set_flashdata('icon', 'fas fa-tachometer-alt');
		$this->load->view('admin/overview');		
	}
	public function data_provinsi()
	{
		$this->session->set_flashdata('breadcrumb', 'List Data Kab');
		$this->session->set_flashdata('menu', 'data_provinsi');
		$this->session->set_flashdata('menuName', 'List Data Kab');
		$this->session->set_flashdata('icon', 'fas fa-chart-pie');
		
		$data['brita'] = $this->m_home->get_berita();
		$data['kabupaten'] = $this->m_home->get_kab();
		$data['data_prov'] = $this->m_home->get_prci_data_prov();
		
		$this->load->view('admin/data_provinsi', $data);			
	}
	public function berita(){	
		$this->session->set_flashdata('breadcrumb', 'List Berita');
		$this->session->set_flashdata('menu', 'berita');
		$this->session->set_flashdata('menuName', 'List Berita');
		$this->session->set_flashdata('icon', 'fas fa-newspaper');

		$data['brita'] = $this->m_home->get_berita();
		
		$this->load->view('admin/berita', $data);			
	}
	public function tambah_berita()
	{	
		$this->form_validation->set_rules('judul', 'Judul', 'required|trim',[
			'required' => 'Judul Harus Diisi',
		]);
		$this->form_validation->set_rules('isi', 'isi', 'required|trim',[
			'required' => 'isi Harus Diisi',
		]);

		if ($this->form_validation->run() == false) {
			$email = $this->session->userdata('email');
			$user = $this->db->get_where('prci_user', ['email' => $email])->row_array();
			$data['id_user'] = $user['id'];
			$data['nama_user'] = $user['nama'];
			$this->session->set_flashdata('breadcrumb', 'Input Berita');
			$this->session->set_flashdata('menu', 'tambah_berita');
			$this->session->set_flashdata('menuName', 'Input Berita');
			$this->session->set_flashdata('icon', 'fas fa-newspaper');
			$this->load->view('admin/input_berita', $data);		

		}else {
			$this->_addBerita();
		}
		
	}
	private function _addBerita() {
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		$tanggal = $this->input->post('tanggal');
		$jenis = $this->input->post('jenis');
		$kategori = $this->input->post('kategori');
		$id_user =  $this->input->post('id_user');
		$nama_user =  $this->input->post('nama_user');

		$config['upload_path'] = './assets/images/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    // $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	    $this->upload->initialize($config);
	    if(!empty($_FILES['gambar']['name'])){
	    	if ($this->upload->do_upload('gambar')){
	        	$gbr = $this->upload->data();
	            //Compress Image
	            $config['image_library']='gd2';
	            $config['source_image']='./assets/images/'.$gbr['file_name'];
	            $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= FALSE;
	            $config['quality']= '60%';
	            $config['width']= 710;
	            $config['height']= 420;
	            $config['new_image']= './assets/images/'.$gbr['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();

	            $gambar=$gbr['file_name'];
	            $is_active = 1;

				$this->m_admin->simpan_berita($id_user,$judul,$isi,$kategori,$gambar,$jenis,$nama_user,$is_active,$tanggal);
				redirect('admin/berita','refresh');
			}else {				
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gambar gagal diupload!</div>');
		    	redirect('admin/tambah_berita','refresh');	    					

				// echo $_FILES['gambar']['name']."<br>";
				// echo $config['upload_path'];
				// echo $gbr['file_name'];
			}

	    }else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gambar tidak tersedia!</div>');
	    	redirect('admin/tambah_berita','refresh');	    	

			// echo $_FILES['gambar']['name']."<br>";
			// echo $config['upload_path'];
			// echo $gbr['file_name'];
	    }



	}


}
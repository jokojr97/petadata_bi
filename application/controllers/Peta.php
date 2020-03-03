<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peta extends CI_Controller {
	public function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		redirect('peta/peta_kabupaten','refresh');
	}
	public function peta_kabupaten()
	{
		$this->load->view('_partial/header');
		$this->load->view('peta_kabupaten');
		$this->load->view('_partial/footer');
	}
	public function peta_kecamatan()
	{
		$this->load->view('_partial/header');
		$this->load->view('peta_kecamatan');
		$this->load->view('_partial/footer');
	}
	public function peta_desa()
	{
		$this->load->view('_partial/header');
		$this->load->view('peta_desa');
		$this->load->view('_partial/footer');
	}
}

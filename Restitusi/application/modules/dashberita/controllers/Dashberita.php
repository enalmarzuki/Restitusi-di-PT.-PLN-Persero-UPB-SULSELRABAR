<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashberita extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//$logged_in = $this->session->userdata('logged_in');

		//if (!$logged_in) {
			//redirect('login');
		//}
		//else {
			$this->load->model('Mberita');
		//}
	}

	public function index()
	{
		$data['berita']=$this->Mberita->berita();
		$this->template->load('template/backend','dashberita',$data);
	}
	public function tambahberita()
	{
		$this->template->load('template/backend','tambahberita');
	}
	public function editberita($nim)
	{
		$data['berita'] = $this->Mberita->get_updateBerita($nim);
		$this->template->load('template/backend','editberita',$data);
	}
	public function uploadBerita()
	{
		$this->Mberita->uploadBerita();
		redirect('dashberita/index');
	}
	public function updateBerita()
	{	
		$this->Mberita->updateBerita();
		redirect('dashberita/index');
	}
	public function deleteBerita($nim)
	{	
		$this->Mberita->deleteBerita($nim);
		redirect('dashberita/index');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashguruSiswa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
		//$logged_in = $this->session->userdata('logged_in');

		//if (!$logged_in) {
			//redirect('login');
		//}
		//else {
			$this->load->model('Mgurusiswa');
		//}
	}

	public function index()
	{
		$data['berita']=$this->Mgurusiswa->berita();
		$this->template->load('template/guru','dashgurusiswa',$data);
	}
	public function tambahgurusiswa()
	{
		$this->template->load('template/guru','tambahgurusiswa');
	}
	public function editgurusiswa($nim)
	{
		$data['berita'] = $this->Mgurusiswa->get_updateAdminsiswa($nim);
		$this->template->load('template/guru','editgurusiswa',$data);
	}
	public function uploadgurusiswa()
	{
		$this->Mgurusiswa->prosesupload();
		$this->Mgurusiswa->uploadgurusiswa();
		$this->Mgurusiswa->uploadguruuser();
		redirect('index.php/DashguruSiswa/index');
	}
	public function updategurusiswa()
	{	
		$this->Mgurusiswa->updategurusiswa();
		redirect('index.php/DashguruSiswa/index');
	}
	public function deletegurusiswa($nim)
	{	
		$this->Mgurusiswa->deletefotosiswa($nim);
		$this->Mgurusiswa->deletegurusiswa($nim);
		$this->Mgurusiswa->deleteguruuser($nim);
		redirect('index.php/DashguruSiswa/index');
	}
}

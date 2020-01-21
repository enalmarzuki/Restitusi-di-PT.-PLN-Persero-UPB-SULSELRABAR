<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashadminSiswa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
		//$logged_in = $this->session->userdata('logged_in');

		//if (!$logged_in) {
			//redirect('login');
		//}
		//else {
			$this->load->model('MadminSiswa');
		//}
	}

	public function index()
	{
		$data['siswa']=$this->MadminSiswa->siswa();
		$this->template->load('template/backend','tambahAdminsiswa',$data);
	}

	public function tambahAdminsiswa()
	{
		$this->template->load('template/backend','tambahAdminsiswa');
	}

	/*public function uploadadminfoto()
	{
		$this->template->load('template/backend','uploadadminfoto');
	}*/

	public function editAdminsiswa($nim)
	{
		$data['siswa'] = $this->MadminSiswa->get_updateAdminsiswa($nim);
		$this->template->load('template/backend','editAdminsiswa',$data);
	}
	public function uploadAdminsiswa()
	{	
		/*$this->MadminSiswa->uploadAdminsiswa();*/
		$this->MadminSiswa->prosesupload();
		
		// $this->MadminSiswa->prosesupload();
		//$this->MadminSiswa->uploadtikethotel();
		//$this->MadminSiswa->uploadAdminuser();
		redirect('index.php/DashadminSiswa/index');
		//print_r($this->db->last_query());
	}
	public function updateAdminsiswa()
	{	
		$this->MadminSiswa->updateAdminsiswa();
		redirect('index.php/DashadminSiswa/index');
	}
	public function deleteAdminsiswa($nim)
	{	
		$this->MadminSiswa->deleteAdminsiswa($nim);
		$this->MadminSiswa->deleteAdminuser($nim);
		$this->MadminSiswa->deletefotosiswa($nim);
		redirect('index.php/DashadminSiswa/index');
	}

	public function cari($nim)
	{	
		
		redirect('index.php/DashadminSiswa/index');
	}
}

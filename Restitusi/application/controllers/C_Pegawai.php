<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Pegawai extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
		//$logged_in = $this->session->userdata('logged_in');

		//if (!$logged_in) {
			//redirect('login');
		//}
		//else {
			$this->load->model('M_Pegawai');
		//}
	}

	public function index()
	{	
		$data['user']=$this->M_Pegawai->user();
		$this->template->load('template/backend','Dash_Pegawai',$data);
	}
	public function tambahpegawai()
	{
		$this->template->load('template/backend','Dash_Tambahpegawai');
	}
	public function editpegawai($nip)
	{	
		$data['user'] = $this->M_Pegawai->get_updateUser($nip);
		$this->template->load('template/backend','v_Editpegawai',$data);
	}
	public function uploadUser()
	{
		/*$this->M_Pegawai->uploadUser();*/
		$this->M_Pegawai->prosesupload();
		redirect('index.php/C_Pegawai/index');
	}
	public function updatepegawai()
	{	
		$this->M_Pegawai->updatepegawai();
		/*$this->M_Pegawai->prosesupload();*/
		redirect('index.php/C_Pegawai/index');
	}
	public function deleteUser($nip)
	{	
		$this->M_Pegawai->deleteUser($nip);
		redirect('index.php/C_Pegawai/index');
	}
}

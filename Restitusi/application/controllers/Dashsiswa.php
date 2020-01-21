<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashsiswa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
		//$logged_in = $this->session->userdata('logged_in');

		//if (!$logged_in) {
			//redirect('login');
		//}
		//else {
			$this->load->model('Msiswa');
			$this->load->helper(array('url','download'));
		//}
	}

	public function index()
	{
		$data['berita']=$this->Msiswa->berita();
		$this->template->load('template/siswa','dashsiswa',$data);
	}

	public function download(){				
		
	}	
}

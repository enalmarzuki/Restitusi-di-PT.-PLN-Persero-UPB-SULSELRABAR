<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashagenda extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//$logged_in = $this->session->userdata('logged_in');

		//if (!$logged_in) {
			//redirect('login');
		//}
		//else {
			$this->load->model('Magenda');
		//}
	}

	public function index()
	{	
		$data['agenda']=$this->Magenda->agenda();
		$this->template->load('template/backend','dashagenda',$data);
	}
	public function tambahagenda()
	{
		$this->template->load('template/backend','tambahagenda');
	}
	public function editagenda($nip)
	{	
		$data['agenda'] = $this->Magenda->get_updateAgenda($nip);
		$this->template->load('template/backend','editagenda',$data);
	}
	public function uploadAgenda()
	{
		$this->Magenda->uploadAgenda();
		redirect('dashagenda/index');
	}
	public function updateAgenda()
	{	
		$this->Magenda->updateAgenda();
		redirect('dashagenda/index');
	}
	public function deleteAgenda($nip)
	{	
		$this->Magenda->deleteAgenda($nip);
		redirect('dashagenda/index');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashuser extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//$logged_in = $this->session->userdata('logged_in');

		//if (!$logged_in) {
			//redirect('login');
		//}
		//else {
			$this->load->model('Muser');
		//}
	}

	public function index()
	{	
		$data['user']=$this->Muser->user();
		$this->template->load('template/backend','dashuser',$data);
	}
	public function tambahuser()
	{
		$this->template->load('template/backend','tambahuser');
	}
	public function edituser($id_user)
	{	
		$data['user'] = $this->Muser->get_updateUser($id_user);
		$this->template->load('template/backend','edituser',$data);
	}
	public function uploadUser()
	{
		$this->Muser->uploadUser();
		redirect('dashuser/index');
	}
	public function updateUser()
	{	
		$this->Muser->updateUser();
		redirect('dashuser/index');
	}
	public function deleteUser($id_user)
	{	
		$this->Muser->deleteUser($id_user);
		redirect('dashuser/index');
	}
}

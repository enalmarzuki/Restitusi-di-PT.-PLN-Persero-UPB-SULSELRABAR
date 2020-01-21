<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Restitusi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
		//$logged_in = $this->session->userdata('logged_in');

		//if (!$logged_in) {
			//redirect('login');
		//}
		//else {
			/*$this->load->model('M_Restitusi');*/
		$this->load->model('M_Report', '', TRUE);
		$this->load->helper(array('form', 'url'));
		
		//}
	}

	public function index()
	{	
		$data['restitusi']=$this->M_Restitusi->restitusi();
		$this->template->load('template/backend','Dash_Restitusi',$data);
	}
	public function tambahrestitusi()
	{
		$this->template->load('template/backend','tambahrestitusi');
	}
	public function editrestitusi($no_restitusi)
	{	
		$data['restitusi'] = $this->M_Restitusi->get_updaterestitusi($no_restitusi);
		$this->template->load('template/backend','Dash_EditRestitusi',$data);
	}

	public function agendarestitusi($no_restitusi)
	{	
		$data['restitusi_agenda'] = $this->M_Restitusi->restitusi_agenda($no_restitusi);
		$this->template->load('template/backend','v_Agenda',$data);
	}

	public function uploadrestitusi()
	{
		$this->M_Restitusi->prosesupload();
		$this->M_Restitusi->uploadrestitusi();
		$this->M_Restitusi->uploadAdminuserrestitusi();
		redirect('index.php/C_Restitusi/index');
	}
	public function updaterestitusi()
	{	
		$this->M_Restitusi->updaterestitusi();
		/*$this->M_Restitusi->updaterestitusi_komentar();*/
		redirect('index.php/C_Restitusi/index');
	}
	public function deleterestitusi($no_restitusi)
	{	
		$this->M_Restitusi->deleterestitusi($no_restitusi); 
		redirect('index.php/C_Restitusi/index');
	}


	function a(){
		$this->M_Restitusi->uploadAdminuserrestitusi();
		
	}

	public function report($no_restitusi)
	{
		$data['restitusi_report'] = $this->M_Restitusi->restitusi_report($no_restitusi);
		$this->template->load('template/backend','v_Report',$data);
	}


}

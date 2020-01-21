<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$this->template->load('template/backend','dashboard');
	}

	public function guru()
	{
		$this->template->load('template/guru','dashboard');
	}

	public function siswa()
	{
		$this->template->load('template/siswa','dashboard');
	}
}

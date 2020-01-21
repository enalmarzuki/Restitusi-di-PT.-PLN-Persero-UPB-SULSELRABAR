<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashadminHome extends CI_Controller {

	public function index()
	{
		$this->template->load('template/backend','dashboard');
    	
	}
}

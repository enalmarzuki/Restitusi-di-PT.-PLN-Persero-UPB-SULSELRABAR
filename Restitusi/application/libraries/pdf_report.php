<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once dirname(__file__).'/tcpdf/tcpdf.php';	//Menyisipkan file tcpdf 

class Pdf_report extends TCPDF 
{
	
	protected $ci;

	public function __constructor()
	{
		$this->ci=&get_instance();
	}

}
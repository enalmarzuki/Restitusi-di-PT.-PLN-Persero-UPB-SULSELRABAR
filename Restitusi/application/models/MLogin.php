<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MLogin extends CI_Model {

	public function proseslogin($user,$pass){
		$this->db->where('nip',$user);
		$this->db->where('password',$pass);

		return $this->db->get('tb_admin')->row();

		
	}
}

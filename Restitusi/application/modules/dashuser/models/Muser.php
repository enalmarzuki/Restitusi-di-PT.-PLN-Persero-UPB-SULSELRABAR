<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muser extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_updateUser($id_user){
		return $this->db->get_where('tb_user',array('id_user'=>$id_user))->row_array();
	}

	function uploadUser(){
		$cek_user =
            $this->db->select('id_user')
                ->from('tb_user')
                ->order_by('id_user','DESC')
                ->limit('1')
                ->get();
				
        $data['id_user']	= $cek_user->row()->id_user+1;
        $data['username']= $this->input->post('username');
        $data['email']	= $this->input->post('email');
        $data['nomor_telpon']= $this->input->post('nomor_telpon');
        $data['password']   = $this->input->post('password');


        $this->db->insert('tb_user',$data);
        return true;
        
    }

    function user(){
    	return $this->db->get('tb_user')->result_array();
    }

    function updateuser(){
    	$data['id_user']	= $this->input->post('id_user');
        $data['username']= $this->input->post('username');
        $data['email']  = $this->input->post('email');
        $data['nomor_telpon']= $this->input->post('nomor_telpon');
        $data['password']   = $this->input->post('password');



        $this->db->where('id_user', $data['id_user']);
        $this->db->update('tb_user', $data);
        return true;
    }

    function deleteuser($id_user){
        $this->db->where('id_user',$id_user);
        $this->db->delete('tb_user');
    }

}
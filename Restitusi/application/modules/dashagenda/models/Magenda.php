<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magenda extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_updateAgenda($nip){
		return $this->db->get_where('tb_guru',array('nip'=>$nip))->row_array();
	}

	function uploadAgenda(){
		$cek_agenda =
            $this->db->select('nip')
                ->from('tb_guru')
                ->order_by('nip','DESC')
                ->limit('1')
                ->get();
				
        //$data['nip']	= $cek_agenda->row()->nip+1;
        $data['nip']= $this->input->post('nip');
        $data['nama_guru']= $this->input->post('nama_guru');
        $data['jk']	= $this->input->post('jk');
        $data['alamat'] = $this->input->post('alamat');
        $data['no_hp'] = $this->input->post('no_hp');
        $data['mata_pelajaran'] = $this->input->post('mata_pelajaran');
        $data['tanggal_update']      = date("Y-m-d H:i:s");
        $data['tanggal_post']      = date("Y-m-d H:i:s");


        $this->db->insert('tb_guru',$data);
        return true;
        
    }

    function agenda(){
    	return $this->db->get('tb_guru')->result_array();
    }

    function updateAgenda(){
    	$data['nip']	= $this->input->post('nip');
        $data['nama_guru']= $this->input->post('nama_guru');
        $data['alamat'] = $this->input->post('alamat');
        $data['no_hp'] = $this->input->post('no_hp');
        $data['mata_pelajaran'] = $this->input->post('mata_pelajaran');
        $data['tanggal_update']      = date("Y-m-d H:i:s");
        $data['tanggal_post']      = date("Y-m-d H:i:s");


        $this->db->where('nip', $data['nip']);
        $this->db->update('tb_guru', $data);
        return true;
    }

    function deleteAgenda($nip){
        $this->db->where('nip',$nip);
        $this->db->delete('tb_guru');
    }

}
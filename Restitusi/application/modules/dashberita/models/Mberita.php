<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mberita extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_updateBerita($nim){
		return $this->db->get_where('tb_siswa',array('nim'=>$nim))->row_array();
	}

	function uploadBerita(){
		$cek_berita =
            $this->db->select('nim')
                ->from('tb_siswa')
                ->order_by('nim','DESC')
                ->limit('1')
                ->get();
				
        $data['nim']	= $this->input->post('nim');
        $data['nama_siswa']= $this->input->post('nama_siswa');
        $data['alamat']	= $this->input->post('alamat');
        $data['jk'] = $this->input->post('jk');
        $data['nama_bapak_w'] = $this->input->post('nama_bapak_w');
        $data['nama_ibu_w'] = $this->input->post('nama_ibu_w');
        $data['pekerjaan_bapak_w'] = $this->input->post('pekerjaan_bapak_w');
        $data['pekerjaan_ibu_w'] = $this->input->post('pekerjaan_ibu_w');
        $data['no_hp'] = $this->input->post('no_hp');
        $data['tanggal_update']      = date("Y-m-d H:i:s");
        $data['tanggal_post']      = date("Y-m-d H:i:s");


        $this->db->insert('tb_siswa',$data);
        return true;
        
    }

    function berita(){
    	return $this->db->get('tb_siswa')->result_array();
    }

    function updateBerita(){
    	$data['nim']	= $this->input->post('nim');
        $data['nama_siswa']= $this->input->post('nama_siswa');
        $data['alamat']	= $this->input->post('alamat');
        $data['bindo'] = $this->input->post('bindo');
        $data['mtk'] = $this->input->post('mtk');
        $data['bhs_inggris'] = $this->input->post('bhs_inggris');
        $data['tanggal_update']      = date("Y-m-d H:i:s");
        $data['tanggal_post']      = date("Y-m-d H:i:s");


        $this->db->where('nim', $data['nim']);
        $this->db->update('tb_siswa', $data);
        return true;
    }

    function deleteBerita($nim){
        $this->db->where('nim',$nim);
        $this->db->delete('tb_siswa');
    }

}
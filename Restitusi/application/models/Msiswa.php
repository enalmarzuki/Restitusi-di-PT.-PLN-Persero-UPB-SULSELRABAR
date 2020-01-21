<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msiswa extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_updateAdminsiswa($nim){
		return $this->db->get_where('tb_siswa',array('nim'=>$nim))->row_array();
	}

	function uploadAdminsiswa(){
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

    public function uploadAdminuser(){
        $cek_berita =
            $this->db->select('id')
                ->from('tb_user')
                ->order_by('id','DESC')
                ->limit('1')
                ->get();
                
        $data['id']    = $this->input->post('nim');
        $data['pass']= $this->input->post('pass');
        $data['level_user'] = $this->input->post('level_user');


        $this->db->insert('tb_user',$data);
        return true;
    }

    function berita(){
    	return $this->db->get('tb_siswa')->result_array();
    }

    function updateAdminsiswa(){
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

    function deleteAdminsiswa($nim){
        $this->db->where('nim',$nim);
        $this->db->delete('tb_siswa');
    }

    public function deleteAdminuser($nim){
        $this->db->where('id',$nim);
        $this->db->delete('tb_user');
    }

    public function deletefotosiswa($nim){
        $this->db->where('id',$nim);
        $this->db->delete('tb_foto');
    }

    public function prosesupload()
        {
                $config['upload_path']          = './gambar/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = '10000';
                $config['max_width']            = '5000';
                $config['max_height']           = '5000';

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('foto_siswa'))
                {
                    echo 'gagal';
                }
                else
                {
                    
                   $img = $this->upload->data();
                   $gambar = $img['file_name'];
                   $nim = $this->input->post('nim',true);
                   $nama = $this->input->post('nama_siswa',true);

                   $data = array(
                        'id' => $nim,
                        'nama_foto' => $nama,
                        'gambar' => $gambar
                        );

                        $this->db->insert('tb_foto', $data);
                   //echo "behasil upload";
                }
        }

    public function datasiswa(){
        $this->db->select('*');
        $this->db->from('tb_siswa');
        $this->db->order_by('nim');
        $data = $this->db->get('');
        return $data;
    }
}
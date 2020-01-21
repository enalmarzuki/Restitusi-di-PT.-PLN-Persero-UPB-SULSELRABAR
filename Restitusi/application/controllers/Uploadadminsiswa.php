<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploadadminsiswa extends CI_Controller {
	public function index()
	{
		$data['berita']=$this->Mberita->berita();
		$this->template->load('template/backend','dashAdminsiswa',$data);
	}
	public function prosesupload()
        {
                $config['upload_path']          = './gambar/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = '1000000';
                $config['max_width']            = '50000';
                $config['max_height']           = '50000';

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                    echo 'gagal';
                }
                else
                {
                	
                   //$img = $this->upload->data();
                   //$gambar = $img['file_name'];
                    $gambar = $this->upload->data('file_name');
                   $data = array(
                    'foto_siswa' => $gambar);

                   $this->db->insert('tb_siswa', $data);
                   echo "behasil upload";
                }
        }
}

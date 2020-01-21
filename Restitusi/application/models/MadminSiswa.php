<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MadminSiswa extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_updateAdminsiswa($nip){
		return $this->db->get_where('tb_restitusi',array('nip'=>$nip))->row_array();
	}

	function uploadAdminsiswa(){
		$cek_berita =
            $this->db->select('nip')
                ->from('tb_restitusi')
                ->order_by('nip','DESC')
                ->limit('1')
                ->get();
				
        $data['nip']	= $this->input->post('nip');
        $data['nama_pegawai']= $this->input->post('nama_pegawai');    
        $data['jk'] = $this->input->post('jk');
        $data['no_restitusi'] = $this->input->post('no_restitusi');
        $data['tanggal_update']      = date("Y-m-d H:i:s");
        $data['tanggal_post']      = date("Y-m-d H:i:s");
        $this->db->insert('tb_restitusi',$data);
        return true;
    }

    public function uploadAdminuser(){
        $cek_berita =
            $this->db->select('id')
                ->from('user_tb')
                ->order_by('id','DESC')
                ->limit('1')
                ->get();
                
        $data['id']    = $this->input->post('nip');
        $data['pass']= $this->input->post('pass');
        $data['level_user'] = $this->input->post('level_user');


        $this->db->insert('user_tb',$data);
        return true;
    }

    function siswa(){
    	return $this->db->get('tb_foto')->result_array();
    }

    function updateAdminsiswa(){
    	$data['nip']	= $this->input->post('nip');
        $data['nama_pegawai']= $this->input->post('nama_pegawai');
        $data['tanggal_update']      = date("Y-m-d H:i:s");
        $data['tanggal_post']      = date("Y-m-d H:i:s");


        $this->db->where('nip', $data['nip']);
        $this->db->update('tb_restitusi', $data);
        return true;
    }

    function deleteAdminsiswa($nip){
        $this->db->where('nip',$nip);
        $this->db->delete('tb_restitusi');
    }

    public function deleteAdminuser($nip){
        $this->db->where('id',$nip);
        $this->db->delete('user_tb');
    }

    public function deletefotosiswa($nip){
        $this->db->where('id',$nip);
        $this->db->delete('tb_foto');
    }

   /* public function prosesupload()
        {
                $config['upload_path']          = './gambar/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = '1000000';
                $config['max_width']            = '5000000';
                $config['max_height']           = '5000000';

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('foto_guru') && ! $this->upload->do_upload('foto_hotel'))
                {
                    echo 'gagal';
                }
                else
                {
                    
                   $img = $this->upload->data();
                   $gambar = $img['file_name'];

                   $img2 = $this->upload->data();
                   $gambar2 = $img2['file_name'];

                   $nip = $this->input->post('nip',true);
                   $nama = $this->input->post('nama_pegawai',true);
                   $tgl = date('Y-m-d');

                   $data = array(
                        'tgl_post' => $tgl,
                        'tanggal_update' => $tgl, 
                        'nip' => $nip,
                        'nama_pegawai' => $nama,
                        'tiket_pesawat' => $gambar,
                        'tiket_hotel' => $gambar2
                        );
                    $this->db->insert('tb_foto', $data);
                    //return true;
                }

                
            }*/

    public function prosesupload()
    {       
        $this->load->library('upload');
        $dataInfo = array();
        $files = $_FILES;
        $cpt = count($_FILES['userfile']['name']);
        for($i=0; $i<$cpt; $i++)
        {           
            $_FILES['userfile']['name']= $files['userfile']['name'][$i];
            $_FILES['userfile']['type']= $files['userfile']['type'][$i];
            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
            $_FILES['userfile']['error']= $files['userfile']['error'][$i];
            $_FILES['userfile']['size']= $files['userfile']['size'][$i];    

            $this->upload->initialize($this->set_upload_options());
            $this->upload->do_upload();
            $dataInfo[] = $this->upload->data();
        }

        $data = array(
            'nip' => $this->input->post('nip'),
            'nama_pegawai' => $this->input->post('nama_pegawai'),
            'no_restitusi' => $this->input->post('no_restitusi'),
            'tiket_pesawat' => $dataInfo[0]['file_name'],
            'tiket_hotel' => $dataInfo[1]['file_name'],
            'foto3' => $dataInfo[2]['file_name'],
            'foto4' => $dataInfo[3]['file_name'],
            'foto5' => $dataInfo[4]['file_name'],
            'foto6' => $dataInfo[5]['file_name'],
            'tgl_post' => date('Y-m-d H:i:s')
         );

            
        // $result_set = $this->tb_foto->insertUser($data);
        $result_set = $this->db->insert('tb_foto', $data);
    }

     public function prosesupload2()
    {       
        $this->load->library('upload');
        $dataInfo = array();
        $files = $_FILES;
        $cpt = count($_FILES['userfile']['name']);
        for($i=0; $i<$cpt; $i++)
        {           
            $_FILES['userfile']['name']= $files['userfile']['name'][$i];
            $_FILES['userfile']['type']= $files['userfile']['type'][$i];
            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
            $_FILES['userfile']['error']= $files['userfile']['error'][$i];
            $_FILES['userfile']['size']= $files['userfile']['size'][$i];    

            $this->upload->initialize($this->set_upload_options());
            $this->upload->do_upload();
            $dataInfo[] = $this->upload->data();
        }

        $data = array(
            'nama_pegawai' => $this->input->post('nama_pegawai'),
            'no_restitusi' => $this->input->post('no_restitusi'),
            'tiket_pesawat' => $dataInfo[6]['file_name'],
            'tiket_hotel' => $dataInfo[7]['file_name'],
            
            'tgl_post' => date('Y-m-d H:i:s')
         );

            
        // $result_set = $this->tb_foto->insertUser($data);
        $result_set = $this->db->insert('tb_foto', $data);
    }

    private function set_upload_options()
    {   
        //upload an image options
        $config = array();
        $config['upload_path'] = './gambar/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = '1000000000';
        $config['overwrite']     = FALSE;

        return $config;
    }

}
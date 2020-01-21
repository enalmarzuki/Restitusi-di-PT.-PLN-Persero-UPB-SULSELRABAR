<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pegawai extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_updateUser($nip){
		return $this->db->get_where('users_table',array('nip'=>$nip))->row_array();
	}

	/*function uploadUser(){
		$cek_user =
            $this->db->select('nip')
                ->from('users_table')
                ->order_by('nip','DESC')
                ->limit('1')
                ->get();
				
        $data['nip']= $this->input->post('nip');
        $data['nama_pegawai']	= $this->input->post('nama_pegawai');
        $data['alamat_pegawai']= $this->input->post('alamat');
        $data['password']   = $this->input->post('password');
        $data['level_user']   = $this->input->post('level_user');
        $data['jk']   = $this->input->post('jk');
        $data['no_hp']   = $this->input->post('no_hp');

        $this->db->insert('users_table',$data);
        return true;
        
    }*/

    function user(){
    	return $this->db->get('users_table')->result_array();
    }

    function updatepegawai(){
    	  $data['nip']	= $this->input->post('nip');
        $data['name']= $this->input->post('name');
        $data['tgl_lahir']= $this->input->post('tgl_lahir');
        $data['email']= $this->input->post('email');
        $data['password']   = $this->input->post('password');
        $data['alamat']  = $this->input->post('alamat');

        $this->db->where('nip', $data['nip']);
        $this->db->update('users_table', $data);
        return true;
    }

    function deleteuser($nip){
        $this->db->where('nip',$nip);
        $this->db->delete('users_table');
    }

     public function prosesupload()
        {
                $config['upload_path']          = './gambar/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = '10000000';
                $config['max_width']            = '5000000';
                $config['max_height']           = '5000000';

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('foto_pegawai'))
                {
                    echo 'gagal';
                }
                else
                {
                    
                   
                   $nip = $this->input->post('nip',true);
                   $password = $this->input->post('password',true);
                   $email = $this->input->post('email',true);
                   $nama = $this->input->post('nama_pegawai',true);
                   $alamat_pegawai = $this->input->post('alamat',true);
                   $jk = $this->input->post('jk',true);
                   $img = $this->upload->data();
                   $gambar = $img['file_name'];
                   $level_user = $this->input->post('level_user',true);
                   $no_hp = $this->input->post('no_hp',true);

                   $data = array(
                        'nip' => $nip,
                        'password' => $password,
                        'email' => $email,
                        'name' => $nama,
                        'alamat_pegawai' => $alamat_pegawai,
                        'jk' => $jk,
                        'gambar' => $gambar,
                        'level_user' => $level_user,
                        'no_hp' => $no_hp
                        );

                       $this->db->insert('users_table', $data);
                      /* $this->db->where('nip', $data['nip']);
                       $this->db->update('users_table', $data);*/
                     
                   return true;
                }

                
            }

}
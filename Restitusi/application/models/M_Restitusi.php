<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Restitusi extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_updaterestitusi($no_restitusi){
		return $this->db->get_where('tb_restitusi',array('no_restitusi'=>$no_restitusi))->row_array();
	}

    function get_agenda($no_restitusi){
        return $this->db->get_where('tb_agenda',array('no_restitusi'=>$no_restitusi))->row_array();
    }


	function uploadrestitusi(){
		$cek_agenda =
            $this->db->select('nip')
                ->from('tb_restitusi')
                ->order_by('nip','DESC')
                ->limit('1')
                ->get();
				
        //$data['nip']	= $cek_agenda->row()->nip+1;
       /* $data['nip']= $this->input->post('nip');*/
        $data['nama_restitusi']= $this->input->post('nama_restitusi');
        $data['jk']	= $this->input->post('jk');
        $data['alamat'] = $this->input->post('alamat');
        $data['no_hp'] = $this->input->post('no_hp');
        $data['mata_pelajaran'] = $this->input->post('mata_pelajaran');
        $data['tanggal_update']      = date("Y-m-d H:i:s");
        $data['tanggal_post']      = date("Y-m-d H:i:s");


        $this->db->insert('tb_restitusi',$data);
        return true;
        
    }

    public function uploadAdminuserrestitusi(){
        $cek_berita =
            $this->db->select('id')
                ->from('tb_user')
                ->order_by('id','DESC')
                ->limit('1')
                ->get();
                
        $data['id']    = $this->input->post('nip');
        $data['pass']= $this->input->post('pass');
        $data['level_user'] = $this->input->post('level_user');


        $this->db->insert('tb_user',$data);
        return true;
    }

    function restitusi(){

       /* $this->db->select('*');
        $this->db->from('users_table');
        $this->db->join('tb_restitusi', 'tb_restitusi.id_user = users_table.id');
        $this->db->order_by('id_restitusi', 'DESC');
        $query = $this->db->get();
        return $query->result_array();*/


        /*$this->db->select('*');    
        $this->db->from('table1');
        $this->db->join('table2', 'table1.id = table2.id');
        $this->db->join('table3', 'table1.id = table3.id');*/

        $this->db->select('*');    
        $this->db->from('tb_restitusi');
        $this->db->join('users_table', 'tb_restitusi.id_user = users_table.id');
        /*$this->db->join('tb_agenda', 'tb_restitusi.no_restitusi = tb_agenda.no_restitusi');*/
        $this->db->order_by('id_restitusi', 'DESC');
        $query = $this->db->get();
        return $query->result_array();

    }

    function updaterestitusi(){
    	$data['id_restitusi']   = $this->input->post('id_restitusi');
        $data['status']   = $this->input->post('status');
        $data['komentar']   = $this->input->post('komentar');
        $this->db->where('id_restitusi', $data['id_restitusi']);
        $this->db->update('tb_restitusi', $data);
        
        return true;
    }

    /*function updaterestitusi_komentar(){
        $data['id_komentar']   = $this->input->post('id_komentar');
        $data['komentar']   = $this->input->post('komentar');
        $this->db->where('id_komentar', $data['id_komentar']);
        $this->db->update('tb_komentar', $data);
        return true;
    }*/

    function deleterestitusi($no_restitusi){
        $this->db->where('no_restitusi',$no_restitusi);
        $this->db->delete('tb_agenda');
        $this->db->where('no_restitusi',$no_restitusi);
        $this->db->delete('tb_restitusi');

    }

    public function deleteAdminuser($nip){
        $this->db->where('id',$nip);
        $this->db->delete('tb_user');
    }

    public function deletefotorestitusi($nip){
        $this->db->where('id',$nip);
        $this->db->delete('tb_restitusi');
    }

    function restitusi_report($no_restitusi){

        $this->db->select('*');
        $this->db->from('users_table');
        $this->db->join('tb_restitusi', 'tb_restitusi.id_user = users_table.id');
        $this->db->order_by('id_restitusi', 'DESC');
        $this->db->where('no_restitusi', $no_restitusi);
        $query = $this->db->get();
        return $query->result_array();

        /*$this->db->select('*');    
        $this->db->from('tb_restitusi');
        $this->db->join('users_table', 'tb_restitusi.id_user = users_table.id');
        $this->db->join('tb_komentar', 'tb_restitusi.id_komentar = tb_komentar.id_komentar');
        $this->db->order_by('tb_restitusi.id_restitusi', 'DESC');
        $query = $this->db->get();
        return $query->result_array();*/

        
        /*return $this->db->get('tb_restitusi')->result_array();*/
        /*$this->db->get_where('id_restitusi', 'DESC');*/
        /*$query = $this->db->get_where('tb_restitusi',array('no_restitusi'=>$no_restitusi));
        return $query->row_array();*/
    }

    function restitusi_agenda($no_restitusi){

       /* $this->db->select('*');
        $this->db->from('tb_restitusi');
        $this->db->join('tb_agenda', 'tb_agenda.no_restitusi = tb_restitusi.no_restitusi');
        $this->db->order_by('id_restitusi', 'DESC');
        $this->db->where('tb_restitusi.no_restitusi', $no_restitusi);*/
        $this->db->select('*');
        $this->db->from('users_table');
        $this->db->join('tb_restitusi', 'tb_restitusi.id_user = users_table.id');
        $this->db->join('tb_agenda', 'tb_agenda.no_restitusi = tb_restitusi.no_restitusi');
        $this->db->where('tb_restitusi.no_restitusi', $no_restitusi);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function prosesupload()
        {
                $config['upload_path']          = './gambar/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = '10000';
                $config['max_width']            = '5000';
                $config['max_height']           = '5000';

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('tiket_pesawat'))
                {
                    echo 'gagal';
                }
                else
                {
                    
                   $img = $this->upload->data();
                   $gambar = $img['file_name'];
                   $nip = $this->input->post('nip',true);
                   $nama = $this->input->post('nama_pegawai',true);

                   $data = array(
                        'id' => $nip,
                        'nama_foto' => $nama,
                        'gambar' => $gambar
                        );

                        $this->db->insert('tb_restitusi', $data);
                   //echo "behasil upload";
                }
        }
}

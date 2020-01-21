<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Report extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_berkas($no_restitusi){
		return $this->db->get_where('tb_restitusi',array('no_restitusi'=>$no_restitusi))->row_array();
	}

	function restitusi($no_restitusi){

        $this->db->select('*');
        $this->db->from('users_table');
        $this->db->join('tb_restitusi', 'tb_restitusi.id_user = users_table.id');
        $this->db->order_by('id_restitusi', 'DESC');
        $this->db->where('no_restitusi', $no_restitusi);
        $query = $this->db->get();
        return $query->result_array();
    }

    function sppd($no_restitusi){

        /*$this->db->select('*');
        $this->db->from('users_table');
        $this->db->join('tb_restitusi', 'tb_restitusi.id_user = users_table.id');
        $this->db->join('tb_agenda', 'tb_agenda.no_restitusi = tb_restitusi.no_restitusi');
        $this->db->where($no_restitusi);*/
        $this->db->select('*');
        $this->db->from('users_table');
        $this->db->join('tb_restitusi', 'tb_restitusi.id_user = users_table.id');
        $this->db->join('tb_agenda', 'tb_agenda.no_restitusi = tb_restitusi.no_restitusi');
        $this->db->where('tb_restitusi.no_restitusi', $no_restitusi);
        $query = $this->db->get();
        return $query->result_array();


        /*$this->db->select('*');    
        $this->db->from('table1');
        $this->db->join('table2', 'table1.id = table2.id');
        $this->db->join('table3', 'table1.id = table3.id');*/
    }


    /*public function datasiswa(){
        $this->db->select('*');
        $this->db->from('tb_siswa');
        $this->db->order_by('nim');
        $data = $this->db->get('');
        return $data;
    }

    public function duatable() {
		$this->db->select('*');
		$this->db->from('users_table');
		$this->db->join('tb_restitusi','tb_restitusi.id_user=users_table.id_user');
		$this->db->order_by('id_restitusi', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}*/
}
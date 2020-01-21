<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}

	public function ceklogin()
	{
		if (isset($_POST['btLogin'])) {
			$user = $this->input->post('nip', true);
			$pass = $this->input->post('password', true);
			
			$cek = $this->MLogin->proseslogin($user,$pass);

			$dataUser=$this->db->get_where('tb_admin', ['nip'=>$user]);

			foreach ($dataUser->result() as $data) {
				$session = array(
									'nip'=>$data -> nip,
									'password'=>$data -> password,
									'nama_admin' => $data -> nama_admin,
									'gambar'=>$data -> gambar, 

								);

				$this->session->set_userdata($session);


			}

			$hasil = count($cek);

			if ($hasil >0 ) {
				$siapa_yg_login = $this->db->get_where('tb_admin', array('nip'=>$user, 'password'=>$pass))->row();
				if ($siapa_yg_login->level_user == 'admin') {
					/*$this->session->set_userdata($session);*/
					redirect('index.php/Dashboard/index');
				}
				else if ($siapa_yg_login->level_user == 'pegawai') {
					redirect('index.php/Dashboard/guru');
				}
				else if ($siapa_yg_login->level_user == 'siswa') {
					redirect('index.php/Dashboard/siswa');
				}
			}
			else{
				//echo "Username/Password Salah";
				redirect('index.php/Login/index');
			}

		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		/*$this->session->unset_userdata(array(
				'nip',
				'password',
				'nama_admin',
				'gambar'
			));*/
		redirect('index.php/Login/index');

		/*redirect(base_url('login'));*/
	}
}


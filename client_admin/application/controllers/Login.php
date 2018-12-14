<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	var $API ="";

	function __construct() {
		parent::__construct();
		$this->API = "http://localhost/SI_Pelayanan_Antrian_Puskesmas/server/";
	}
	
	public function index()
	{
		if (isset($_POST['login'])) {
			$petugas = json_decode($this->curl->simple_get($this->API.'/petugas'));

			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			foreach ($petugas as $pet) {
				if ($pet->username == $username && $pet->password==$password) {
					$array = array(
						'id_petugas' => $pet->id_petugas
					);

					$this->session->set_userdata( $array );
					$this->session->set_flashdata('hasil', 'Berhasil Login Petugas');
					redirect('admin');
				}
			}
			$this->session->set_flashdata('hasil', 'Gagal Login');
		}
		$this->load->view('login_view');
	}

	public function logout()
	{
		$this->session->unset_userdata('id_pasien');
		session_destroy();
		session_unset();
		redirect('login');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	var $API ="";

	function __construct() {
		parent::__construct();
        if (!$this->session->userdata('id_petugas')) {
			$this->session->set_flashdata('hasil', 'Anda belum Login');
			redirect('login');
		}
		$this->API = "http://localhost/SI_Pelayanan_Antrian_Puskesmas/server/";
	}

	public function index()
	{
		$data['pasien'] = json_decode($this->curl->simple_get($this->API.'/pasien'));
		$this->load->view('admin/admin_view', $data);
	}

	public function tambahPasien()
	{
		if (isset($_POST['submit'])) {
			$data = array(
				'nama_pasien'	=> $this->input->post('nama_pasien'),
				'tgl_lahir'		=> $this->input->post('tgl_lahir'),
				'jenis_kelamin'	=> $this->input->post('jenis_kelamin'),
				'alamat'		=> $this->input->post('alamat'),
				'pekerjaan'		=> $this->input->post('pekerjaan'),
				'no_hp'			=> $this->input->post('no_hp'),
				'id_jenis_kartu'=> $this->input->post('id_jenis_kartu'),
				'username'		=> $this->input->post('username'),
				'password'		=> $this->input->post('password'));

			// var_dump($data);
			// die();

			$insert =  $this->curl->simple_post($this->API.'/pasien', $data, array(CURLOPT_BUFFERSIZE => 10)); 

			if($insert) {
				$this->session->set_flashdata('hasil','Insert Data Berhasil');
				redirect('admin');
			} else {
				$this->session->set_flashdata('hasil','Insert Data Gagal');
			}
		}

		$data['jenis_kartu'] = json_decode($this->curl->simple_get($this->API.'/jenis_kartu'));		
		$this->load->view('admin/admin_insert_pasien', $data);
	}
}

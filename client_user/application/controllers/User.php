<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	var $API ="";

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_pasien')) {
			$this->session->set_flashdata('hasil', 'Anda belum Login');
			redirect('login');
		}
		$this->API = "http://localhost/SI_Pelayanan_Antrian_Puskesmas/server/";
	}

	public function index()
	{
		// echo date('Y-m-d');
		// die();
		$this->load->view('user/user_view');
	}

	public function daftar()
	{
		$data['poli_umum'] = json_decode($this->curl->simple_get($this->API.'/registrasi/antrian/1'));
		$data['poli_gigi'] = json_decode($this->curl->simple_get($this->API.'/registrasi/antrian/2'));
		$data['poli_kia'] = json_decode($this->curl->simple_get($this->API.'/registrasi/antrian/3'));

		if (empty($data['poli_umum'][0]->no_antrian) || empty($data['poli_gigi'][0]->no_antrian) || empty($data['poli_kia'][0]->no_antrian)) {
			$no_antrian = 0;
		}

		switch ($this->input->post('id_poli')) {
			case 1:
				$no_antrian = $data['poli_umum'][0]->no_antrian + 1; 
				break;
			
			case 2:
				$no_antrian = $data['poli_gigi'][0]->no_antrian + 1; 
				break;
			
			case 3:
				$no_antrian = $data['poli_kia'][0]->no_antrian + 1;
				break;
			
			default:
				$no_antrian = 1;
				break;
		}

		if (isset($_POST['daftar'])) {

			$data = array(
				'id_pasien'		=> $this->input->post('id_pasien'),
				'id_poli'		=> $this->input->post('id_poli'),
				'id_resep'		=> '',
				'tanggal'		=> date('Y-m-d'),
				'no_antrian'	=> $no_antrian,
				'status'		=> 'belum'
			);

			// var_dump($data);
			// die();

			$insert =  $this->curl->simple_post($this->API.'/registrasi', $data, array(CURLOPT_BUFFERSIZE => 10)); 

			if($insert) {
				$this->session->set_flashdata('hasil','Berhasil Registrasi Berobat');
				redirect('user');
			} else {
				$this->session->set_flashdata('hasil','Gagal Registrasi');
			}
		}

		$data['DaftarPoliPasien'] = json_decode($this->curl->simple_get($this->API.'/registrasi/DaftarPoliPasien/'.$this->session->userdata('id_pasien')));

		if (empty($data['DaftarPoliPasien'])) {
			$this->session->set_flashdata('hasil', 'Anda Sudah Daftar Di semua Poli');
			redirect('user');
		}

		$data['registrasi'] = json_decode($this->curl->simple_get($this->API.'/registrasi'));

		$this->load->view('user/user_daftar', $data);
	}

	public function antri()
	{
		$data['poli_umum'] = json_decode($this->curl->simple_get($this->API.'/registrasi/antrian/1'));
		$data['poli_gigi'] = json_decode($this->curl->simple_get($this->API.'/registrasi/antrian/2'));
		$data['poli_kia'] = json_decode($this->curl->simple_get($this->API.'/registrasi/antrian/3'));

		$this->load->view('user/user_antri', $data);
	}
}

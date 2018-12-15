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

		$antrian_poli_umum	= json_decode($this->curl->simple_get($this->API.'/registrasi/antrian/1'));
		$antrian_poli_gigi	= json_decode($this->curl->simple_get($this->API.'/registrasi/antrian/2'));
		$antrian_poli_kia	= json_decode($this->curl->simple_get($this->API.'/registrasi/antrian/3'));

		// if (!empty($antrian_poli_umum[1]->no_hp) && $this->session->userdata('antrian_poli_umum') == false) {
		if (!empty($antrian_poli_umum[1]->no_hp)) {
			// $array = array(
			// 	'antrian_poli_umum' => true
			// );
			
			// $this->session->sess_expiration = '1800';
			// $this->session->set_userdata( $array );

			$teks = rawurlencode("Perhatian!! Antrian *Poli Umum* Anda Akan Segera dipanggil

TEAM_SI_Pelayanan_Antrian_Puskesmas");

			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://panel.apiwha.com/send_message.php?apikey=93BZQQEHNKFYOMN96PIF&number=".$antrian_poli_umum[1]->no_hp."&text=".$teks,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
			));

			// echo "https://panel.apiwha.com/send_message.php?apikey=93BZQQEHNKFYOMN96PIF&number=".$antrian_poli_umum[1]->no_hp."&text=".$teks;
			// die();

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
				echo "cURL Error #:" . $err;
			} else {
				echo $response;
				redirect('poli');
			}
		}

// 		if (!empty($antrian_poli_gigi[1]->no_hp)) {
// 			// $array = array(
// 			// 	'antrian_poli_gigi' => true
// 			// );
			
// 			// $this->session->sess_expiration = '1800';
// 			// $this->session->set_userdata( $array );

// 			$teks = rawurlencode("Perhatian!! Antrian Poli Gigi Anda Akan Segera dipanggil

// TEAM_SI_Pelayanan_Antrian_Puskesmas");

// 			$curl = curl_init();

// 			curl_setopt_array($curl, array(
// 				CURLOPT_URL => "https://panel.apiwha.com/send_message.php?apikey=93BZQQEHNKFYOMN96PIF&number=".$antrian_poli_gigi[1]->no_hp."&text=".$teks,
// 				CURLOPT_RETURNTRANSFER => true,
// 				CURLOPT_ENCODING => "",
// 				CURLOPT_MAXREDIRS => 10,
// 				CURLOPT_TIMEOUT => 30,
// 				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
// 				CURLOPT_CUSTOMREQUEST => "GET",
// 			));

// 			// echo "https://panel.apiwha.com/send_message.php?apikey=93BZQQEHNKFYOMN96PIF&number=".$antrian_poli_gigi[1]->no_hp."&text=".$teks;
// 			// die();

// 			// $response = curl_exec($curl);
// 			// $err = curl_error($curl);

// 			curl_close($curl);
// 		}

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

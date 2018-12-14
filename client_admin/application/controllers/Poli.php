<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poli extends CI_Controller {
	var $API ="";
	var $id_sementara = 0;

	function __construct() {
		parent::__construct();
		$this->API = "http://localhost/SI_Pelayanan_Antrian_Puskesmas/server/";
	}

	public function index()
	{
		$data['registrasi'] = json_decode($this->curl->simple_get($this->API.'/registrasi'));
		$this->load->view('poli/poli_view', $data);
	}


	public function GantiStatus()
	{
		if (isset($_POST['submit'])) {
			$dataResep = array(
				'id_resep'			=> $this->input->post('id_resep'),
				'id_detail_resep'	=> $this->input->post('id_detail_resep'),
				'status'			=> 'Belum'
			);

			$dataRegistrasi = array(
				'id_registrasi'	=> $this->uri->segment(3),
				'status_antrian'=> $this->input->post('status_antrian'),
				'id_resep'		=> $this->input->post('id_resep')
			);

			// var_dump($data);
			// die();

			$insert =  $this->curl->simple_put($this->API.'/obat', $data, array(CURLOPT_BUFFERSIZE => 10)); 

			if($insert) {
				$this->session->set_flashdata('hasil','Update Data Berhasil');
				redirect('apoteker/obat');
			} else {
				$this->session->set_flashdata('hasil','Update Data Gagal');
			}
		}

		if (isset($_POST['tambahObat'])) {
			$maxIDDetailResep = json_decode($this->curl->simple_get($this->API.'/detail_resep/maxID'));
			if ($this->id_sementara != $this->uri->segment(3)) {
				$maxIDDetailResep += 1;
			}

			$dataDetailResep = array(
				'id_detail_resep'	=> $maxIDDetailResep,
				'id_obat'			=> $this->input->post('id_obat'),
				'jumlah'			=> $this->input->post('jumlah')
			);

			$this->id_sementara = $id_registrasi;
		}

		$data['obat'] = json_decode($this->curl->simple_get($this->API.'/obat'));
		$data['registrasi'] = json_decode($this->curl->simple_get($this->API.'/registrasi?id_registrasi='.$this->uri->segment(3)));
		// var_dump($data['registrasi']);
		// die();
		$this->load->view('poli/ganti_status_view', $data);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poli extends CI_Controller {
	var $API ="";
	var $id_sementara = 0;
	var $uri_sementara = 0;

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
				'id_resep'			=> '',
				'id_detail_resep'	=> $this->session->userdata('id_sementara'),
				'status'			=> 'Belum'
			);

			// var_dump($dataResep);
			// die();

			$lastID = json_decode($this->curl->simple_get($this->API.'/resep/lastID'));

			$dataRegistrasi = array(
				'id_registrasi'	=> $this->uri->segment(3),
				'id_resep'		=> $lastID[0]->id_resep,
				'status_antrian'=> 'selesai'
			);

			// var_dump($dataRegistrasi);
			// die();

			$insertResep =  $this->curl->simple_post($this->API.'/resep', $dataResep, array(CURLOPT_BUFFERSIZE => 10)); 
			$updateRegistrasi =  $this->curl->simple_put($this->API.'/registrasi', $dataRegistrasi, array(CURLOPT_BUFFERSIZE => 10)); 

			var_dump($insertResep);
			var_dump($updateRegistrasi);
			// die();

			if($insertResep) {
				$this->session->set_flashdata('hasil','Berhasil menambahkan resep untuk pasien '.$this->input->post('nama_pasien'));
				redirect('apoteker');
			} else {
				$this->session->set_flashdata('hasil','Gagal menambahkan resep untuk pasien '.$this->input->post('nama_pasien'));
			}

			$this->session->sess_destroy();
		}

		if (isset($_POST['tambahObat'])) {
			$maxIDDetailResep = json_decode($this->curl->simple_get($this->API.'/detail_resep/maxID'));

			// echo $this->uri_sementara.'<br>';
			// echo $this->id_sementara.'<br>';
			// echo $this->session->userdata('uri_sementara').'<br>';
			// echo $this->uri->segment(3).'<br><br><br>';

			if ($this->session->userdata('uri_sementara') != $this->uri->segment(3)) {
				$this->id_sementara = (int)$maxIDDetailResep[0]->id_detail_resep;
				$this->id_sementara = (int)$this->id_sementara + 1;
				// $this->uri_sementara = $this->uri->segment(3);
				$array = array(
					'uri_sementara' => $this->uri->segment(3),
					'id_sementara' => $this->id_sementara
				);
				
				$this->session->set_userdata( $array );
				$this->uri_sementara = $this->session->userdata('id_detail_resep');	
			}

			// echo $this->uri_sementara.'<br>';
			// echo $this->id_sementara.'<br>';
			// echo $this->uri->segment(3).'<br>';
			// die();

			$id_obat = substr($this->input->post('tambahObat'), 13);

			$data = array(
				'id_detail_resep'	=> $this->id_sementara,
				'id_obat'			=> $id_obat,
				'id_registrasi'		=> $this->input->post('id_registrasi'),
				'nama_poli'			=> $this->input->post('nama_poli'),
				'no_antrian'		=> $this->input->post('no_antrian'),
				'nama_pasien'		=> $this->input->post('nama_pasien')
			);

			$dataDetailResep = array(
				'id_detail_resep'	=> $this->id_sementara,
				'id_obat'			=> $id_obat
			);

			$obat = json_decode($this->curl->simple_get($this->API.'/obat?id_obat='.$id_obat));
			$jumlahStok = (int)$obat[0]->jumlah;
			$jumlahStok -= 1;

			// var_dump($obat);
			// die();

			$dataStok = array(
				'id_obat'	=> $obat[0]->id_obat,
				'jumlah'	=> $jumlahStok
			);

			var_dump($dataStok);

			$insertDetailResep =  $this->curl->simple_post($this->API.'/detail_resep', $dataDetailResep, array(CURLOPT_BUFFERSIZE => 10)); 
			$updateJumlahStok =  $this->curl->simple_put($this->API.'/obat/true', $dataStok, array(CURLOPT_BUFFERSIZE => 10)); 

			if($insertDetailResep) {
				$this->session->set_flashdata('hasil','Berhasil menambahkan obat '.$obat[0]->nama_obat);
			} else {
				$this->session->set_flashdata('hasil','Gagal menambahkan obat '.$obat[0]->nama_obat);
			}
		}

		$data['obat'] = json_decode($this->curl->simple_get($this->API.'/obat'));
		$data['registrasi'] = json_decode($this->curl->simple_get($this->API.'/registrasi?id_registrasi='.$this->uri->segment(3)));
		// var_dump($data['registrasi']);
		// die();
		$this->load->view('poli/ganti_status_view', $data);
	}
}

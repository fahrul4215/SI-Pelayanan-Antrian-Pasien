<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apoteker extends CI_Controller {

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
		// echo date('Y-m-d');
		// die();
		$data['resep'] = json_decode($this->curl->simple_get($this->API.'/resep'));
		$this->load->view('apoteker/apoteker_view', $data);
	}

	public function obat()
	{
		$data['obat'] = json_decode($this->curl->simple_get($this->API.'/obat'));
		$this->load->view('apoteker/apoteker_obat_view', $data);
	}

	public function obat_create()
	{
		if (isset($_POST['submit'])) {
			$data = array(
				'exp_date'		=> $this->input->post('exp_date'),
				'jumlah'		=> $this->input->post('jumlah'),
				'nama_obat'		=> $this->input->post('nama_obat'),
				'jenis_obat'	=> $this->input->post('jenis_obat'));

			// var_dump($data);
			// die();

			$insert =  $this->curl->simple_post($this->API.'/obat', $data, array(CURLOPT_BUFFERSIZE => 10)); 

			if($insert) {
				$this->session->set_flashdata('hasil','Insert Data Berhasil');
				redirect('apoteker/obat');
			} else {
				$this->session->set_flashdata('hasil','Insert Data Gagal');
			}
		}

		$this->load->view('apoteker/apoteker_obat_create');
	}

	public function obat_update()
	{
		if (isset($_POST['submit'])) {
			$data = array(
				'id_obat'		=> $this->input->post('id_obat'),
				'exp_date'		=> $this->input->post('exp_date'),
				'jumlah'		=> $this->input->post('jumlah'),
				'nama_obat'		=> $this->input->post('nama_obat'),
				'jenis_obat'	=> $this->input->post('jenis_obat')
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

		$data['obat'] = json_decode($this->curl->simple_get($this->API.'/obat?id_obat='.$this->uri->segment(3)));
		$this->load->view('apoteker/apoteker_obat_update', $data);
	}

	public function sudah_selesai()
	{
		$data = array(
			'id_resep'	=> $this->uri->segment(3),
			'status'	=> 'Sudah'
		);

		// var_dump($data);
		// die();		

		$insert =  $this->curl->simple_put($this->API.'/resep', $data, array(CURLOPT_BUFFERSIZE => 10));

		if($insert) {
			$this->session->set_flashdata('hasil','Antrian selesai');
		} else {
			$this->session->set_flashdata('hasil','Antrian gagal');
		}
		redirect('apoteker');
	}
}

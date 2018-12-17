<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Registrasi extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
	}

    // show data registrasi
	function index_get() {
		$id_registrasi = $this->get('id_registrasi');
	
		$this->db->join('pasien pas', 'pas.id_pasien = r.id_pasien', 'inner');
		$this->db->join('poli pol', 'pol.id_poli = r.id_poli', 'inner');
		// $this->db->join('resep res', 'res.id_resep = r.id_resep', 'left');
		$this->db->where('tanggal', date('Y-m-d'));
		$this->db->where('status_antrian', 'belum');

		if ($id_registrasi != '') {
			$this->db->where('r.id_registrasi', $id_registrasi);
		}

		$registrasi = $this->db->get('registrasi r')->result();
		$this->response($registrasi, 200);
	}

	function DaftarPoliPasien_get($id_pasien)
	{
		$this->db->select('p.id_poli');
		$this->db->join('poli p', 'r.id_poli = p.id_poli', 'inner');
		$this->db->where('r.id_pasien', $id_pasien);
		$this->db->where('r.tanggal', date('Y-m-d'));
		$this->db->where('r.status_antrian', 'belum');
		$registrasi = $this->db->get('registrasi r')->result();

		$array_poli = array();

		foreach ($registrasi as $r) {
			$array_poli[] = $r->id_poli;
		}

		if (!empty($array_poli)) {
			$this->db->where_not_in('id_poli', $array_poli);
		}

		$poliTersisa = $this->db->get('poli')->result();
		$this->response($poliTersisa, 200);
	}

	function antrian_get($id_poli) {
		// $this->db->select_max('r.no_antrian');
		$this->db->select('r.no_antrian, pas.no_hp');
		$this->db->join('pasien pas', 'pas.id_pasien = r.id_pasien', 'inner');
		$this->db->where('r.id_poli', $id_poli);
		$this->db->where('r.tanggal', date('Y-m-d'));
		$this->db->where('r.status_antrian', 'belum');
		$this->db->order_by('r.no_antrian', 'desc');
		$registrasi = $this->db->get('registrasi r')->result();
		$this->response($registrasi, 200);
	}

	// function getAntrian_get($id_poli) {
	// 	$this->db->select_max('no_antrian');
	// 	$this->db->where('id_poli', $id_poli);
	// 	$registrasi = $this->db->get('registrasi')->result();
	// 	$this->response($registrasi, 200);
	// }

	function antrianKurangSedikit_get() {
		$this->db->select('no_antrian');
		$this->db->join('pasien pas', 'pas.id_pasien = r.id_pasien', 'inner');
		$this->db->join('poli pol', 'pol.id_poli = r.id_poli', 'inner');
		$this->db->where('tanggal', date('Y-m-d'));
		$this->db->where('status_antrian', 'belum');

		if ($id_registrasi != '') {
			$this->db->where('r.id_registrasi', $id_registrasi);
		}

		$registrasi = $this->db->get('registrasi r')->result();
		$this->response($registrasi, 200);
	}

    // insert new data to registrasi
	function index_post() {
		$data = array(
			'id_registrasi'	=> '',
			'id_pasien'		=> $this->post('id_pasien'),
			'id_poli'		=> $this->post('id_poli'),
			'id_resep'		=> $this->post('id_resep'),
			'tanggal'		=> $this->post('tanggal'),
			'no_antrian'	=> $this->post('no_antrian'),
			'status_antrian'=> $this->post('status')
		);

		$insert = $this->db->insert('registrasi', $data);

		if ($insert) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

    // update data registrasi
	function index_put() {
		$id_registrasi = $this->put('id_registrasi');
		$data = array(
			'id_resep'		=> $this->put('id_resep'),
			'status_antrian'=> $this->put('status_antrian') 
		);

		$this->db->where('id_registrasi', $id_registrasi);
		$update = $this->db->update('registrasi', $data);

		if ($update) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

    // delete registrasi
	function index_delete() {
		$id_registrasi = $this->delete('id_registrasi');
		$this->db->where('id_registrasi', $id_registrasi);
		$delete = $this->db->delete('registrasi');

		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}
}

/* End of file Registrasi.php */
/* Location: ./application/controllers/Registrasi.php */
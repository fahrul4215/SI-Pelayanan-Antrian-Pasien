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
		if ($id_registrasi == '') {
			$registrasi = $this->db->get('registrasi')->result();
		} else {
			$this->db->where('id_registrasi', $id_registrasi);
			$registrasi = $this->db->get('registrasi')->result();
		}
		$this->response($registrasi, 200);
	}

    // insert new data to registrasi
	function index_post() {
		$data = array(
			'id_registrasi'		=> $this->post('id_registrasi'),
			'nama'          => $this->post('nama'),
			'id_jurusan'    => $this->post('id_jurusan'),
			'alamat'        => $this->post('alamat'));
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
			'id_registrasi'       => $this->put('id_registrasi'),
			'nama'      => $this->put('nama'),
			'id_jurusan'=> $this->put('id_jurusan'),
			'alamat'    => $this->put('alamat'));
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
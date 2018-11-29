<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Dokter extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
	}

    // show data dokter
	function index_get() {
		$id_dokter = $this->get('id_dokter');
		if ($id_dokter == '') {
			$dokter = $this->db->get('dokter')->result();
		} else {
			$this->db->where('id_dokter', $id_dokter);
			$dokter = $this->db->get('dokter')->result();
		}
		$this->response($dokter, 200);
	}

    // insert new data to dokter
	function index_post() {
		$data = array(
			'id_dokter'     => $this->post('id_dokter'),
			'nama'          => $this->post('nama'),
			'id_jurusan'    => $this->post('id_jurusan'),
			'alamat'        => $this->post('alamat'));
		$insert = $this->db->insert('dokter', $data);
		if ($insert) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

    // update data dokter
	function index_put() {
		$id_dokter = $this->put('id_dokter');
		$data = array(
			'id_dokter'       => $this->put('id_dokter'),
			'nama'      => $this->put('nama'),
			'id_jurusan'=> $this->put('id_jurusan'),
			'alamat'    => $this->put('alamat'));
		$this->db->where('id_dokter', $id_dokter);
		$update = $this->db->update('dokter', $data);
		if ($update) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

    // delete dokter
	function index_delete() {
		$id_dokter = $this->delete('id_dokter');
		$this->db->where('id_dokter', $id_dokter);
		$delete = $this->db->delete('dokter');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

}

/* End of file Dokter.php */
/* Location: ./application/controllers/Dokter.php */
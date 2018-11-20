<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Pasien extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
	}

    // show data pasien
	function index_get() {
		$id_pasien = $this->get('id_pasien');
		if ($id_pasien == '') {
			$pasien = $this->db->get('pasien')->result();
		} else {
			$this->db->where('id_pasien', $id_pasien);
			$pasien = $this->db->get('pasien')->result();
		}
		$this->response($pasien, 200);
	}

    // insert new data to pasien
	function index_post() {
		$data = array(
			'id_pasien'           => $this->post('id_pasien'),
			'nama'          => $this->post('nama'),
			'id_jurusan'    => $this->post('id_jurusan'),
			'alamat'        => $this->post('alamat'));
		$insert = $this->db->insert('pasien', $data);
		if ($insert) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

    // update data pasien
	function index_put() {
		$id_pasien = $this->put('id_pasien');
		$data = array(
			'id_pasien'       => $this->put('id_pasien'),
			'nama'      => $this->put('nama'),
			'id_jurusan'=> $this->put('id_jurusan'),
			'alamat'    => $this->put('alamat'));
		$this->db->where('id_pasien', $id_pasien);
		$update = $this->db->update('pasien', $data);
		if ($update) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

    // delete pasien
	function index_delete() {
		$id_pasien = $this->delete('id_pasien');
		$this->db->where('id_pasien', $id_pasien);
		$delete = $this->db->delete('pasien');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

}

/* End of file Pasien.php */
/* Location: ./application/controllers/Pasien.php */
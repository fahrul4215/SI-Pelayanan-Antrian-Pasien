<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Obat extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
	}

    // show data obat
	function index_get() {
		$id_obat = $this->get('id_obat');
		if ($id_obat == '') {
			$obat = $this->db->get('obat')->result();
		} else {
			$this->db->where('id_obat', $id_obat);
			$obat = $this->db->get('obat')->result();
		}
		$this->response($obat, 200);
	}

    // insert new data to obat
	function index_post() {
		$data = array(
			'id_obat'     => $this->post('id_obat'),
			'nama'          => $this->post('nama'),
			'id_jurusan'    => $this->post('id_jurusan'),
			'alamat'        => $this->post('alamat'));
		$insert = $this->db->insert('obat', $data);
		if ($insert) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

    // update data obat
	function index_put() {
		$id_obat = $this->put('id_obat');
		$data = array(
			'id_obat'       => $this->put('id_obat'),
			'nama'      => $this->put('nama'),
			'id_jurusan'=> $this->put('id_jurusan'),
			'alamat'    => $this->put('alamat'));
		$this->db->where('id_obat', $id_obat);
		$update = $this->db->update('obat', $data);
		if ($update) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

    // delete obat
	function index_delete() {
		$id_obat = $this->delete('id_obat');
		$this->db->where('id_obat', $id_obat);
		$delete = $this->db->delete('obat');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

}

/* End of file Obat.php */
/* Location: ./application/controllers/Obat.php */
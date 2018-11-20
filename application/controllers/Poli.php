<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Poli extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
	}

    // show data poli
	function index_get() {
		$id_poli = $this->get('id_poli');
		if ($id_poli == '') {
			$poli = $this->db->get('poli')->result();
		} else {
			$this->db->where('id_poli', $id_poli);
			$poli = $this->db->get('poli')->result();
		}
		$this->response($poli, 200);
	}

    // insert new data to poli
	function index_post() {
		$data = array(
			'id_poli'		=> $this->post('id_poli'),
			'nama'          => $this->post('nama'),
			'id_jurusan'    => $this->post('id_jurusan'),
			'alamat'        => $this->post('alamat'));
		$insert = $this->db->insert('poli', $data);
		if ($insert) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

    // update data poli
	function index_put() {
		$id_poli = $this->put('id_poli');
		$data = array(
			'id_poli'       => $this->put('id_poli'),
			'nama'      => $this->put('nama'),
			'id_jurusan'=> $this->put('id_jurusan'),
			'alamat'    => $this->put('alamat'));
		$this->db->where('id_poli', $id_poli);
		$update = $this->db->update('poli', $data);
		if ($update) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

    // delete poli
	function index_delete() {
		$id_poli = $this->delete('id_poli');
		$this->db->where('id_poli', $id_poli);
		$delete = $this->db->delete('poli');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

}

/* End of file Poli.php */
/* Location: ./application/controllers/Poli.php */
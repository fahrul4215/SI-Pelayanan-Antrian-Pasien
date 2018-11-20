<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Resep extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
	}

    // show data resep
	function index_get() {
		$id_resep = $this->get('id_resep');
		if ($id_resep == '') {
			$resep = $this->db->get('resep')->result();
		} else {
			$this->db->where('id_resep', $id_resep);
			$resep = $this->db->get('resep')->result();
		}
		$this->response($resep, 200);
	}

    // insert new data to resep
	function index_post() {
		$data = array(
			'id_resep'           => $this->post('id_resep'),
			'nama'          => $this->post('nama'),
			'id_jurusan'    => $this->post('id_jurusan'),
			'alamat'        => $this->post('alamat'));
		$insert = $this->db->insert('resep', $data);
		if ($insert) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

    // update data resep
	function index_put() {
		$id_resep = $this->put('id_resep');
		$data = array(
			'id_resep'       => $this->put('id_resep'),
			'nama'      => $this->put('nama'),
			'id_jurusan'=> $this->put('id_jurusan'),
			'alamat'    => $this->put('alamat'));
		$this->db->where('id_resep', $id_resep);
		$update = $this->db->update('resep', $data);
		if ($update) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

    // delete resep
	function index_delete() {
		$id_resep = $this->delete('id_resep');
		$this->db->where('id_resep', $id_resep);
		$delete = $this->db->delete('resep');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

}

/* End of file Resep.php */
/* Location: ./application/controllers/Resep.php */
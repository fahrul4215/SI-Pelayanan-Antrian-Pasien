<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Petugas extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
	}

    // show data petugas
	function index_get() {
		$id_petugas = $this->get('id_petugas');
		if ($id_petugas == '') {
			$petugas = $this->db->get('petugas')->result();
		} else {
			$this->db->where('id_petugas', $id_petugas);
			$petugas = $this->db->get('petugas')->result();
		}
		$this->response($petugas, 200);
	}

    // insert new data to petugas
	function index_post() {
		$data = array(
			'id_petugas'           => $this->post('id_petugas'),
			'nama'          => $this->post('nama'),
			'id_jurusan'    => $this->post('id_jurusan'),
			'alamat'        => $this->post('alamat'));
		$insert = $this->db->insert('petugas', $data);
		if ($insert) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

    // update data petugas
	function index_put() {
		$id_petugas = $this->put('id_petugas');
		$data = array(
			'id_petugas'       => $this->put('id_petugas'),
			'nama'      => $this->put('nama'),
			'id_jurusan'=> $this->put('id_jurusan'),
			'alamat'    => $this->put('alamat'));
		$this->db->where('id_petugas', $id_petugas);
		$update = $this->db->update('petugas', $data);
		if ($update) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

    // delete petugas
	function index_delete() {
		$id_petugas = $this->delete('id_petugas');
		$this->db->where('id_petugas', $id_petugas);
		$delete = $this->db->delete('petugas');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

}

/* End of file petugas.php */
/* Location: ./application/controllers/petugas.php */
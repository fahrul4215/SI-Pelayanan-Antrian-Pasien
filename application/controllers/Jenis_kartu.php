<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Jenis_kartu extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
	}

    // show data jenis_kartu
	function index_get() {
		$id_jenis_kartu = $this->get('id_jenis_kartu');
		if ($id_jenis_kartu == '') {
			$jenis_kartu = $this->db->get('jenis_kartu')->result();
		} else {
			$this->db->where('id_jenis_kartu', $id_jenis_kartu);
			$jenis_kartu = $this->db->get('jenis_kartu')->result();
		}
		$this->response($jenis_kartu, 200);
	}

    // insert new data to jenis_kartu
	function index_post() {
		$data = array(
			'id_jenis_kartu'           => $this->post('id_jenis_kartu'),
			'nama'          => $this->post('nama'),
			'id_jurusan'    => $this->post('id_jurusan'),
			'alamat'        => $this->post('alamat'));
		$insert = $this->db->insert('jenis_kartu', $data);
		if ($insert) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

    // update data jenis_kartu
	function index_put() {
		$id_jenis_kartu = $this->put('id_jenis_kartu');
		$data = array(
			'id_jenis_kartu'       => $this->put('id_jenis_kartu'),
			'nama'      => $this->put('nama'),
			'id_jurusan'=> $this->put('id_jurusan'),
			'alamat'    => $this->put('alamat'));
		$this->db->where('id_jenis_kartu', $id_jenis_kartu);
		$update = $this->db->update('jenis_kartu', $data);
		if ($update) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

    // delete jenis_kartu
	function index_delete() {
		$id_jenis_kartu = $this->delete('id_jenis_kartu');
		$this->db->where('id_jenis_kartu', $id_jenis_kartu);
		$delete = $this->db->delete('jenis_kartu');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

}

/* End of file jenis_kartu.php */
/* Location: ./application/controllers/jenis_kartu.php */
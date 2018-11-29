<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Detail_resep extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
	}

    // show data detail_resep
	function index_get() {
		$id_detail_resep = $this->get('id_detail_resep');
		if ($id_detail_resep == '') {
			$detail_resep = $this->db->get('detail_resep')->result();
		} else {
			$this->db->where('id_detail_resep', $id_detail_resep);
			$detail_resep = $this->db->get('detail_resep')->result();
		}
		$this->response($detail_resep, 200);
	}

    // insert new data to detail_resep
	function index_post() {
		$data = array(
			'id_detail_resep'	=> $this->post('id_detail_resep'),
			'nama'          => $this->post('nama'),
			'id_jurusan'    => $this->post('id_jurusan'),
			'alamat'        => $this->post('alamat'));
		$insert = $this->db->insert('detail_resep', $data);
		if ($insert) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

    // update data detail_resep
	function index_put() {
		$id_detail_resep = $this->put('id_detail_resep');
		$data = array(
			'id_detail_resep'       => $this->put('id_detail_resep'),
			'nama'      => $this->put('nama'),
			'id_jurusan'=> $this->put('id_jurusan'),
			'alamat'    => $this->put('alamat'));
		$this->db->where('id_detail_resep', $id_detail_resep);
		$update = $this->db->update('detail_resep', $data);
		if ($update) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

    // delete detail_resep
	function index_delete() {
		$id_detail_resep = $this->delete('id_detail_resep');
		$this->db->where('id_detail_resep', $id_detail_resep);
		$delete = $this->db->delete('detail_resep');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

}

/* End of file detail_resep.php */
/* Location: ./application/controllers/detail_resep.php */
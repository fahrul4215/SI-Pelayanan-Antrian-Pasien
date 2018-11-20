<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class RekamMedis extends REST_Controller {
	
	function __construct($config = 'rest') {
		parent::__construct($config);
	}

    // show data rekam_medis
	function index_get() {
		$id_rekam_medis = $this->get('id_rekam_medis');
		if ($id_rekam_medis == '') {
			$rekam_medis = $this->db->get('rekam_medis')->result();
		} else {
			$this->db->where('id_rekam_medis', $id_rekam_medis);
			$rekam_medis = $this->db->get('rekam_medis')->result();
		}
		$this->response($rekam_medis, 200);
	}

 //    // insert new data to rekam_medis
	// function index_post() {
	// 	$data = array(
	// 		'id_rekam_medis'           => $this->post('id_rekam_medis'),
	// 		'nama'          => $this->post('nama'),
	// 		'id_jurusan'    => $this->post('id_jurusan'),
	// 		'alamat'        => $this->post('alamat'));
	// 	$insert = $this->db->insert('rekam_medis', $data);
	// 	if ($insert) {
	// 		$this->response($data, 200);
	// 	} else {
	// 		$this->response(array('status' => 'fail', 502));
	// 	}
	// }

 //    // update data rekam_medis
	// function index_put() {
	// 	$id_rekam_medis = $this->put('id_rekam_medis');
	// 	$data = array(
	// 		'id_rekam_medis'       => $this->put('id_rekam_medis'),
	// 		'nama'      => $this->put('nama'),
	// 		'id_jurusan'=> $this->put('id_jurusan'),
	// 		'alamat'    => $this->put('alamat'));
	// 	$this->db->where('id_rekam_medis', $id_rekam_medis);
	// 	$update = $this->db->update('rekam_medis', $data);
	// 	if ($update) {
	// 		$this->response($data, 200);
	// 	} else {
	// 		$this->response(array('status' => 'fail', 502));
	// 	}
	// }

 //    // delete rekam_medis
	// function index_delete() {
	// 	$id_rekam_medis = $this->delete('id_rekam_medis');
	// 	$this->db->where('id_rekam_medis', $id_rekam_medis);
	// 	$delete = $this->db->delete('rekam_medis');
	// 	if ($delete) {
	// 		$this->response(array('status' => 'success'), 201);
	// 	} else {
	// 		$this->response(array('status' => 'fail', 502));
	// 	}
	// }

}

/* End of file RekamMedis.php */
/* Location: ./application/controllers/RekamMedis.php */
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
			'id_pasien'		=> $this->post('id_pasien'),
			'nama_pasien'	=> $this->post('nama_pasien'),
			'tgl_lahir'		=> $this->post('tgl_lahir'),
			'jenis_kelamin'	=> $this->post('jenis_kelamin'),
			'alamat'		=> $this->post('alamat'),
			'pekerjaan'		=> $this->post('pekerjaan'),
			'no_hp'			=> $this->post('no_hp'),
			'id_jenis_kartu'=> $this->post('id_jenis_kartu'),
			'username'		=> $this->post('username'),
			'password'		=> md5($this->post('password'))
		);

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

		if (empty($this->put('password'))) {
			$data = array(
				'id_pasien'		=> $this->post('id_pasien'),
				'nama_pasien'	=> $this->post('nama_pasien'),
				'alamat'		=> $this->post('alamat'),
				'pekerjaan'		=> $this->post('pekerjaan'),
				'no_hp'			=> $this->post('no_hp'),
				'username'		=> $this->post('username')
			);
		} else {
			$data = array(
				'id_pasien'		=> $this->post('id_pasien'),
				'nama_pasien'	=> $this->post('nama_pasien'),
				'alamat'		=> $this->post('alamat'),
				'pekerjaan'		=> $this->post('pekerjaan'),
				'no_hp'			=> $this->post('no_hp'),
				'username'		=> $this->post('username'),
				'password'		=> md5($this->post('password'))
			);
		}

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
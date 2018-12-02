<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    var $API ="";
    
    function __construct() {
        parent::__construct();
        $this->API = "http://localhost/SI_Pelayanan_Antrian_Puskesmas/server/";
    }

	public function index()
	{
		$data['pasien'] = json_decode($this->curl->simple_get($this->API.'/pasien'));
		$this->load->view('admin_view', $data);
	}

	public function tambahPasien()
	{
		$this->load->view('admin_insert_pasien');
	}
}

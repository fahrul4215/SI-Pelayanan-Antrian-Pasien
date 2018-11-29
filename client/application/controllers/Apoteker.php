<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apoteker extends CI_Controller {

	public function index()
	{
		$this->load->view('apoteker_view');
	}

	public function obat()
	{
		$this->load->view('apoteker_obat_view');
	}

	public function obat_create()
	{
		$this->load->view('apoteker_obat_create');
	}
}

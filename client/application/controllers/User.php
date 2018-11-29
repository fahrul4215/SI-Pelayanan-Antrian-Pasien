<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$this->load->view('user_view');
	}

	public function daftar()
	{
		$this->load->view('user_daftar');
	}

	public function antri()
	{
		$this->load->view('user_antri');
	}
}

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies

	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Toko thrift',
			'isi' => 'frontend/v_home'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
}

/* End of file Home.php */

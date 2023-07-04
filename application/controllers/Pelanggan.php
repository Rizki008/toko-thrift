<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_auth');
	}

	// List all your items
	public function register()
	{
		$this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
		$this->form_validation->set_rules('no_hp', 'Nomor Telpon', 'required|min_length[11]|max_length[13]', array(
			'required' => '%s Mohon Untuk Diisi !!!',
			'min_length' => '%s Minimal 11 angka !!!',
			'max_length' => '%s Maksimal 13 angka !!!'
		));
		$this->form_validation->set_rules('email', 'Email Pelanggan', 'required|is_unique[pelanggan.email]', array(
			'required' => '%s Mohon Untuk Diisi !!!',
			'is_unique' => '%s Email Sudah Terdaptar'
		));
		$this->form_validation->set_rules('password', 'Password Pelanggan', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
		$this->form_validation->set_rules('ulangi_password', 'Ulangi Password Pelanggan', 'required|matches[password]', array(
			'required' => '%s Mohon Untuk Diisi !!!',
			'matches' => '%s Password Tidak Sama !!!'
		));


		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Regiseter Pelanggan',
				'isi' => 'frontend/login/v_register'
			);
			$this->load->view('frontend/v_wrapper', $data, FALSE);
		} else {
			$data = array(
				'nama_pelanggan' => $this->input->post('nama_pelanggan'),
				'no_hp' => $this->input->post('no_hp'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
			);
			$this->m_auth->register($data);
			$this->session->set_flashdata('pesan', 'Register Berhasil, Silahkan Untuk Login!!!');
			redirect('pelanggan/login');
		}
	}

	public function login()
	{
		$this->form_validation->set_rules('email', 'E-mail', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('password', 'Password', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));

		if ($this->form_validation->run() == TRUE) {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$this->login_pelanggan->login($email, $password);
		}
		$data = array(
			'title' => 'Login Pelanggan',
			'isi' => 'frontend/login/v_login'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}

	public function logout()
	{
		$this->login_pelanggan->logout();
	}
}

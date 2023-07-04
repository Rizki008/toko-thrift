<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login_user
{
	protected $ci;

	public function __construct()
	{
		$this->ci = &get_instance();
		$this->ci->load->model('m_auth');
	}

	public function login($username, $password)
	{
		$cek = $this->ci->m_auth->login_user($username, $password);
		if ($cek) {
			$id_pelanggan = $cek->id_pelanggan;
			$nama_user = $cek->nama_user;
			$username = $cek->username;
			$password = $cek->password;
			$level = $cek->level;

			//session
			$this->ci->session->set_userdata('id_pelanggan', $id_pelanggan);
			$this->ci->session->set_userdata('nama_user', $nama_user);
			$this->ci->session->set_userdata('username', $username);
			$this->ci->session->set_userdata('password', $password);
			$this->ci->session->set_userdata('level', $level);

			if ($level == 1) {
				redirect('admin');
			} elseif ($level == 2) {
				redirect('pemilik');
			}
		} else {
			$this->ci->session->set_flashdata('error', 'username Atau Password Salah');
			redirect('admin/login');
		}
	}

	public function proteksi_halaman()
	{
		if ($this->ci->session->userdata('username') == '') {
			$this->ci->session->set_flashdata('error', 'Anda Belum Login');
			redirect('admin/login');
		}
	}

	public function logout()
	{
		$this->ci->session->unset_userdata('id_pelanggan');
		$this->ci->session->unset_userdata('nama_user');
		$this->ci->session->unset_userdata('username');
		$this->ci->session->set_userdata('password');
		$this->ci->session->set_userdata('level');
		$this->ci->session->set_flashdata('pesan', 'Berhasil LogOut!!!!');
		redirect('admin/login');
	}
}

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_login
{

	protected $ci;

	public function __construct()
	{
		$this->ci = &get_instance();
		$this->ci->load->model('m_auth');
	}

	public function login($username, $password)
	{
		$cek = $this->ci->m_auth->login_pelanggan($username, $password);
		if ($cek) {
			$id_user = $cek->id_user;
			$nama_lengkap = $cek->nama_lengkap;
			$no_hp = $cek->no_hp;
			$username = $cek->username;
			$password = $cek->password;
			$alamat = $cek->alamat;
			$level_user = $cek->level_user;

			//session
			$this->ci->session->set_userdata('id_user', $id_user);
			$this->ci->session->set_userdata('nama_lengkap', $nama_lengkap);
			$this->ci->session->set_userdata('no_hp', $no_hp);
			$this->ci->session->set_userdata('username', $username);
			$this->ci->session->set_userdata('password', $password);
			$this->ci->session->set_userdata('alamat', $alamat);
			$this->ci->session->set_userdata('level_user', $level_user);

			if ($level_user == 'pengelola') {
				redirect('admin');
			} else {
				redirect('bumdes');
			}
		} else {
			$this->ci->session->set_flashdata('error', 'Username Atau Password Salah');
			redirect('auth/login_user');
		}
	}

	public function proteksi_halaman()
	{
		if ($this->ci->session->userdata('username') == '') {
			$this->ci->session->set_flashdata('error', 'Anda Belum Login');
			redirect('auth/user_login');
		}
	}

	public function logout()
	{
		$this->ci->session->unset_userdata('id_user');
		$this->ci->session->unset_userdata('nama_lengkap');
		$this->ci->session->unset_userdata('no_hp');
		$this->ci->session->unset_userdata('username');
		$this->ci->session->unset_userdata('alamat');
		$this->ci->session->unset_userdata('password');
		$this->ci->session->unset_userdata('level_user');
		$this->ci->session->set_flashdata('pesan', 'Berhasil LogOut!!!!');
		redirect('auth/user_login');
	}
}

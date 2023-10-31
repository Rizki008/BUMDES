<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function login_user()
	{
		$this->form_validation->set_rules('username', 'Username', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('password', 'Password', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));

		if ($this->form_validation->run() == TRUE) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->user_login->login($username, $password);
		}
		$data = array(
			'title' => 'Login User',
		);
		$this->load->view('backend/admin/v_login_user', $data, FALSE);
	}

	public function register()
	{
		$this->form_validation->set_rules('nama_lengkap', 'Nama', 'required|is_unique[user.nama_lengkap]', array(
			'required' => '%s Mohon untuk diisi!!!',
			'is_unique' => '%s Sudah Terdaftar!!!'
		));
		$this->form_validation->set_rules('username', 'Email', 'required|is_unique[user.username]', array(
			'required' => '%s Mohon untuk diisi!!!',
			'is_unique' => '%s username Sudah Terdaptar'
		));
		$this->form_validation->set_rules('password', 'password', 'required|min_length[8]', array(
			'required' => '%s Mohon untuk diisi!!!',
			'min_length' => '%s password Minimal 8',
		));
		$this->form_validation->set_rules('no_hp', 'No Telephone', 'required|min_length[12]|max_length[13]', array(
			'required' => '%s Mohon untuk diisi!!!',
			'min_length' => '%s Minimal 11',
			'max_length' => '%s Maksimal 13',
		));
		$this->form_validation->set_rules('alamat', 'Alamat', 'required', array('required' => '%s Mohon untuk diisi!!!'));

		if ($this->form_validation->run() ==  FALSE) {
			$data = array(
				'title' => 'Register Pengunjung',
			);
			$this->load->view('backend/admin/v_registarasi', $data, FALSE);
		} else {
			$data = array(
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'no_hp' => $this->input->post('no_hp'),
				'alamat' => $this->input->post('alamat'),
				'level_user' => 'pengunjung',
			);
			$this->m_auth->register($data);
			$this->session->set_flashdata('pesan', 'Register Berhasi, Silahkan Untuk Login');
			redirect('auth/login_user');
		}
	}

	public function logout_user()
	{
		$this->user_login->logout();
	}
}

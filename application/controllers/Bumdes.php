<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Bumdes extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_bumdes');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Data Informasi Bumdes',
			'bumdes' => $this->m_bumdes->bumdes(),
			'isi' => 'backend/bumdes/v_bumdes',

		);
		$this->load->view('backend/v_wrapper.php', $data, FALSE);
	}

	public function search()
	{
		$keyword = $this->input->post('keyword');
		$data['pencarian'] = $this->m_bumdes->pencarian($keyword);
		$this->load->view('backend/v_wrapper.php', $data);
	}

	// Add a new item
	public function add()
	{
		$this->form_validation->set_rules('judul', 'Judul Informasi', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Informasi', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));


		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/info';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
			$config['max_size']     = '7000';
			$this->upload->initialize($config);
			$field_name = "img";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Tambah Informasi Bumdes',
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'backend/bumdes/v_add'
				);
				$this->load->view('backend/v_wrapper', $data, FALSE);
			} else {
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/info' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'judul' => $this->input->post('judul'),
					'deskripsi' => $this->input->post('deskripsi'),
					'img' => $upload_data['uploads']['file_name'],
				);
				$this->m_bumdes->add($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
				redirect('bumdes');
			}
		}

		$data = array(
			'title' => 'Tambah Informasi Bumdes',
			'isi' => 'backend/bumdes/v_add'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}

	//Edit one item
	public function edit($id_bumdes = NULL)
	{
		$this->form_validation->set_rules('judul', 'Judul Informasi', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Informasi', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));


		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/info';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
			$config['max_size']     = '7000';
			$this->upload->initialize($config);
			$field_name = "img";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Edit Informasi Bumdes',
					'bumdes' => $this->m_bumdes->detail($id_bumdes),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'backend/bumdes/v_edit'
				);
				$this->load->view('backend/v_wrapper', $data, FALSE);
			} else {
				//hapus gambar di folder
				$produk = $this->m_bumdes->detail($id_bumdes);
				if ($produk->gambar !== "") {
					unlink('./assets/info/' . $produk->img);
				}
				//end
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/info' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_bumdes' => $id_bumdes,
					'judul' => $this->input->post('judul'),
					'img' => $upload_data['uploads']['file_name'],
				);
				$this->m_bumdes->edit($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
				redirect('bumdes');
			} //tanpa ganti gambar
			$data = array(
				'id_bumdes' => $id_bumdes,
				'judul' => $this->input->post('judul'),
				'deskripsi' => $this->input->post('deskripsi'),
			);
			$this->m_bumdes->edit($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
			redirect('bumdes');
		}

		$data = array(
			'title' => 'Edit Informasi Bumdes',
			'bumdes' => $this->m_bumdes->detail($id_bumdes),
			'isi' => 'backend/bumdes/v_edit'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}

	//Delete one item
	public function delete($id_bumdes = NULL)
	{
		//hapus gambar
		$produk = $this->m_bumdes->detail($id_bumdes);
		if ($produk->img !== "") {
			unlink('./assets/info/' . $produk->img);
		}

		$data = array(
			'id_bumdes' => $id_bumdes
		);
		$this->m_bumdes->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
		redirect('bumdes');
	}
}

/* End of file Produk.php */

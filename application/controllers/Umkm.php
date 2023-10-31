<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Umkm extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_umkm');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Data UMKM',
			'umkm' => $this->m_umkm->umkm(),
			'isi' => 'backend/umkm/v_umkm',

		);
		$this->load->view('backend/v_wrapper.php', $data, FALSE);
	}

	// Add a new item
	public function add()
	{
		$this->form_validation->set_rules('nama_umkm', 'Nama UMKM', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
		$this->form_validation->set_rules('pemilik', 'pemilik UMKM', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
		$this->form_validation->set_rules('deskripsi', 'Deskripsi UMKM', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/umkm';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
			$config['max_size']     = '6000';
			$this->upload->initialize($config);
			$field_name = "gambar";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Tambah UMKM',
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'backend/umkm/v_add'
				);
				$this->load->view('backend/v_wrapper', $data, FALSE);
			} else {
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/umkm' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'nama_umkm' => $this->input->post('nama_umkm'),
					'pemilik' => $this->input->post('pemilik'),
					'deskripsi' => $this->input->post('deskripsi'),
					'gambar' => $upload_data['uploads']['file_name'],
				);
				$this->m_umkm->add($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
				redirect('umkm');
			}
		}

		$data = array(
			'title' => 'Tambah UMKM',
			'isi' => 'backend/umkm/v_add'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}

	//Edit one item
	public function edit($id_umkm = NULL)
	{
		$this->form_validation->set_rules('nama_umkm', 'Nama UMKM', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
		$this->form_validation->set_rules('pemilik', 'pemilik UMKM', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
		$this->form_validation->set_rules('deskripsi', 'Deskripsi UMKM', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/umkm';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
			$config['max_size']     = '6000';
			$this->upload->initialize($config);
			$field_name = "gambar";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Edit UMKM',
					'umkm' => $this->m_umkm->detail($id_umkm),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'backend/umkm/v_edit'
				);
				$this->load->view('backend/v_wrapper', $data, FALSE);
			} else {
				//hapus gambar di folder
				$umkm = $this->m_umkm->detail($id_umkm);
				if ($umkm->gambar !== "") {
					unlink('./assets/umkm/' . $umkm->gambar);
				}
				//end
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/umkm' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_umkm' => $id_umkm,
					'nama_umkm' => $this->input->post('nama_umkm'),
					'pemilik' => $this->input->post('pemilik'),
					'deskripsi' => $this->input->post('deskripsi'),
					'gambar' => $upload_data['uploads']['file_name'],
				);
				$this->m_umkm->edit($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
				redirect('umkm');
			} //tanpa ganti gambar
			$data = array(
				'id_umkm' => $id_umkm,
				'nama_umkm' => $this->input->post('nama_umkm'),
				'pemilik' => $this->input->post('pemilik'),
				'deskripsi' => $this->input->post('deskripsi'),
			);
			$this->m_umkm->edit($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
			redirect('umkm');
		}

		$data = array(
			'title' => 'Edit UMKM',
			'umkm' => $this->m_umkm->detail($id_umkm),
			'isi' => 'backend/umkm/v_edit'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}

	//Delete one item
	public function delete($id_umkm = NULL)
	{
		//hapus gambar
		$umkm = $this->m_umkm->detail($id_umkm);
		if ($umkm->gambar !== "") {
			unlink('./assets/umkm/' . $umkm->gambar);
		}

		$data = array(
			'id_umkm' => $id_umkm
		);
		$this->m_umkm->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
		redirect('umkm');
	}
}

/* End of file Produk.php */

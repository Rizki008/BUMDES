<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_produk');
		$this->load->model('m_umkm');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Data produk UMKM',
			'produk' => $this->m_produk->produk(),
			'isi' => 'backend/produk/v_produk',

		);
		$this->load->view('backend/v_wrapper.php', $data, FALSE);
	}

	public function search()
	{
		$keyword = $this->input->post('keyword');
		$data['pencarian'] = $this->m_produk->pencarian($keyword);
		$this->load->view('backend/v_wrapper.php', $data);
	}

	// Add a new item
	public function add()
	{
		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
		$this->form_validation->set_rules('id_umkm', 'Nama UMKM', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
		$this->form_validation->set_rules('harga', 'Harga Produk', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
		$this->form_validation->set_rules('berat', 'Berat Produk', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
		$this->form_validation->set_rules('satuan', 'Produk Satuan', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
		$this->form_validation->set_rules('stock', 'stock Produk', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Produk', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));


		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/produk';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
			$config['max_size']     = '6000';
			$this->upload->initialize($config);
			$field_name = "img";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Tambah Produk UMKM',
					'umkm' => $this->m_umkm->umkm(),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'backend/produk/v_add'
				);
				$this->load->view('backend/v_wrapper', $data, FALSE);
			} else {
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/produk' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'nama_produk' => $this->input->post('nama_produk'),
					'id_umkm' => $this->input->post('id_umkm'),
					'harga' => $this->input->post('harga'),
					'berat' => $this->input->post('berat'),
					'satuan' => $this->input->post('satuan'),
					'stock' => $this->input->post('stock'),
					'deskripsi' => $this->input->post('deskripsi'),
					'img' => $upload_data['uploads']['file_name'],
				);
				$this->m_produk->add($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
				redirect('produk');
			}
		}

		$data = array(
			'title' => 'Tambah Produk UMKM',
			'umkm' => $this->m_umkm->umkm(),
			'isi' => 'backend/produk/v_add'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}

	//Edit one item
	public function edit($id_produk = NULL)
	{
		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
		$this->form_validation->set_rules('id_umkm', 'Nama UMKM', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
		$this->form_validation->set_rules('harga', 'Harga Produk', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
		$this->form_validation->set_rules('berat', 'Berat Produk', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
		$this->form_validation->set_rules('satuan', 'Satuan Produk', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
		$this->form_validation->set_rules('stock', 'stock Produk', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Produk', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));


		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/produk';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
			$config['max_size']     = '6000';
			$this->upload->initialize($config);
			$field_name = "img";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Edit UMKM',
					'umkm' => $this->m_umkm->umkm(),
					'produk' => $this->m_produk->detail($id_produk),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'backend/produk/v_edit'
				);
				$this->load->view('backend/v_wrapper', $data, FALSE);
			} else {
				//hapus gambar di folder
				$produk = $this->m_produk->detail($id_produk);
				if ($produk->img !== "") {
					unlink('./assets/produk/' . $produk->img);
				}
				//end
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/produk' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_produk' => $id_produk,
					'nama_produk' => $this->input->post('nama_produk'),
					'id_umkm' => $this->input->post('id_umkm'),
					'harga' => $this->input->post('harga'),
					'berat' => $this->input->post('berat'),
					'satuan' => $this->input->post('satuan'),
					'stock' => $this->input->post('stock'),
					'deskripsi' => $this->input->post('deskripsi'),
					'img' => $upload_data['uploads']['file_name'],
				);
				$this->m_produk->edit($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
				redirect('produk');
			} //tanpa ganti gambar
			$data = array(
				'id_produk' => $id_produk,
				'nama_produk' => $this->input->post('nama_produk'),
				'id_umkm' => $this->input->post('id_umkm'),
				'harga' => $this->input->post('harga'),
				'berat' => $this->input->post('berat'),
				'satuan' => $this->input->post('satuan'),
				'stock' => $this->input->post('stock'),
				'deskripsi' => $this->input->post('deskripsi'),
			);
			$this->m_produk->edit($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
			redirect('produk');
		}

		$data = array(
			'title' => 'Edit Produk UMKM',
			'umkm' => $this->m_umkm->umkm(),
			'produk' => $this->m_produk->detail($id_produk),
			'isi' => 'backend/produk/v_edit'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}

	//Delete one item
	public function delete($id_produk = NULL)
	{
		//hapus gambar
		$produk = $this->m_produk->detail($id_produk);
		if ($produk->img !== "") {
			unlink('./assets/produk/' . $produk->img);
		}

		$data = array(
			'id_produk' => $id_produk
		);
		$this->m_produk->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
		redirect('produk');
	}
}

/* End of file Produk.php */

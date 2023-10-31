<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_saya extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_transaksi');
		$this->load->model('m_pesanan_masuk');
	}

	public function index()
	{
		$data = array(
			'title' => 'Pesanan saya',
			'cart' => $this->m_transaksi->selectCart(),
			'pesanan' => $this->m_transaksi->pesanan(),
			'isi' => 'frontend/keranjang/v_pesanan'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}

	public function bayar($id_pesanan)
	{
		$this->form_validation->set_rules('jml_bayar', 'Atas Nama', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));


		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/bukti_bayar';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
			$config['max_size']     = '5000';
			$this->upload->initialize($config);
			$field_name = "bukti_bayar";
			if (!$this->upload->do_upload($field_name)) {
			} else {
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/bukti_bayar' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_pesanan' => $id_pesanan,
					'jml_bayar' => $this->input->post('jml_bayar'),
					'status_bayar' => '1',
					'bukti_bayar' => $upload_data['uploads']['file_name'],
				);
				$this->m_transaksi->uploadbayar($data);

				$statuspesan = array(
					'id_pesanan' => $id_pesanan,
					'status' => 0,
				);
				$this->m_transaksi->statuspesan($statuspesan);
				$this->session->set_flashdata('pesan', 'Data Berhasil DiUpload !!!');
				redirect('pesanan_saya');
			}
		}
	}

	public function diterima($id_pesanan)
	{
		$data = array(
			'id_pesanan' => $id_pesanan,
			'status' => 3
		);
		$this->m_pesanan_masuk->update_order($data);
		$this->session->set_flashdata('pesan', 'Pesanan Telah Diterima');
		redirect('pesanan_saya');
	}

	public function dibatalkan($id_pesanan)
	{
		$data = array(
			'id_pesanan' => $id_pesanan,
			'status' => 4
		);
		$this->m_pesanan_masuk->update_order($data);
		$this->session->set_flashdata('pesan', 'Pesanan Telah Dibatalkan');
		redirect('pesanan_saya');
	}

	//detail data order
	public function detail($no_order)
	{
		$data = array(
			'title' => 'Pesanan',
			'pesanan_detail' => $this->m_transaksi->pesanan_detail($no_order),
			'info' => $this->m_transaksi->info($no_order),
			'isi' =>  'frontend/cart/v_detail_pesanan'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}

	//pemesanan selesai deteail & review produk
	public function detail_selesai($no_order)
	{
		$this->form_validation->set_rules('isi', 'Catatan', 'required', array('required' => '%s Mohon untuk Diisi!!!'));
		$this->form_validation->set_rules('nama_pelanggan', 'Catatan', 'required', array('required' => '%s Mohon untuk Diisi!!!'));

		$data = array(
			'title' => 'Pesanan',
			'pesanan_detail' => $this->m_transaksi->pesanan_detail($no_order),
			'info' => $this->m_transaksi->info($no_order),
			'isi' =>  'frontend/cart/v_detail_pesanan_selesai'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}

	public function insert_riview()
	{
		$data['insert'] = $this->m_transaksi->insert_riview();
		$this->session->set_flashdata('pesan', 'Berhasil Memberi Riview');
		redirect('pesanan_saya');
	}
}

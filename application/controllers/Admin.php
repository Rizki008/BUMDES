<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_pesanan_masuk');
		$this->load->model('m_transaksi');
		$this->load->model('m_auth');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Dashboard',
			'total_produk' => $this->m_auth->total_produk(),
			'total_pesanan' => $this->m_auth->total_pesanan(),
			'total_pelanggan' => $this->m_auth->total_pelanggan(),
			'total_transaksi' => $this->m_auth->total_transaksi(),

			'data_stock' => $this->m_auth->data_stock(),
			'status_transaksi_selesai' => $this->m_auth->status_transaksi_selesai(),
			'grafik' => $this->m_auth->grafik(),
			'isi' => 'backend/admin/v_admin'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}

	public function pesanan_masuk()
	{
		$data = array(
			'title' => 'Konfirmasi Transaksi',
			'pesanan' => $this->m_pesanan_masuk->pesanan(),
			'pesanan_diproses' => $this->m_pesanan_masuk->pesanan_diproses(),
			'pesanan_dikirim' => $this->m_pesanan_masuk->pesanan_dikirim(),
			'pesanan_selesai' => $this->m_pesanan_masuk->pesanan_selesai(),
			'pesanan_dibatalkan' => $this->m_pesanan_masuk->pesanan_dibatalkan(),
			'isi' => 'backend/transaksi/v_transaksi'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}

	public function proses($id_pesanan)
	{
		$data = array(
			'id_pesanan' => $id_pesanan,
			'status' => 1
		);
		$this->m_pesanan_masuk->update_order($data);
		$this->session->set_flashdata('pesan', 'Pesanan Berhasil Di proses');
		redirect('admin/pesanan_masuk');
	}

	public function batal($id_pesanan)
	{
		$data = array(
			'id_pesanan' => $id_pesanan,
			'catatan' => $this->input->post('catatan'),
			'status' => 4
		);
		$this->m_pesanan_masuk->update_order($data);
		$this->session->set_flashdata('pesan', 'Pesanan Berhasil Di Batalkan');
		redirect('admin/pesanan_masuk');
	}

	public function kirim($id_pesanan)
	{
		$data = array(
			'id_pesanan' => $id_pesanan,
			// 'nama_pengirim' => $this->input->post('nama_pengirim'),
			'status' => 2
		);
		$this->m_pesanan_masuk->update_order($data);
		$this->session->set_flashdata('pesan', 'Pesanan Berhasil Di kirim');
		redirect('admin/pesanan_masuk');
	}

	public function detail($no_pesanan)
	{
		$data = array(
			'title' => 'Pesanan',
			'pesanan_detail' => $this->m_transaksi->pesanan_detail($no_pesanan),
			'diproses_pesanan' => $this->m_pesanan_masuk->diproses_pesanan(),
			'proses_kirim' => $this->m_pesanan_masuk->proses_kirim(),
			'isi' =>  'backend/transaksi/v_detail'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}
}

/* End of file Admin.php */

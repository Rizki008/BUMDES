<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kepala extends CI_Controller
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
			'isi' => 'kepala/v_kepala'
		);
		$this->load->view('kepala/v_wrapper', $data, FALSE);
	}
}

/* End of file Admin.php */

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_home');
		$this->load->model('m_produk');
		$this->load->model('m_transaksi');
	}

	public function index()
	{
		$data = array(
			'title' => 'Home',
			'umkm' => $this->m_home->umkm(),
			'cart' => $this->m_transaksi->selectCart(),
			'info' => $this->m_home->info(),
			'produk' => $this->m_home->prod(),
			'isi' => 'frontend/home/v_home'
		);
		$this->load->view('frontend/v_wrapperHome', $data, FALSE);
	}
	public function detail($id_umkm)
	{
		$data = array(
			'title' => 'Detail UMKM',
			'umkm' => $this->m_home->detail_umkm($id_umkm),
			'cart' => $this->m_transaksi->selectCart(),
			'produk' => $this->m_home->produk($id_umkm),
			'isi' => 'frontend/detail/v_detail'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
	public function about()
	{
		$data = array(
			'title' => 'Informasi BUMDES',
			'info' => $this->m_home->info(),
			'isi' => 'frontend/info/v_info'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
	public function umkm()
	{
		$data = array(
			'title' => 'UMKM BUMDES',
			'umkm' => $this->m_home->umkm(),
			'isi' => 'frontend/umkm/v_umkm'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
}

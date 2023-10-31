<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_laporan');
	}

	public function index()
	{
		$data = array(
			'title' => 'Laporan',
			'isi' => 'kepala/laporan/v_laporan'
		);
		$this->load->view('kepala/v_wrapper', $data, FALSE);
	}

	public function lap_harian()
	{
		$tanggal = $this->input->post('tanggal');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data = array(
			'title' => 'Laporan Penjualan Harian',
			'tanggal' => $tanggal,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->m_laporan->lap_harian($tanggal, $bulan, $tahun),
			'isi' => 'kepala/laporan/v_lap_harian'
		);
		$this->load->view('kepala/v_wrapper', $data, FALSE);
	}

	public function lap_bulanan()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data = array(
			'title' => 'Laporan Penjualan Bulanan',
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->m_laporan->lap_bulanan($bulan, $tahun),
			'isi' => 'kepala/laporan/v_lap_bulanan'
		);
		$this->load->view('kepala/v_wrapper', $data, FALSE);
	}

	public function lap_tahunan()
	{
		$tahun = $this->input->post('tahun');

		$data = array(
			'title' => 'Laporan Penjualan Tahunan',
			'tahun' => $tahun,
			'laporan' => $this->m_laporan->lap_tahunan($tahun),
			'isi' => 'kepala/laporan/v_lap_tahunan'
		);
		$this->load->view('kepala/v_wrapper', $data, FALSE);
	}

	public function lap_stock()
	{
		$tanggal = $this->input->post('tanggal');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data = array(
			'title' => 'Laporan Stock Barang',
			'tanggal' => $tanggal,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->m_laporan->lap_harian($tanggal, $bulan, $tahun),
			'isi' => 'kepala/laporan/v_lap_stock'
		);
		$this->load->view('kepala/v_wrapper', $data, FALSE);
	}
}

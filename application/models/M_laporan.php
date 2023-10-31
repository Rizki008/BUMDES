<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{
	public function lap_harian($tanggal, $bulan, $tahun)
	{
		$this->db->select('produk.nama_produk,pesanan.id_pesanan,pesanan.tgl_pesanan,detail_pesanan.qty,produk.harga');
		$this->db->from('detail_pesanan');
		$this->db->join('pesanan', 'pesanan.id_pesanan = detail_pesanan.id_pesanan', 'left');
		$this->db->join('produk', 'produk.id_produk = detail_pesanan.id_produk', 'left');
		$this->db->where('DAY(pesanan.tgl_pesanan)', $tanggal);
		$this->db->where('MONTH(pesanan.tgl_pesanan)', $bulan);
		$this->db->where('YEAR(pesanan.tgl_pesanan)', $tahun);
		$this->db->order_by('qty', 'desc');
		return $this->db->get()->result();
	}

	public function lap_bulanan($bulan, $tahun)
	{
		$this->db->select('produk.nama_produk,pesanan.id_pesanan,pesanan.tgl_pesanan,detail_pesanan.qty,produk.harga');
		$this->db->from('detail_pesanan');
		$this->db->join('pesanan', 'pesanan.id_pesanan = detail_pesanan.id_pesanan', 'left');
		$this->db->join('produk', 'produk.id_produk = detail_pesanan.id_produk', 'left');
		$this->db->where('MONTH(tgl_pesanan)', $bulan);
		$this->db->where('YEAR(tgl_pesanan)', $tahun);
		$this->db->order_by('qty', 'desc');
		return $this->db->get()->result();
	}

	public function lap_tahunan($tahun)
	{
		$this->db->select('produk.nama_produk,pesanan.id_pesanan,pesanan.tgl_pesanan,detail_pesanan.qty,produk.harga');
		$this->db->from('detail_pesanan');
		$this->db->join('pesanan', 'pesanan.id_pesanan = detail_pesanan.id_pesanan', 'left');
		$this->db->join('produk', 'produk.id_produk = detail_pesanan.id_produk', 'left');
		$this->db->where('YEAR(tgl_pesanan)', $tahun);
		$this->db->order_by('qty', 'desc');

		return $this->db->get()->result();
	}

	public function lap_stock($tanggal, $bulan, $tahun)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('DAY(pesanan.tgl_pesanan)', $tanggal);
		$this->db->where('MONTH(pesanan.tgl_pesanan)', $bulan);
		$this->db->where('YEAR(pesanan.tgl_pesanan)', $tahun);
		$this->db->order_by('stock', 'desc');
		return $this->db->get()->result();
	}
}

/* End of file M_laporan.php */

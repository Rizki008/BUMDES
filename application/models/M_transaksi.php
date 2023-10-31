<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{
	public function pesanan()
	{
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->join('pembayaran', 'pesanan.id_pesanan = pembayaran.id_pesanan', 'left');
		$this->db->where('id_user', $this->session->userdata('id_user'));
		$this->db->order_by('pesanan.id_pesanan', 'desc');
		return $this->db->get()->result();
	}

	public function detail_pesanan($id_pesanan)
	{
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->where('id_pesanan', $id_pesanan);
		return $this->db->get()->row();
	}

	public function upload_buktibayar($data)
	{
		$this->db->where('id_pesanan', $data['id_pesanan']);
		$this->db->update('pesanan', $data);
	}
	//detail pesanan selesai
	public function pesanan_detail($id_pesanan)
	{
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->join('user', 'pesanan.id_user = user.id_user', 'left');
		$this->db->join('detail_pesanan', 'pesanan.id_pesanan = detail_pesanan.id_pesanan', 'left');
		$this->db->join('pembayaran', 'pesanan.id_pesanan = pembayaran.id_pesanan', 'left');
		$this->db->join('produk', 'detail_pesanan.id_produk = produk.id_produk', 'left');
		$this->db->where('pesanan.id_pesanan', $id_pesanan);
		return $this->db->get()->result();
	}

	// KERANJANG
	public function selectCart()
	{
		if ($this->session->userdata('id_user') != '') {
			$data['jml'] = $this->db->query("SELECT SUM(qty_cart) as jml FROM `keranjang` WHERE id_user=" . $this->session->userdata('id_user'))->row();
			$data['cart'] = $this->db->query("SELECT * FROM `keranjang` JOIN produk ON keranjang.id_produk=produk.id_produk WHERE id_user=" . $this->session->userdata('id_user'))->result();
			return $data;
		}
	}
	public function cek_keranjang($id_produk)
	{
		$this->db->select('*');
		$this->db->from('keranjang');
		$this->db->where('id_produk', $id_produk);
		$this->db->where('id_user', $this->session->userdata('id_user'));
		return $this->db->get()->row();
	}
	public function update_keranjang($id_keranjang, $data)
	{
		$this->db->where('id_keranjang', $id_keranjang);
		$this->db->update('keranjang', $data);
	}
	public function simpan_keranjang($data)
	{
		$this->db->insert('keranjang', $data);
	}
	public function hapus($id)
	{
		$this->db->where('id_keranjang', $id);
		$this->db->delete('keranjang');
	}
	//PESANAN ADD PELANGGAN
	public function pesan($data)
	{
		$this->db->insert('pesanan', $data);
	}
	public function bayar($data)
	{
		$this->db->insert('pembayaran', $data);
	}
	public function rinci($data)
	{
		$this->db->insert('detail_pesanan', $data);
	}
	//PEMBAYARAN
	public function uploadbayar($data)
	{
		$this->db->where('id_pesanan', $data['id_pesanan']);
		$this->db->update('pembayaran', $data);
	}
	public function statuspesan($data)
	{
		$this->db->where('id_pesanan', $data['id_pesanan']);
		$this->db->update('pesanan', $data);
	}
}

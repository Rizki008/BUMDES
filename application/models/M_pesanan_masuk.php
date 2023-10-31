<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pesanan_masuk extends CI_Model
{
	public function pesanan()
	{
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->join('user', 'pesanan.id_user = user.id_user', 'left');
		$this->db->join('pembayaran', 'pesanan.id_pesanan = pembayaran.id_pesanan', 'left');
		$this->db->where('status=0');
		$this->db->order_by('pesanan.id_pesanan', 'desc');
		return $this->db->get()->result();
	}

	public function pesanan_diproses()
	{
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->join('user', 'pesanan.id_user = user.id_user', 'left');
		$this->db->join('pembayaran', 'pesanan.id_pesanan = pembayaran.id_pesanan', 'left');
		$this->db->where('status=1');
		$this->db->order_by('pesanan.id_pesanan', 'desc');
		return $this->db->get()->result();
	}

	public function pesanan_dikirim()
	{
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->join('user', 'pesanan.id_user = user.id_user', 'left');
		$this->db->join('pembayaran', 'pesanan.id_pesanan = pembayaran.id_pesanan', 'left');
		$this->db->where('status=2');
		$this->db->order_by('pesanan.id_pesanan', 'desc');
		return $this->db->get()->result();
	}

	public function pesanan_selesai()
	{
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->join('user', 'pesanan.id_user = user.id_user', 'left');
		$this->db->join('pembayaran', 'pesanan.id_pesanan = pembayaran.id_pesanan', 'left');
		$this->db->where('status=3');
		$this->db->order_by('pesanan.id_pesanan', 'desc');
		return $this->db->get()->result();
	}

	public function pesanan_dibatalkan()
	{
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->join('user', 'pesanan.id_user = user.id_user', 'left');
		$this->db->join('pembayaran', 'pesanan.id_pesanan = pembayaran.id_pesanan', 'left');
		$this->db->where('status=4');
		$this->db->order_by('pesanan.id_pesanan', 'desc');
		return $this->db->get()->result();
	}

	public function update_order($data)
	{
		$this->db->where('id_pesanan', $data['id_pesanan']);
		$this->db->update('pesanan', $data);
	}

	public function diproses_pesanan()
	{
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->join('detail_pesanan', 'pesanan.id_pesanan = detail_pesanan.id_pesanan', 'left');
		$this->db->join('produk', 'detail_pesanan.id_produk = produk.id_produk', 'left');
		return $this->db->get()->row();
	}

	public function proses_kirim()
	{
		$this->db->select('*');
		$this->db->from('pesanan');
		return $this->db->get()->result();
	}
}

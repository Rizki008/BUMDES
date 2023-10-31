<?php
defined('BASEPATH') or exit('No direct script access allowes');

class M_auth extends CI_Model
{
	public function user_login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array(
			'username' => $username,
			'password' => $password
		));
		return $this->db->get()->row();
	}

	public function register($data)
	{
		$this->db->insert('user', $data);
	}

	// DASHBOARD
	public function total_produk()
	{
		return $this->db->get('produk')->num_rows();
	}
	public function total_pesanan()
	{
		$this->db->where('status=0');
		return $this->db->get('pesanan')->num_rows();
	}
	public function total_pelanggan()
	{
		return $this->db->get('user')->num_rows();
	}
	public function total_transaksi()
	{
		$this->db->where('status=3');
		return $this->db->get('pesanan')->num_rows();
	}

	public function data_stock()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('detail_pesanan', 'produk.id_produk=detail_pesanan.id_produk', 'left');
		$this->db->where('stock <=100');
		$this->db->order_by('stock', 'desc');
		return $this->db->get()->result();
	}
	public function status_transaksi_selesai()
	{
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->join('user', 'pesanan.id_user = user.id_user', 'left');
		$this->db->join('pembayaran', 'pesanan.id_pesanan = pembayaran.id_pesanan', 'left');
		$this->db->where('status=3');
		$this->db->order_by('pesanan.id_pesanan', 'desc');
		return $this->db->get()->result();
	}
	public function grafik()
	{
		$this->db->select_sum('qty');
		$this->db->select('produk.nama_produk');
		$this->db->from('detail_pesanan');
		$this->db->join('produk', 'detail_pesanan.id_produk = produk.id_produk', 'left');
		$this->db->group_by('detail_pesanan.id_produk');
		$this->db->order_by('qty', 'desc');
		return $this->db->get()->result();
	}
	public function bulan()
	{
		$sql = 'SELECT tgl_pesanan FROM `pesanan` GROUP BY tgl_pesanan ORDER BY tgl_pesanan';
		$qry = $this->db->query($sql);
		return $qry->result_array();
	}
	public function merek()
	{
		$sql = 'SELECT produk.nama_produk FROM `detail_pesanan` LEFT JOIN produk ON produk.id_produk=detail_pesanan.id_produk GROUP BY detail_pesanan.id_produk ORDER BY detail_pesanan.id_produk;';
		$qry = $this->db->query($sql);
		return $qry->result_array();
	}
}

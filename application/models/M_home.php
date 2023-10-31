<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{
	public function umkm()
	{
		$this->db->select('*');
		$this->db->from('umkm');
		$this->db->order_by('id_umkm', 'desc');
		return $this->db->get()->result();
	}
	public function detail_umkm($id_umkm)
	{
		$this->db->select('*');
		$this->db->from('umkm');
		$this->db->where('id_umkm', $id_umkm);
		return $this->db->get()->result();
	}
	public function produk($id_umkm)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('umkm', 'produk.id_umkm = umkm.id_umkm', 'left');
		$this->db->where('produk.id_umkm', $id_umkm);
		$this->db->order_by('id_produk', 'desc');
		return $this->db->get()->result();
	}
	public function info()
	{
		return $this->db->query("SELECT *, MONTHNAME(jam_info) AS bulan,DAY(jam_info) AS tanggal FROM bumdes ORDER BY id_bumdes")->result();
	}
	public function prod()
	{
		$this->db->select('*');
		$this->db->from('detail_pesanan');
		$this->db->join('produk', 'detail_pesanan.id_produk = produk.id_produk', 'left');
		$this->db->order_by('qty', 'desc');
		$this->db->group_by('detail_pesanan.id_produk');
		return $this->db->get()->result();
	}
}

/* End of file M_home.php */

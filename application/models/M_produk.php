<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_produk extends CI_Model
{

	public function produk()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('umkm', 'produk.id_umkm = umkm.id_umkm', 'left');
		$this->db->order_by('id_produk', 'desc');
		return $this->db->get()->result();
	}
	// List all your items
	public function detail($id_produk)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('id_produk', $id_produk);
		return $this->db->get()->row();
	}
	// Add a new item
	public function add($data)
	{
		$this->db->insert('produk', $data);
	}
	//Update one item
	public function edit($data)
	{
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->update('produk', $data);
	}

	//Delete one item
	public function delete($data)
	{
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->delete('produk', $data);
	}
}

/* End of file M_barang.php */

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_bumdes extends CI_Model
{

	// INFORMSI BUMDES
	public function bumdes()
	{
		$this->db->select('*');
		$this->db->from('bumdes');
		$this->db->order_by('id_bumdes', 'desc');
		return $this->db->get()->result();
	}
	// List all your items
	public function detail($id_bumdes)
	{
		$this->db->select('*');
		$this->db->from('bumdes');
		$this->db->where('id_bumdes', $id_bumdes);
		return $this->db->get()->row();
	}
	// Add a new item
	public function add($data)
	{
		$this->db->insert('bumdes', $data);
	}

	//Update one item
	public function edit($data)
	{
		$this->db->where('id_bumdes', $data['id_bumdes']);
		$this->db->update('bumdes', $data);
	}

	//Delete one item
	public function delete($data)
	{
		$this->db->where('id_bumdes', $data['id_bumdes']);
		$this->db->delete('bumdes', $data);
	}

	// DATA PRODUK
	public function produk()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->order_by('id_produk', 'desc');
		return $this->db->get()->result();
	}

	// List all your items
	public function detail_produk($id_produk)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->where('id_produk', $id_produk);
		return $this->db->get()->row();
	}

	// Add a new item
	public function add_produk($data)
	{
		$this->db->insert('produk', $data);
	}

	//Update one item
	public function edit_produk($data)
	{
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->update('produk', $data);
	}

	//Delete one item
	public function delete_produk($data)
	{
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->delete('produk', $data);
	}


	//search
	public function pencarian($keyword)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->like('nama_produk', $keyword);
		$this->db->or_like('harga', $keyword);
		return $this->db->get()->result();
	}
}

/* End of file M_barang.php */

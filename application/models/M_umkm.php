<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_umkm extends CI_Model
{

	public function umkm()
	{
		$this->db->select('*');
		$this->db->from('umkm');
		$this->db->order_by('id_umkm', 'desc');
		return $this->db->get()->result();
	}
	// List all your items
	public function detail($id_umkm)
	{
		$this->db->select('*');
		$this->db->from('umkm');
		$this->db->where('id_umkm', $id_umkm);
		return $this->db->get()->row();
	}
	// Add a new item
	public function add($data)
	{
		$this->db->insert('umkm', $data);
	}
	//Update one item
	public function edit($data)
	{
		$this->db->where('id_umkm', $data['id_umkm']);
		$this->db->update('umkm', $data);
	}

	//Delete one item
	public function delete($data)
	{
		$this->db->where('id_umkm', $data['id_umkm']);
		$this->db->delete('umkm', $data);
	}
}

/* End of file M_barang.php */

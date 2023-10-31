<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Belanja extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_transaksi');
	}

	// List all your items
	public function index()
	{
		$this->user_login->proteksi_halaman();
		$data = array(
			'title' => 'Keranjang Belanja',
			'cart' => $this->m_transaksi->selectCart(),
			'isi' => 'frontend/keranjang/v_cart'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}

	// ADD KE KERANJANG 
	public function add()
	{
		$this->user_login->proteksi_halaman();
		$cek = $this->input->post('id_produk');
		$produk_cek = $this->m_transaksi->cek_keranjang($cek);
		if ($produk_cek) {
			$data = array(
				'qty_cart' => $produk_cek->qty_cart + 1
			);
			$this->m_transaksi->update_keranjang($produk_cek->id_keranjang, $data);
		} else {
			$data = array(
				'id_produk' => $this->input->post('id_produk'),
				'id_user' => $this->session->userdata('id_user'),
				'qty_cart' => $this->input->post('qty'),
			);
			$this->m_transaksi->simpan_keranjang($data);
		}
		redirect('home');
	}

	public function update_cart()
	{
		$this->user_login->proteksi_halaman();
		$cart = $this->m_transaksi->selectCart();
		$i = 1;
		foreach ($cart['cart'] as $key => $value) {
			$data = array(
				'qty_cart' => $this->input->post('qty' . $i++)
			);
			$this->db->where('id_keranjang', $value->id_keranjang);
			$this->db->update('keranjang', $data);
		}
		redirect('belanja');
	}

	public function deleteCart($id)
	{
		$this->user_login->proteksi_halaman();
		$this->m_transaksi->hapus($id);
		redirect('belanja');
	}

	public function clear()
	{
		$this->cart->destroy();
		redirect('belanja');
	}

	public function cekout()
	{
		$this->user_login->proteksi_halaman();

		$this->form_validation->set_rules('alamat', 'alamat', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Cekout',
				'cart' => $this->m_transaksi->selectCart(),
				'isi' => 'frontend/keranjang/v_cekout'
			);
			$this->load->view('frontend/v_wrapper', $data, FALSE);
		} else {
			$cart = $this->m_transaksi->selectCart();
			//tabel transaksi
			$data = array(
				'id_pesanan' => $this->input->post('id_pesanan'),
				'tgl_pesanan' => DATE('Y-m-d h:i:s'),
				'id_user' => $this->session->userdata('id_user'),
				'alamat' => $this->input->post('alamat'),
				'total_berat' => $this->input->post('total_berat'),
				'total_harga' => $this->input->post('total_harga'),
				'status' => 0,
			);
			$this->m_transaksi->pesan($data);

			// SIMPAN KE TABEL PEMBAYARAN
			$bayar = array(
				'id_pesanan' => $this->input->post('id_pesanan'),
				'status_bayar' => 0,
				'jml_bayar' => 0,
				'bukti_bayar' => 0,
			);
			$this->m_transaksi->bayar($bayar);

			// SIMPAN KE TABEL DETAIL PESANAN
			$i = 1;
			$j = 1;
			foreach ($cart['cart'] as $key => $item) {
				$rinci = array(
					'id_pesanan' => $this->input->post('id_pesanan'),
					'id_detail' => $this->input->post('id_detail' . $j++),
					'id_produk' => $item->id_produk,
					'qty' => $item->qty_cart,
				);
				$this->m_transaksi->rinci($rinci);
			}

			foreach ($cart['cart'] as $key => $valuesa) {
				$this->db->where('id_keranjang', $valuesa->id_keranjang);
				$this->db->delete('keranjang');
			}

			// $this->cart->destroy();
			redirect('pesanan_saya');
		}
	}
}

/* End of file Belanja.php */

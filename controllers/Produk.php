<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('is_logged_in')) {
        redirect('login');
    }
		$this->load->model('M_Produk');
		$this->load->library('upload');
	}

	public function index()
	{
		$data['produk'] = $this->M_Produk->produk();

		$this->form_validation->set_rules('NamaProduk', 'NamaProduk', 'required', ['required' => 'Nama Produk harus diisi!']);
		$this->form_validation->set_rules('Harga', 'Harga', 'required', ['required' => 'Harga harus diisi!']);
		$this->form_validation->set_rules('Stok', 'Stok', 'required', ['required' => 'Nomor Telepon harus diisi!']);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('menu/kepala');
			$this->load->view('produk', $data);
			$this->load->view('menu/kaki');
		} else {
			$this->M_Produk->simpan_produk();
			redirect('produk');
		}
	}

	function hapus_produk($ProdukID)
	{
		$this->db->delete('produk', ['ProdukID' => $ProdukID]);
		redirect('produk');
	}

	public function e_produk($ProdukID)
	{
		$data['produk'] = $this->M_Produk->getprodukby($ProdukID);

		$this->form_validation->set_rules('NamaProduk', 'NamaProduk', 'required', ['required' => 'Nama Produk harus diisi!']);
		$this->form_validation->set_rules('Harga', 'Harga', 'required', ['required' => 'Harga harus diisi!']);
		$this->form_validation->set_rules('Stok', 'Stok', 'required', ['required' => 'Nomor Telepon harus diisi!']);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('menu/kepala');
			$this->load->view('e_produk', $data);
			$this->load->view('menu/kaki');
		} else {
			$this->M_Produk->e_produk();
			redirect('produk');
		}
	}
}
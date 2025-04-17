<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller
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
		$this->load->model('M_Detail');
        $this->load->model('M_Penjualan');
        $this->load->model('M_Produk');
        $this->load->model('M_Pelanggan');
		$this->load->library('upload');
	}

	public function index()
	{
		$data['detail'] = $this->M_Detail->detail();
        $data['pelanggan'] = $this->M_Pelanggan->pelanggan();
        $data['penjualan'] = $this->M_Penjualan->penjualan();
        $data['produk'] = $this->M_Produk->produk();


		$this->form_validation->set_rules('PenjualanID', 'PenjualanID', 'required', ['required' => 'Nama Pelanggan harus diisi!']);
		$this->form_validation->set_rules('NamaProduk', 'NamaProduk', 'required', ['required' => 'Nama Produk harus diisi!']);
		$this->form_validation->set_rules('JumlahProduk', 'JumlahProduk', 'required', ['required' => 'Jumlah Produk harus diisi!']);
		

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('menu/kepala');
			$this->load->view('detail', $data);
			$this->load->view('menu/kaki');
		} else {
			$this->M_Detail->simpan_detail();
			redirect('detail');
		}
	}

	function hapus_detail($DetailID)
	{
		$this->db->delete('detailpenjualan', ['DetailID' => $DetailID]);
		redirect('detail');
	}

	public function e_detail($DetailID)
	{
		$data['detail'] = $this->M_Detail->getdetailby($DetailID);

		$this->form_validation->set_rules('NamaPelanggan', 'NamaPelanggan', 'required', ['required' => 'Nama Pelanggan harus diisi!']);
		$this->form_validation->set_rules('NamaProduk', 'NamaProduk', 'required', ['required' => 'Nama Produk harus diisi!']);
		$this->form_validation->set_rules('JumlahProduk', 'JumlahProduk', 'required', ['required' => 'Jumlah Produk harus diisi!']);
		
		

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('menu/kepala');
			$this->load->view('e_detail', $data);
			$this->load->view('menu/kaki');
		} else {
			$this->M_Detail->e_detail();
			redirect('detail');
		}
	}
}
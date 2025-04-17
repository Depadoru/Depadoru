<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller
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
		$this->load->model('M_Pelanggan');
		$this->load->library('upload');
	}

	public function index()
	{
		$data['pelanggan'] = $this->M_Pelanggan->pelanggan();

		$this->form_validation->set_rules('NamaPelanggan', 'NamaPelanggan', 'required', ['required' => 'Nama Pelanggan harus diisi!']);
		$this->form_validation->set_rules('Alamat', 'Alamat', 'required', ['required' => 'Alamat harus diisi!']);
		$this->form_validation->set_rules('NomorTelepon', 'NomorTelepon', 'required', ['required' => 'Nomor Telepon harus diisi!']);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('menu/kepala');
			$this->load->view('pelanggan', $data);
			$this->load->view('menu/kaki');
		} else {
			$this->M_Pelanggan->simpan_pelanggan();
			redirect('Pelanggan');
		}
	}

	function hapus_pelanggan($PelangganID)
	{
		$this->db->delete('pelanggan', ['PelangganID' => $PelangganID]);
		redirect('Pelanggan');
	}

	public function e_pelanggan($PelangganID)
	{
		$data['pelanggan'] = $this->M_Pelanggan->getpelangganby($PelangganID);

		$this->form_validation->set_rules('NamaPelanggan', 'NamaPelanggan', 'required', ['required' => 'Nama Pelanggan harus diisi!']);
		$this->form_validation->set_rules('Alamat', 'Alamat', 'required', ['required' => 'Alamat harus diisi!']);
		$this->form_validation->set_rules('NomorTelepon', 'NomorTelepon', 'required', ['required' => 'Nomor Telepon harus diisi!']);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('menu/kepala');
			$this->load->view('e_pelanggan', $data);
			$this->load->view('menu/kaki');
		} else {
			$this->M_Pelanggan->e_pelanggan();
			redirect('Pelanggan');
		}
	}
}
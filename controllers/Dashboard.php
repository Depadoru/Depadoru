<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) {
        redirect('login');
    }
    	$this->load->model('M_Penjualan');
        $this->load->model('M_Pelanggan');
        $this->load->model('M_Produk');
        // $this->load->model('M_Login');
        // $this->load->library('session');
        // $this->load->helper('url');	
    }

	public function index()
		{
            $data['total_produk'] = $this->M_Produk->get_total_Produk();
            $data['total_pelanggan'] = $this->M_Pelanggan->get_total_Pelanggan();
            $data['total_penjualan'] = $this->M_Penjualan->get_total_Penjualan();
            $data['total_harga'] = $this->M_Penjualan->get_total_harga();
            
            $this->load->view('menu/kepala');
            $this->load->view('dashboard',$data);
            $this->load->view('menu/kaki');
		}

}

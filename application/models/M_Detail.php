<?php
class M_Detail extends CI_Model
{
    // Method untuk mengambil semua detail penjualan (tidak digunakan di view detail)
    function detail()
    {  
        $this->db->select('detailpenjualan.*, penjualan.PelangganID, pelanggan.NamaPelanggan, produk.NamaProduk');
        $this->db->from('detailpenjualan');
        $this->db->join('penjualan', 'detailpenjualan.PenjualanID = penjualan.PenjualanID', 'left');
        $this->db->join('pelanggan', 'penjualan.PelangganID = pelanggan.PelangganID', 'left');
        $this->db->join('produk', 'detailpenjualan.ProdukID = produk.ProdukID', 'left');
        $this->db->order_by('DetailID','ASC');
        $query = $this->db->get();
        return $query->result();
    }
    
    // Method baru untuk mengambil detail berdasarkan PenjualanID tertentu
    function get_detail_by_penjualan($PenjualanID)
    {  
        $this->db->select('detailpenjualan.*, penjualan.PelangganID, pelanggan.NamaPelanggan, produk.NamaProduk, produk.Harga');
        $this->db->from('detailpenjualan');
        $this->db->join('penjualan', 'detailpenjualan.PenjualanID = penjualan.PenjualanID', 'left');
        $this->db->join('pelanggan', 'penjualan.PelangganID = pelanggan.PelangganID', 'left');
        $this->db->join('produk', 'detailpenjualan.ProdukID = produk.ProdukID', 'left');
        $this->db->where('detailpenjualan.PenjualanID', $PenjualanID);
        $this->db->order_by('DetailID','ASC');
        $query = $this->db->get();
        return $query->result();
    }
  
    // Method untuk menyimpan detail penjualan
    function simpan_detail()
    {
        $NamaProduk = $this->input->post('NamaProduk');
        $PenjualanID = $this->input->post('PenjualanID');
        $JumlahProduk = $this->input->post('JumlahProduk');

        // Ambil data produk
        $query = $this->db->get_where('produk', ['ProdukID' => $NamaProduk])->row();
        $harga = $query->Harga;
        $stok = $query->Stok;
        $subtotal = $JumlahProduk * $harga;

        // Hitung stok baru
        $newstok = $stok - $JumlahProduk;

        // Data untuk detail penjualan
        $data = [
            "ProdukID" => $NamaProduk, 
            "PenjualanID" => $PenjualanID, 
            "JumlahProduk" => $JumlahProduk,
            "Subtotal" => $subtotal,
        ];
        
        // Simpan detail penjualan
        $this->db->insert('detailpenjualan', $data);

        // Update stok produk
        $data2 = [
            "Stok" => $newstok
        ];
        $this->db->where('ProdukID', $NamaProduk);
        $this->db->update('produk', $data2);
        
        // Update total harga di tabel penjualan
        $this->update_total_harga($PenjualanID);
    }
    
    // Method untuk update total harga di tabel penjualan
    private function update_total_harga($PenjualanID)
    {
        // Hitung total harga dari semua detail penjualan
        $this->db->select_sum('Subtotal');
        $this->db->where('PenjualanID', $PenjualanID);
        $query = $this->db->get('detailpenjualan');
        $total = $query->row()->Subtotal;
        
        // Update total harga di tabel penjualan
        $this->db->where('PenjualanID', $PenjualanID);
        $this->db->update('penjualan', ['TotalHarga' => $total]);
    }

    // Method untuk mengambil data penjualan berdasarkan ID
    public function getpenjualanby($PenjualanID)
    {
        return $this->db->get_where('penjualan', ['PenjualanID' => $PenjualanID])->row();
    }

    // Method untuk edit penjualan
    public function e_penjualan()
    {
        $data = [
            "TanggalPenjualan" => htmlspecialchars($this->input->post('TanggalPenjualan', true)),
            "PelangganID" => $this->input->POST('NamaPelanggan', true),
        ];

        $this->db->where('PenjualanID', $this->input->POST('PenjualanID'));
        $this->db->update('penjualan', $data);
    }
    
    // Method untuk menghapus detail penjualan
    function hapus_detail($DetailID, $PenjualanID)
    {
        // Ambil data detail sebelum dihapus untuk mengembalikan stok
        $detail = $this->db->get_where('detailpenjualan', ['DetailID' => $DetailID])->row();
        if ($detail) {
            $produk = $this->db->get_where('produk', ['ProdukID' => $detail->ProdukID])->row();
            $new_stok = $produk->Stok + $detail->JumlahProduk;
            
            // Update stok produk
            $this->db->where('ProdukID', $detail->ProdukID);
            $this->db->update('produk', ['Stok' => $new_stok]);
            
            // Hapus detail
            $this->db->delete('detailpenjualan', ['DetailID' => $DetailID]);
            
            // Update total harga
            $this->update_total_harga($PenjualanID);
        }
    }
}
<?php
class M_Penjualan extends CI_Model
{
function penjualan()
{  
    $this->db->select('penjualan.*, pelanggan.NamaPelanggan, IFNULL(SUM(detailpenjualan.Subtotal), 0) AS TotalHarga');
    $this->db->from('penjualan');
    $this->db->join('pelanggan', 'penjualan.PelangganID = pelanggan.PelangganID', 'left');
    $this->db->join('detailpenjualan', 'penjualan.PenjualanID = detailpenjualan.PenjualanID', 'left');
    $this->db->group_by('penjualan.PenjualanID'); // Group by PenjualanID to get the total
    $this->db->order_by('penjualan.PenjualanID', 'ASC');
    
    $query = $this->db->get();
    return $query->result();
}
  
     function simpan_penjualan()
    {
        
        $data = [
            "TanggalPenjualan" => htmlspecialchars($this->input->POST('TanggalPenjualan', true)),
            "PelangganID" => $this->input->POST('NamaPelanggan', true),
        ];

        $this->db->insert('penjualan',$data);
    }

    public function getpenjualanby($PenjualanID)
    {
        return $this->db->get_where('penjualan', ['PenjualanID' => $PenjualanID])->row();
    }

    public function e_penjualan()
{
    $data = [
        "TanggalPenjualan" => htmlspecialchars($this->input->post('TanggalPenjualan', true)),
        "PelangganID" => $this->input->POST('NamaPelanggan', true),
    ];

    $this->db->where('PenjualanID', $this->input->POST('PenjualanIDh'));
    $this->db->update('penjualan', $data);
}
    public function get_total_penjualan()
    {
        return $this->db->count_all('penjualan');  // Returns the total number of rows in the musicians table
    }

    public function get_total_harga()
{
    $this->db->select_sum('TotalHarga');
    $query = $this->db->get('penjualan');
    return $query->row()->TotalHarga;
}
}

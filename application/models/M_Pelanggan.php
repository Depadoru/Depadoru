<?php
class M_Pelanggan extends CI_Model
{
    public function pelanggan()
    {
        $this->db->order_by('PelangganID', 'ASC');
        $query = $this->db->get('pelanggan');
        return $query->result();
    }

    function simpan_pelanggan()
    {

        $data = [
            "NamaPelanggan" => htmlspecialchars($this->input->POST('NamaPelanggan', true)),
            "Alamat" => $this->input->POST('Alamat', true),
            "NomorTelepon" => $this->input->post('NomorTelepon', true),

        ];

        $this->db->insert('pelanggan', $data);
    }

    public function getpelangganby($PelangganID)
    {
        return $this->db->get_where('pelanggan', ['PelangganID' => $PelangganID])->row();
    }

    public function e_pelanggan()
    {
        $data = [
            "NamaPelanggan" => htmlspecialchars($this->input->post('NamaPelanggan', true)),
            "Alamat" => $this->input->POST('Alamat', true),
            "NomorTelepon" => $this->input->post('NomorTelepon', true),
        ];

        $this->db->where('PelangganID', $this->input->POST('PelangganIDh'));
        $this->db->update('pelanggan', $data);
    }

    public function get_total_pelanggan()
    {
        return $this->db->count_all('pelanggan');  // Returns the total number of rows in the musicians table
    }
}
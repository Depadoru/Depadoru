<?php
class M_Produk extends CI_Model
{
    function produk()
    {  
        $this->db->order_by('ProdukID','ASC');
        $query= $this->db->get('produk');
        return $query->result();
    }
  
     function simpan_produk()
    {
        
        $data = [
            "NamaProduk" => htmlspecialchars($this->input->POST('NamaProduk', true)),
            "Harga" => $this->input->POST('Harga', true),
            "Stok" => $this->input->post('Stok', true),

        ];

        $this->db->insert('produk',$data);
    }

    public function getprodukby($ProdukID)
    {
        return $this->db->get_where('produk', ['ProdukID' => $ProdukID])->row();
    }

    public function e_produk()
{
    $data = [
        "NamaProduk" => htmlspecialchars($this->input->post('NamaProduk', true)),
        "Harga" => $this->input->POST('Harga', true),
        "Stok" => $this->input->post('Stok', true),
    ];

    $this->db->where('ProdukID', $this->input->POST('ProdukIDh'));
    $this->db->update('produk', $data);
}

public function get_total_produk()
    {
        return $this->db->count_all('produk');  // Returns the total number of rows in the musicians table
    }

}

 <?php
class M_Login extends CI_Model {

public function get_user_by_username($username) {
    $user = $this->db->get_where('users', ['username' => $username])->row();
    
    if ($user) {
        // Ambil password yang diinput dari form login
        $input_password = $this->input->POST('password');
        
        // Verifikasi password yang diinput dengan hash di database
        if (password_verify($input_password, $user->password)) {
            return $user;
        } else {
            return false; // Password tidak cocok
        }
    } else {
        return false; // Username tidak ditemukan
    }
}


    function get_all_users()
    {  
        $this->db->order_by('id','ASC');
        $query= $this->db->get('users');
        return $query->result();
    }

        public function get_user($id) {
        return $this->db->get_where('users', ['id' => $id])->row();
    }

    public function add_user() {
        $data = [
            "id" => $this->input->POST('id', true),
            "username" => htmlspecialchars($this->input->POST('username', true)),
            "email" => $this->input->POST('email', true),
            "role" => $this->input->post('role', true),
            "password" => password_hash($this->input->POST('password', true), PASSWORD_DEFAULT),  // Hash password
            "created_at" => date("Y-m-d H:i:s") // Tambahkan created_at
        ];
    return $this->db->insert('users', $data);
}


   public function update_user($id) {
    // Ambil data dari form
    $data = [
        "id" => $this->input->POST('idh', true),
        "username" => htmlspecialchars($this->input->POST('username', true)),
        "email" => $this->input->POST('email', true),
        "role" => $this->input->post('role', true),
        "created_at" => date('Y-m-d H:i:s'),
    ];

    // Jika password diisi, maka hash password baru
    if (!empty($this->input->POST('password'))) {
        $data['password'] = password_hash($this->input->POST('password', true), PASSWORD_DEFAULT);
    }

    // Lakukan update data di database
    $this->db->where('id', $id);
    return $this->db->update('users', $data);
}



    public function delete_user($id) {
        return $this->db->delete('users', ['id' => $id]);
    }
    public function get_total_users() {
    $this->db->where('role', 'pegawai');
    return $this->db->count_all_results('users');  // Mengembalikan jumlah user dengan role 'pegawai'
    }
}

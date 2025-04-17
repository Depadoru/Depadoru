<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userdata extends CI_Controller {

   public function __construct() {
    parent::__construct();
    if (!$this->session->userdata('is_logged_in')) {
        redirect('login');
    }
    $this->load->model('M_Login');
    }

    public function index() {
        $data['users'] = $this->M_Login->get_all_users();

        $this->form_validation->set_rules('username', 'username', 'required', ['required' => 'Username harus diisi!']);
        $this->form_validation->set_rules('password', 'password', 'required', ['required' => 'Password harus diisi!']);
        $this->form_validation->set_rules('email', 'email', 'required', ['required' => 'Email harus diisi!']);
        $this->form_validation->set_rules('role', 'role', 'required', ['required' => 'Role harus diisi!']);

        if ($this->form_validation->run() == FALSE) {    
            $this->load->view('menu/kepala');
            $this->load->view('userdata', $data);
            $this->load->view('menu/kaki');
        } else {
            $this->M_Login->add_user();
        }
    }

    public function delete_userdata($id) {
        $this->M_Login->delete_user($id);
        redirect('userdata');
    }

    public function view($id) {
        $data['users'] = $this->M_Login->get_user($id);

        $this->load->view('menu/kepala');
        $this->load->view('d_user', $data);
        $this->load->view('menu/kaki');
    }

    public function e_userdata($id) {
    $data['users'] = $this->M_Login->get_user($id);

    $this->form_validation->set_rules('username', 'username', 'required', ['required' => 'Username harus diisi!']);
    $this->form_validation->set_rules('password', 'password'); // tidak wajib, hanya diisi jika user ingin mengganti password
    $this->form_validation->set_rules('email', 'email', 'required', ['required' => 'Email harus diisi!']);
    $this->form_validation->set_rules('role', 'role', 'required', ['required' => 'Role harus diisi!']);   

    if ($this->form_validation->run() == FALSE) {    
        $this->load->view('menu/kepala');
        $this->load->view('e_userdata', $data);
        $this->load->view('menu/kaki');
    } else {
        // Ambil data dari form
        $user_data = [
            "username" => htmlspecialchars($this->input->post('username', true)),
            "email" => $this->input->post('email', true),
            "role" => $this->input->post('role', true),
        ];

        // Cek jika password diisi, maka hash password baru
        if (!empty($this->input->post('password'))) {
            $user_data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        }

        // Update data user
        $this->M_Login->update_user($id, $user_data);
        redirect('userdata');
    }
}


}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Login');
        $this->load->library('session');
        $this->load->helper('url');	
    }

	public function index()
		{
			$this->form_validation->set_rules('username', 'username', 'required');
			$this->form_validation->set_rules('password', 'password', 'required');

			if ($this->form_validation->run() == FALSE) 
			{
			$this->load->view('login');
			}
			else
			{
				$this->_login();
			}
		}
    private function _login() {

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->M_Login->get_user_by_username($username);
		
        if($user) {
            if($user && password_verify($password, $user->password)) {
                $session_data = [
                    'id' => $user->id,
                    'username' => $user->username,
					'email' => $user->email,
                    'role' => $user->role,
				    'is_logged_in' => TRUE  // Add this line
					
                ];
                $this->session->set_userdata($session_data);
                $this->session->set_userdata('role', $user->role);
				redirect('Dashboard');

                // Role-based redirection
                // if ($user->role == 'admin') {
                //     redirect('User');
                // } else {
                //     redirect('User');  // Adjust if there is another role to handle
                // }

            } else {
                // Debugging password issue
                log_message('error', 'Password verification failed for user: ' . $username);
                $this->session->set_flashdata('error', 'Invalid password.');
                redirect('login');
            }
        } else {
            // Debugging user issue
            log_message('error', 'User not found: ' . $username);
            $this->session->set_flashdata('error', 'Username not found.');
            redirect('login');
        }
		
}


    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
	
}

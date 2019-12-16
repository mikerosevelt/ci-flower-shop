<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
	public function index() {
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
        	$data['title'] = 'Login Page';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
        } else {
        	// login
        	$this->_login();
        }
		
	}

	private function _login() {
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			if ($user['is_active'] == 1) {
				if (password_verify($password, $user['password'])) {
					$data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'status' => "login"
                    ];
                    if ($user['role_id'] == 1) {
                    	$this->session->set_userdata($data);
                    	redirect('admin');
                    } else {
                    	$this->session->set_userdata($data);
                    	redirect('home');
                    }
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not been activated!</div>');
                redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            redirect('auth');
		}
	}

	

	public function register() {
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email is already registered!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'min_length' => 'Password is too short'
        ]);

        if ($this->form_validation->run() == false) {
        	$data['title'] = 'Register Page';
        	$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/register');
			$this->load->view('templates/auth_footer');
        } else {
        	$data = [
        		'name' => htmlspecialchars($this->input->post('name', true)),
        		'email' => htmlspecialchars($this->input->post('email', true)),
        		'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
        	];
        	$this->db->insert('user', $data);
        	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Hooray! your account has been created.</div>');
        	redirect('auth');
        }
	}

	public function logout() {
		$this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('status');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logout.</div>');
        redirect('auth');
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myaccount extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if ($this->session->userdata['status'] != 'login') {
			redirect('auth');
		}
	}

	public function index() {
		$data['title'] = 'MyAccount Page';

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/main_header', $data);
		$this->load->view('myaccount/index', $data);
		$this->load->view('templates/main_footer');
	}

	public function myorder() {
		echo "ORDER";
	}
}
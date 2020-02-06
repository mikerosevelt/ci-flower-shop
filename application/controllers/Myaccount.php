<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myaccount extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('User_model');

		if ($this->session->userdata['status'] != 'login') {
			redirect('auth');
		}
	}

	public function index() {

		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('address2', 'Address2', 'trim|max_length[30]');
		$this->form_validation->set_rules('city', 'City', 'trim|required');
		$this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required');
		$this->form_validation->set_rules('state', 'State', 'trim|required');
		$this->form_validation->set_rules('country', 'Country', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'MyAccount Page';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

			$this->load->view('templates/main_header', $data);
			$this->load->view('myaccount/index', $data);
			$this->load->view('templates/main_footer');
		} else {
			$this->User_model->updateDetail();
		}
	}

	public function myorder() {
		echo "ORDER";
	}
}
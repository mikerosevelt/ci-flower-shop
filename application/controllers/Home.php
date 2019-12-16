<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('Product_model');
	}

	public function index() {
		$data['title'] = 'Home Page';
		$data['list'] = $this->Product_model->getAllProduct()->result_array();
		$this->load->view('templates/main_header', $data);
		$this->load->view('home/index', $data);
		$this->load->view('templates/main_footer');
	}

	public function about() {
		$data['title'] = 'About Page';
		$this->load->view('templates/main_header', $data);
		$this->load->view('home/about');
		$this->load->view('templates/main_footer');
	}

	public function contact() {
		$data['title'] = 'Contact Page';
		$this->load->view('templates/main_header', $data);
		$this->load->view('home/contact');
		$this->load->view('templates/main_footer');
	}
}
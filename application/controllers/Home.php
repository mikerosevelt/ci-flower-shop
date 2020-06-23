<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Product_model');
	}

	public function index()
	{
		$data['title'] = 'Home Page';
		$data['list'] = $this->Product_model->getAllProduct();
		$this->load->view('templates/main/header', $data);
		$this->load->view('home/index', $data);
		$this->load->view('templates/main/footer');
	}

	public function about()
	{
		$data['title'] = 'About Page';
		$this->load->view('templates/main/header', $data);
		$this->load->view('home/about');
		$this->load->view('templates/main/footer');
	}

	public function contact()
	{
		$data['title'] = 'Contact Page';
		$this->load->view('templates/main/header', $data);
		$this->load->view('home/contact');
		$this->load->view('templates/main/footer');
	}

	public function subscribe()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[newsletter.email]', [
			'is_unique' => 'Email is already joined!'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is already joined!.</div>');
			redirect();
		} else {
			$data = [
				'email' => $this->input->post('email', true),
				'date_join' => time()
			];
			$this->db->insert('newsletter', $data);
			// $this->_sendEmail();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Thank you for join our newsletter.</div>');
			redirect();
		}
	}

	private function _sendEmail()
	{
		$this->email->from('cs@flowershop.com', 'Flower Shop'); // from email and from name.
		$this->email->to($this->input->post('email'));
		$this->email->subject('Thank you for join our newsletter');
		$this->email->message('Thank you for join our newsletter');

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}
}

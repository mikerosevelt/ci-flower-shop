<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Myaccount extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('User_model');
		$this->load->model('Order_model');

		if ($this->session->userdata['status'] != 'login') {
			redirect('auth');
		}
	}

	public function index()
	{

		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('address2', 'Address2', 'trim|max_length[30]');
		$this->form_validation->set_rules('city', 'City', 'trim|required');
		$this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required');
		$this->form_validation->set_rules('state', 'State', 'trim|required');
		$this->form_validation->set_rules('country', 'Country', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'MyAccount';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$id = $data['user']['id'];
			$data['data'] = $this->User_model->getUserData($id);

			$this->load->view('templates/main/header', $data);
			$this->load->view('myaccount/index', $data);
			$this->load->view('templates/main/footer');
		} else {
			$this->User_model->updateDetail();
		}
	}

	public function myorder()
	{
		$data['title'] = 'My Order';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$id = $data['user']['id'];
		$data['myorder'] = $this->Order_model->getUserOrderList($id);
		$this->load->view('templates/main/header', $data);
		$this->load->view('myaccount/myorder', $data);
		$this->load->view('templates/main/footer');
	}

	public function mywishlist()
	{
		$data['title'] = 'My Wishlist';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['wishlist'] = $this->User_model->getWishlistData($data['user']['id']);

		$this->load->view('templates/main/header', $data);
		$this->load->view('myaccount/mywishlist', $data);
		$this->load->view('templates/main/footer');
	}

	public function setting()
	{
		$data['title'] = 'Account Setting';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('current_password', ' Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]', [
			'min_length' => 'Password is too short'
		]);
		$this->form_validation->set_rules('new_password2', 'New Password', 'required|trim|min_length[3]|matches[new_password1]', [
			'matches' => 'Password do not match',
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/main/header', $data);
			$this->load->view('myaccount/setting');
			$this->load->view('templates/main/footer');
		} else {
			$current_password = $this->input->post('current_password', true);
			$new_password = $this->input->post('new_password1', true);
			if (!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
				redirect('myaccount/setting');
			} else {
				if ($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
					redirect('myaccount/setting');
				} else {
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');
					// $this->_sendEmail();
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your password has been changed!</div>');
					redirect('myaccount/setting');
				}
			}
		}
	}

	private function _sendEmail()
	{
		require_once('__config.php');

		$smtp_config = $config;

		$this->load->library('email', $smtp_config);

		$this->email->initialize($smtp_config);

		$this->email->from('cs@flowershop.com', 'Flower Shop'); // from email and from name.
		$this->email->to($this->input->post('email'));
		$this->email->subject('Your password has been changed');
		$this->email->message('Your password has been changed');

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function index() {
		$item['list'] = $this->cart->contents();
		$data['title'] = 'Cart Page';
		
		$this->load->view('templates/main_header', $data);
		$this->load->view('cart/index', $data, $item);
		$this->load->view('templates/main_footer');
	}

	public function checkout() {
		if ($this->cart->total() == 0) {
			redirect('product');
		}

		if ($this->session->userdata['status'] != 'login') {
			$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Please login or register</div>');
			redirect('auth');
		} else {
			$data['title'] = 'Checkout Page';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('templates/main_header', $data);
			$this->load->view('checkout/index');
			$this->load->view('templates/main_footer');
		}
		
	}

	public function complete_order() {


		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Checkout Page';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('templates/main_header', $data);
			$this->load->view('checkout/index');
			$this->load->view('templates/main_footer');
		} else {
			$data = [
				'user_id' => $this->input->post('id'),
        		'name' => htmlspecialchars($this->input->post('name', true)),
        		'email' => htmlspecialchars($this->input->post('email', true)),
        		'phone' => $this->input->post('phone'),
        		'country' => $this->input->post('country'),
        		'address1' => $this->input->post('address1'),
        		'address2' => $this->input->post('address2'),
        		'city' => $this->input->post('city'),
        		'postcode' => $this->input->post('postcode'),
        		'total' => $this->cart->total(),
                'date_order' => time()
        	];
        	$this->db->insert('order', $data);
        	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Hooray! your account has been created.</div>');
        	echo $this->success();
		}
	}

	public function success() {
		$data['title'] = 'Success Order Page';
		
		$this->load->view('templates/main_header', $data);
		$this->load->view('checkout/success');
		$this->load->view('templates/main_footer');
	}

}

/* End of file Cart.php */
/* Location: ./application/controllers/Cart.php */
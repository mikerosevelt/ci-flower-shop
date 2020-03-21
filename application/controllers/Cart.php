<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cart_model');
	}

	public function index()
	{
		$item['list'] = $this->cart->contents();
		$data['title'] = 'Cart Page';

		$this->load->view('templates/main/header', $data);
		$this->load->view('cart/index', $data, $item);
		$this->load->view('templates/main/footer');
	}

	public function checkout()
	{
		if ($this->cart->total() == 0) {
			redirect('product');
		}

		if ($this->session->userdata['status'] != 'login') {
			$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Please login or register</div>');
			redirect('auth');
		} else {
			$data['title'] = 'Checkout Page';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('templates/main/header', $data);
			$this->load->view('checkout/index');
			$this->load->view('templates/main/footer');
		}
	}

	public function complete_order()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Checkout Page';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('templates/main/header', $data);
			$this->load->view('checkout/index');
			$this->load->view('templates/main/footer');
		} else {
			$this->Cart_model->completeOrder();
			// Send Email function
			$this->_sendEmail();
			redirect('cart/success');
		}
	}

	private function _sendEmail()
	{
		$this->load->library('email', $config);

		// You will NOT need to use the $this->email->initialize() method if you save your preferences in a config file.
		// $this->email->initialize($config);

		$table = '';
		foreach ($this->cart->contents() as $c) {
			$table .= '<tr>
				<td>' . $c['name'] . '</td>
				<td>Rp.' . number_format($c['price'], 0, ',', '.') . '</td>
				<td>' . $c['qty'] . '</td>
				<td>Rp.' . number_format($c['subtotal'], 0, ',', '.') . '</td>
				</tr>';
		}

		$this->email->from('cs@flowershop.com', 'Flower Shop'); // from email and from name.
		$this->email->to($this->input->post('email'));
		$this->email->subject('Order Confirmation');
		$this->email->message('<!DOCTYPE html>
        	<html>
			  	<head>
			    <meta charset="UTF-8">
			    <title>HTML Document Template</title>
			    <style>
			    body {
			    	max-width: 600px;
			    }
			    </style>
			  </head>
			  <body>
			    <h2 style="text-align: center;">Your order has been placed!</h2>
			    <p>Thank you for placing an order with flower shop. please make a payment of Rp.' . number_format($this->cart->total(), 0, ',', '.') . ' by making a transfer to our bank account 1234567890 (BCA A/N Flower Shop). We appreciate your patience, and we will inform you when your order is confirmed and ready to ship. We apologize for any inconvenience.</p>
				<h5 style="text-align: center;">Your order detail</h5> 
				<table style="text-align: center;" width="100%">
				<thead>
				<th>Item</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Subtotal</th>
				</thead>
				<tbody>' . $table . '</tbody>
				<tfoot>
				<th colspan=4 style="text-align:right">Total : ' . number_format($this->cart->total(), 0, ',', '.') . '</th>
				</tfoot>
				</table>
			  </body>
			</html>');
		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function success()
	{
		$this->cart->destroy();

		$data['title'] = 'Success Order Page';

		$this->load->view('templates/main/header', $data);
		$this->load->view('checkout/success');
		$this->load->view('templates/main/footer');
	}
}

/* End of file Cart.php */
/* Location: ./application/controllers/Cart.php */

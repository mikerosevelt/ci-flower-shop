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

		$this->load->view('templates/main_header', $data);
		$this->load->view('cart/index', $data, $item);
		$this->load->view('templates/main_footer');
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
			$this->load->view('templates/main_header', $data);
			$this->load->view('checkout/index');
			$this->load->view('templates/main_footer');
		}
	}

	public function complete_order()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Checkout Page';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('templates/main_header', $data);
			$this->load->view('checkout/index');
			$this->load->view('templates/main_footer');
		} else {
			$this->Cart_model->completeOrder();

			// $this->_sendEmail(); // Send Email func
			redirect('cart/success');
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
        $this->email->subject('Order Confirmation');
        $this->email->message('THANK YOU FOR YOUR ORDER');
        // if ($type == 'order') {
        //     $this->email->subject('Order Confirmation');
        //     $this->email->message('THANK YOU FOR YOUR ORDER');
        // } else if ($type == 'forgot') {
        //     $this->email->subject('Reset Password');
        //     $this->email->message('HEHEHE');
        // }

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

		$this->load->view('templates/main_header', $data);
		$this->load->view('checkout/success');
		$this->load->view('templates/main_footer');
	}
}

/* End of file Cart.php */
/* Location: ./application/controllers/Cart.php */

<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Bangkok');
class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata['role_id'] != 1) {
			redirect('home');
		}

		if ($this->session->userdata['status'] != 'login') {
			redirect('auth');
		}

		$this->load->model('User_model');
		$this->load->model('Product_model');
		$this->load->model('Order_model');
		$this->load->model('Invoices_model');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$query = "SELECT `user`.`name`,`user`.`email`,`user`.`is_active`,`user_log`.`last_login`
				  FROM `user`
				  JOIN `user_log` ON `user_log`.`user_id` = `user`.`id`";
		$data['list'] = $this->db->query($query)->result_array();
		$data['total'] = $this->db->get('user')->num_rows();
		$data['totalproduct'] = $this->db->get('product')->num_rows();
		$data['totalorder'] = $this->db->get('order')->num_rows();

		$this->load->view('templates/admin_header', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/admin_footer');
	}

	public function users()
	{
		$data['title'] = 'Users';
		$data['list'] = $this->User_model->getAllUser()->result_array();
		$data['total'] = $this->User_model->getAllUser()->num_rows();

		$this->load->view('templates/admin_header', $data);
		$this->load->view('admin/users/users', $data);
		$this->load->view('templates/admin_footer');
	}

	public function orders()
	{
		$data['title'] = 'Orders';
		$data['total'] = $this->db->get('order')->num_rows();
        
        // Pagination Config
        $config['base_url'] = 'http://localhost/flower/admin/orders';
        $config['total_rows'] = $data['total'];
        $config['per_page'] = 1;
        // $config['num_links'] = 1;

        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();

        $start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['list'] = $this->Order_model->getOrders($config['per_page'], $start);

		$this->load->view('templates/admin_header', $data);
		$this->load->view('admin/orders/orders',$data);
		$this->load->view('templates/admin_footer');
	}

	public function products()
	{
		$data['title'] = 'Products';
		$data['list'] = $this->Product_model->getAllProduct()->result_array();
		$data['total'] = $this->Product_model->getAllProduct()->num_rows();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('admin/products/products', $data);
		$this->load->view('templates/admin_footer');
	}

	public function invoices()
	{
		$data['title'] = 'Invoices';
		// $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['list'] = $this->Invoices_model->getAllInvoiceList()->result_array();
		$data['total'] = $this->db->get('invoice')->num_rows();

		$this->load->view('templates/admin_header', $data);
		$this->load->view('admin/invoices/invoices',$data);
		$this->load->view('templates/admin_footer');
	}

	public function reports()
	{
		$data['title'] = 'Reports';

		$this->load->view('templates/admin_header', $data);
		$this->load->view('admin/reports/reports');
		$this->load->view('templates/admin_footer');
	}

	public function help()
	{
		$data['title'] = 'Help';

		$this->load->view('templates/admin_header', $data);
		$this->load->view('admin/help/help');
		$this->load->view('templates/admin_footer');
	}

	public function settings()
	{
		$data['title'] = 'Settings';

		$this->load->view('templates/admin_header', $data);
		$this->load->view('admin/setting/setting');
		$this->load->view('templates/admin_footer');
	}

	public function myProfile()
	{
		$data['title'] = 'My Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$id = $data['user']['id'];
		$data['detail'] = $this->User_model->getUserDetail($id)->row_array();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('admin/profile/index', $data);
		$this->load->view('templates/admin_footer');
	}

	/**
	* USER PART
	*/
	public function user_detail()
	{
		$data['title'] = 'User Detail';

		$id = $this->uri->segment(3);
		if ($id) {
			$data['detail'] = $this->User_model->getUserDetail($id)->row_array();
			$this->load->view('templates/admin_header', $data);
			$this->load->view('admin/users/user_detail', $data);
			$this->load->view('templates/admin_footer');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  													Something went wrong.
  													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    												<span aria-hidden="true">&times;</span>
  													</button>
													</div>');
			redirect('admin/users');
		}
		
	}

	public function delete_user()
	{
		$id = $this->uri->segment(3);
		if ($id) {
			$this->User_model->deleteUser($id);
			$this->session->set_flashdata('swal', 'User has been deleted');
			redirect('admin/users');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  													Something went wrong.
  													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    												<span aria-hidden="true">&times;</span>
  													</button>
													</div>');
			redirect('admin/users');
		}
		
	}

	public function resendActivationEmail()
	{
		$id = $this->input->post('id', true);
		$email = $this->input->post('email', true);
		$token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];
        $this->db->insert('user_token', $user_token);
        $this->_sendEmail($token);
        $this->session->set_flashdata('swal', 'Activation email has been sent.');
        redirect('admin/user_detail/'.$id);
	}

	private function _sendEmail($token)
    {
        $this->load->library('email', $config);
        // You will NOT need to use the $this->email->initialize() method if you save your preferences in a config file.
        // $this->email->initialize($config);
        $this->email->from('noreply@flowershop.com', 'Flower Shop'); // from email and from name.
        $this->email->to($this->input->post('email'));
        $this->email->subject('User Activation');
        $this->email->message('Click to activate your account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">
        Activate</a>');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

	/**
	* ORDER PART
	*/
	public function orderDetail()
	{
		$data['title'] = 'Order Detail';

		$id = $this->uri->segment(3);
		$data['detail'] = $this->Order_model->getOrderDetail($id)->row_array();
		
		if ($id) {
			$data['items'] = $this->Order_model->getOrderItems($id)->result_array();
			$data['orderstat'] = ['Pending', 'On Process', 'Shipped', 'Delivered', 'Cancelled'];
			$data['paystatus'] = ['Unpaid', 'Paid'];
			$this->load->view('templates/admin_header', $data);
			$this->load->view('admin/orders/order_detail', $data);
			$this->load->view('templates/admin_footer');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  													Something went wrong.
  													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    												<span aria-hidden="true">&times;</span>
  													</button>
													</div>');
			redirect('admin/orders');
		}
	}

	public function deleteOrder($id)
	{
		$this->Order_model->deleteOrder($id);
		$this->session->set_flashdata('swal', 'deleted');
		redirect('admin/orders', 'refresh');
	}

	public function updateOrderStatus()
	{
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$this->db->set('status', $status);
		$this->db->where('id', $id);
		$this->db->update('order');
	}

	public function updateOrderPayStatus()
	{
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$this->db->set('payment_status', $status);
		$this->db->where('id', $id);
		$this->db->update('order');
	}

	/*
	* PRODUCT PART
	*/
	public function addProduct()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|required');
		$this->form_validation->set_rules('image', 'Image', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Add New Product';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('templates/admin_header', $data);
			$this->load->view('admin/products/add_product');
			$this->load->view('templates/admin_footer');
		} else {
			$this->Product_model->addNewProduct();
			$this->session->set_flashdata('swal', 'New product has been added.');
			redirect('admin/products');
		}
	}

	public function detail_product()
	{
		$data['title'] = 'Detail Product';

		$id = $this->uri->segment(3);
		$data['detail'] = $this->Product_model->getProductById($id)->row_array();
		if ($id) {
			$this->load->view('templates/admin_header', $data);
			$this->load->view('admin/products/detail_product', $data);
			$this->load->view('templates/admin_footer');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  													Something went wrong.
  													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    												<span aria-hidden="true">&times;</span>
  													</button>
													</div>');
			redirect('admin/products');
		}
	}

	public function editproduct()
	{
		$this->Product_model->editDataProduct();
		$this->session->set_flashdata('swal', 'Product has been edited');
		redirect('admin/products');
	}

	public function delete_product($id)
	{
		$this->Product_model->deleteProduct($id);
		$this->session->set_flashdata('swal', 'Product has been deleted');
		redirect('admin/products');
	}

	/**
	* INVOICES PART
	*/

	/**
	* REPORTS PART
	*/

	/**
	* HELP PART
	*/

	/**
	* SETTINGS PART
	*/
}

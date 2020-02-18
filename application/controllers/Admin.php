<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['list'] = $this->User_model->getAllUser()->result_array();
		$data['total'] = $this->User_model->getAllUser()->num_rows();
		$data['totalproduct'] = $this->Product_model->getAllProduct()->num_rows();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/admin_footer');
	}

	public function users()
	{
		$data['title'] = 'Users';
		$data['list'] = $this->User_model->getAllUser()->result_array();
		$data['total'] = $this->User_model->getAllUser()->num_rows();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('admin/users', $data);
		$this->load->view('templates/admin_footer');
	}

	public function orders()
	{
		$data['title'] = 'Orders';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['total'] = $this->db->get('order')->num_rows();
        $data['list'] = $this->Order_model->getAllOrder();

		$this->load->view('templates/admin_header', $data);
		$this->load->view('admin/orders',$data);
		$this->load->view('templates/admin_footer');
	}

	public function products()
	{
		$data['title'] = 'Products';
		$data['list'] = $this->Product_model->getAllProduct()->result_array();
		$data['total'] = $this->Product_model->getAllProduct()->num_rows();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('admin/products', $data);
		$this->load->view('templates/admin_footer');
	}

	// USER PART
	public function user_detail()
	{
		$data['title'] = 'User Detail';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$id = $this->uri->segment(3);
		$data['userid'] = $this->User_model->getUserById($id)->row_array();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('admin/user_detail', $data);
		$this->load->view('templates/admin_footer');
	}

	public function delete_user($id)
	{
		$this->User_model->deleteUser($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  													User has been deleted.
  													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    												<span aria-hidden="true">&times;</span>
  													</button>
													</div>');
		redirect('admin/users', 'refresh');
	}

	// ORDER PART

	public function deleteOrder($id)
	{
		$this->Order_model->deleteOrder($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  													Order has been deleted.
  													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    												<span aria-hidden="true">&times;</span>
  													</button>
													</div>');
		redirect('admin/orders', 'refresh');
	}


	// PRODUCT PART

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
			$this->load->view('admin/add_product');
			$this->load->view('templates/admin_footer');
		} else {
			$this->Product_model->addNewProduct();
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  													New product successful added.
  													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    												<span aria-hidden="true">&times;</span>
  													</button>
													</div>');
			redirect('admin/products');
		}
	}

	public function detail_product()
	{
		$data['title'] = 'Detail Product';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$id = $this->uri->segment(3);
		$data['detail'] = $this->Product_model->getProductById($id)->row_array();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('admin/detail_product', $data);
		$this->load->view('templates/admin_footer');
	}

	public function editproduct()
	{
		$this->Product_model->editDataProduct();
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  													Product detail has been updated.
  													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    												<span aria-hidden="true">&times;</span>
  													</button>
													</div>');
		redirect('admin/products');
	}

	public function delete_product($id)
	{
		$this->Product_model->deleteProduct($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  													Product successful deleted.
  													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    												<span aria-hidden="true">&times;</span>
  													</button>
													</div>');
		redirect('admin/products');
	}
}

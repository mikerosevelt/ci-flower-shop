<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Product extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model');
	}

	public function index()
	{
		$data['title'] = 'Product Page';
		$data['list'] = $this->Product_model->getAllProduct();
		$this->load->view('templates/main/header', $data);
		$this->load->view('product/index', $data);
		$this->load->view('templates/main/footer');
	}

	public function detail()
	{
		$data['title'] = 'Detail Page';
		$id = $this->uri->segment(3);
		$data['item'] = $this->Product_model->getProductById($id);
		$this->load->view('templates/main/header', $data);
		$this->load->view('product/detail', $data);
		$this->load->view('templates/main/footer');
	}

	public function addToCart()
	{
		$data = array(
			'id'      => $this->input->post('id'),
			'name'     => $this->input->post('name'),
			'price'   => $this->input->post('price'),
			'image'    => $this->input->post('image'),
			'qty' => $this->input->post('quantity')
		);
		$this->cart->insert($data);
		// return redirect('product/index');
		echo $this->index();
	}

	public function loadTotalPrice()
	{
		echo number_format($this->cart->total());
	}

	public function deleteCart($rowid)
	{
		if ($rowid == "all") {
			$this->cart->destroy();
		} else {
			$data = [
				'rowid' => $rowid,
				'qty' => 0
			];
			$this->cart->update($data);
		}
		redirect('cart');
	}

	public function update()
	{
		$cart_info = $_POST['cart'];
		foreach ($cart_info as $id => $cart) {
			$rowid = $cart['rowid'];
			$price = $cart['price'];
			$image = $cart['image'];
			$amount = $price * $cart['qty'];
			$qty = $cart['qty'];
			$data = [
				'rowid' => $rowid,
				'price' => $price,
				'image' => $image,
				'amount' => $amount,
				'qty' => $qty
			];
			$this->cart->update($data);
		}
		redirect('cart');
	}

	// Add product to wishlist
	public function addWishlist()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->Product_model->addProductToWishlist($data['user']['id']);
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
	// Get all products
	public function getAllProduct()
	{
		return $this->db->get('product')->result_array();
	}

	// Get paginate products
	public function getProducts($limit, $offset)
	{
		return $this->db->get('product', $limit, $offset)->result_array();
	}

	// Get single product by id
	public function getProductById($id)
	{
		return  $this->db->get_where('product', ['id' => $id])->row_array();
	}

	// Add product to database
	public function addNewProduct()
	{
		$config['upload_path']          = './assets/img/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = '2000';

		// $this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload('image')) {
			// success
		} else {
			echo $this->upload->display_errors();
		}
		$data = [
			'name' => $this->input->post('name', true),
			'price' => $this->input->post('price', true),
			'image' => $this->upload->data('file_name') ? $this->upload->data('file_name') : 'default.png',
			'description' => $this->input->post('description', true),
			'date_added' => time()
		];
		$this->db->insert('product', $data);
	}

	// Edit product
	public function editDataProduct()
	{
		$id = $this->input->post('id');
		$data['product'] = $this->db->get_where('product', ['id' => $id])->row_array();

		$config['upload_path']          = './assets/img/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = '2000';
		// $this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload('image')) {
			if ($data['product']['image'] != 'default.png') {
				unlink(FCPATH . 'assets/img/' . $data['product']['image']);
			}
			$data = [
				'name' => $this->input->post('name', true),
				'price' => $this->input->post('price', true),
				'image' => $this->upload->data('file_name'),
				'description' => $this->input->post('description', true),
				'date_added' => time()
			];
			$this->db->where('id', $id);
			$this->db->update('product', $data);
		} else {
			echo $this->upload->display_errors();
		}
	}

	// Delete product from database
	public function deleteProduct($id)
	{
		$data = $this->getProductById($id);
		if ($data['image'] != 'default.png') {
			unlink(FCPATH . 'assets/img/' . $data['image']);
		}
		$this->db->where('id', $id);
		$this->db->delete('product');
	}

	// Add product to user wishlist
	public function addProductToWishlist($userid)
	{
		$data = [
			'user_id' => $userid,
			'product_id' => $this->input->post('id')
		];

		$this->db->insert('wishlist', $data);
	}

	public function checkWishlistItem($userId, $productId)
	{
		$this->db->select('*');
		$this->db->from('wishlist');
		$this->db->where('user_id', $userId);
		$this->db->where('product_id', $productId);
		return $this->db->get()->row_array();
	}
}

/* End of file Product_model.php */
/* Location: ./application/models/Product_model.php */

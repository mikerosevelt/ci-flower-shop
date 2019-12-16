<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

	public function getAllProduct() {
		return $this->db->get('product');
	}

	public function getProductById($id) {
		$query = $this->db->get_where('product', ['id' => $id]);
		return $query;
	}

	public function addNewProduct() {

		$data = [
			'name' => $this->input->post('name', true),
			'price' => $this->input->post('price', true),
			'image' => $this->input->post('image'),
			'description' => $this->input->post('description', true),
			'date_added' => time()
		];

		$this->db->insert('product', $data);
	}

	public function editDataProduct() {
		$data = [
			'name' => $this->input->post('name', true),
			'price' => $this->input->post('price', true),
			'image' => $this->input->post('image'),
			'description' => $this->input->post('description', true),
			'date_added' => time()
		];
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('product', $data);
	}

	public function deleteProduct($id) {
		$this->db->where('id', $id);
		$this->db->delete('product');
	}

}

/* End of file Product_model.php */
/* Location: ./application/models/Product_model.php */
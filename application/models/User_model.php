<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
	// Get all users 
	public function getAllUser()
	{
		return $this->db->get('user');
	}

	// Get all users activity
	public function getUserActivityList()
	{
		$this->db->select('user_role.role, user_log.last_login, user.name, user.email');
		$this->db->from('user');
		$this->db->join('user_log', 'user_log.user_id = user.id');
		$this->db->join('user_role', 'user_role.id = user.role_id');
		$this->db->order_by('user_log.last_login', 'desc');

		return $this->db->get()->result_array();
	}

	// Get single user by id
	public function getUserById($id)
	{
		$query = $this->db->get_where('user', ['id' => $id]);
		return $query;
	}

	// Get a user detail by id
	public function getUserDetail($id)
	{
		$this->db->select('user_detail.*, user_log.*, user.name, user.email, user.is_active, user.date_created');
		$this->db->from('user');
		$this->db->join('user_detail', 'user_detail.user_id = user.id');
		$this->db->join('user_log', 'user_log.user_id = user.id');
		$this->db->where('user.id', $id);
		return $this->db->get()->row_array();
	}

	// Delete a user, user detail and user log
	public function deleteUser($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user');
		$this->db->where('user_id', $id);
		$this->db->delete('user_detail');
		$this->db->where('user_id', $id);
		$this->db->delete('user_log');
	}

	// Update user detail
	public function updateDetail()
	{
		$userId = $this->db->get('user_detail')->row_array();
		$id = $this->input->post('id');
		$name = $this->input->post('name');

		$this->db->set('name', $name);
		$this->db->where('id', $id);
		$this->db->update('user');


		if (!$userId['user_id'] || $userId['user_id'] != $id) {
			$address = $this->input->post('address', true);
			$address2 = $this->input->post('address2', true);
			$city = $this->input->post('city', true);
			$zipcode = $this->input->post('zipcode', true);
			$state = $this->input->post('state', true);
			$country = $this->input->post('country', true);
			$phone = $this->input->post('phone', true);
			$data = [
				'user_id' => $id,
				'address' => $address,
				'address_2' => $address2,
				'city' => $city,
				'zipcode' => $zipcode,
				'state' => $state,
				'country' => $country,
				'phone' => $phone
			];

			$this->db->insert('user_detail', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your detail has been updated.</div>');
			redirect('myaccount');
		} else {
			$this->db->set('address', $address);
			$this->db->set('address_2', $address2);
			$this->db->set('city', $city);
			$this->db->set('zipcode', $zipcode);
			$this->db->set('state', $state);
			$this->db->set('country', $country);
			$this->db->set('phone', $phone);
			$this->db->where('user_id', $id);
			$this->db->update('user_detail');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your detail has been updated.</div>');
			redirect('myaccount');
		}
	}

	// Get user data by id
	public function getUserData($id)
	{
		$this->db->select('user_detail.*, user.name, user.email, user.is_active, user.date_created');
		$this->db->from('user');
		$this->db->join('user_detail', 'user_detail.user_id = user.id');
		$this->db->where('user.id', $id);
		return $this->db->get()->row_array();
	}

	// Get user wishlist product data (name, price, etc) by id
	public function getWishlistData($id)
	{
		$this->db->select('product.*, wishlist.*');
		$this->db->from('wishlist');
		$this->db->join('product', 'product.id = wishlist.product_id');
		$this->db->where('wishlist.user_id', $id);
		return $this->db->get()->result_array();
	}
	
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
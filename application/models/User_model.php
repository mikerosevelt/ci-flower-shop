<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

	public function getAllUser()
	{
		return $this->db->get('user');
	}

	public function getUserActivityList()
	{
		$query = "SELECT `user`.`name`,`user`.`email`,`user_role`.`role`,`user_log`.`last_login`
				  FROM `user`
				  JOIN `user_log` ON `user_log`.`user_id` = `user`.`id`
				  JOIN `user_role` ON `user_role`.`id` = `user`.`role_id`";

		return $this->db->query($query);
	}

	public function getUserById($id)
	{
		$query = $this->db->get_where('user', ['id' => $id]);
		return $query;
	}

	public function getUserDetail($id)
	{
		$query = "SELECT `user`.*, `user_detail`.`address`,`user_detail`.`address_2`,`user_detail`.`city`,`user_detail`.`zipcode`,`user_detail`.`state`,`user_detail`.`country`,`user_detail`.`phone`, `user_log`.`ip_address`,`user_log`.`host`,`user_log`.`user_agent`,`user_log`.`last_login`
                  FROM `user` 
                  JOIN `user_detail` ON `user`.`id` = `user_detail`.`user_id`
                  JOIN `user_log` ON `user`.`id` = `user_log`.`user_id`
                  WHERE `user`.`id` = $id";
		return $this->db->query($query);
	}

	public function deleteUser($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user');
		$this->db->where('user_id', $id);
		$this->db->delete('user_detail');
		$this->db->where('user_id', $id);
		$this->db->delete('user_log');
	}

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
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You detail has been updated.</div>');
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
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You detail has been updated.</div>');
			redirect('myaccount');
		}
	}

	public function getUserData($id)
	{
		$query = "SELECT `user`.*, `user_detail`.*
          FROM `user` 
          JOIN `user_detail` ON `user`.`id` = `user_detail`.`user_id`
          WHERE `user`.`id` = $id";
		return  $this->db->query($query);
	}

	// Get user wishlist product data (name, price, etc)
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
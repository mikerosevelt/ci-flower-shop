<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	
	public function getAllUser() {
		return $this->db->get('user');
	}

	public function getUserById($id) {
		$query = $this->db->get_where('user', ['id' => $id]);
		return $query;
	}

	public function deleteUser($id) {
		$this->db->where('id', $id);
		$this->db->delete('user');
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
			$address = $this->input->post('address');
			$address2 = $this->input->post('address2');
			$city = $this->input->post('city');
			$zipcode = $this->input->post('zipcode');
			$state = $this->input->post('state');
			$country = $this->input->post('country');
			$phone = $this->input->post('phone');
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
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
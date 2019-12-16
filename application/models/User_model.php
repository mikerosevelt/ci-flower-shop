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
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
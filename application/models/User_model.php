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

	public function getUserDetail($id)
	{
		$query = "SELECT `user`.*, `user_detail`.`address`,`user_detail`.`address_2`,`user_detail`.`city`,`user_detail`.`zipcode`,`user_detail`.`state`,`user_detail`.`country`,`user_detail`.`phone`, `user_log`.`ip_address`,`user_log`.`host`,`user_log`.`user_agent`,`user_log`.`last_login`
                  FROM `user` 
                  JOIN `user_detail` ON `user`.`id` = `user_detail`.`user_id`
                  JOIN `user_log` ON `user`.`id` = `user_log`.`user_id`
                  WHERE `user`.`id` = $id";
        return $this->db->query($query);
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

	public function getUserData($id)
	{
		$query = "SELECT `user`.*, `user_detail`.*
          FROM `user` 
          JOIN `user_detail` ON `user`.`id` = `user_detail`.`user_id`
          WHERE `user`.`id` = $id";
		return  $this->db->query($query);
	}

	public function time_ago($timestamp){
	        
	  $time_ago        = $timestamp;
	  $current_time    = time();
	  $time_difference = $current_time - $time_ago;
	  $seconds         = $time_difference;
	  
	  $minutes = round($seconds / 60); // value 60 is seconds  
	  $hours   = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec  
	  $days    = round($seconds / 86400); //86400 = 24 * 60 * 60;  
	  $weeks   = round($seconds / 604800); // 7*24*60*60;  
	  $months  = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60  
	  $years   = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60
	                
	  if ($seconds <= 60){

	    return "Just Now";

	  } else if ($minutes <= 60){

	    if ($minutes == 1){

	      return "one minute ago";

	    } else {

	      return "$minutes minutes ago";

	    }

	  } else if ($hours <= 24){

	    if ($hours == 1){

	      return "an hour ago";

	    } else {

	      return "$hours hrs ago";

	    }

	  } else if ($days <= 7){

	    if ($days == 1){

	      return "yesterday";

	    } else {

	      return "$days days ago";

	    }

	  } else if ($weeks <= 4.3){

	    if ($weeks == 1){

	      return "a week ago";

	    } else {

	      return "$weeks weeks ago";

	    }

	  } else if ($months <= 12){

	    if ($months == 1){

	      return "a month ago";

	    } else {

	      return "$months months ago";

	    }

	  } else {
	    
	    if ($years == 1){

	      return "one year ago";

	    } else {

	      return "$years years ago";

	    }
	  }
	}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
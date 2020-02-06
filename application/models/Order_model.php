<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

	public function getAllOrder()
	{
		$query = "SELECT `order`.*, `user`.`name`,`user`.`email`,`order_status`.status
          FROM `user`
          JOIN `order` ON `order`.`user_id` = `user`.`id`
          JOIN `order_status` ON `order_status`.`id` = `order`.`status_id`";
		  // $this->db->select('*');
    //       $this->db->from('user');
    //       $this->db->join('order', 'order.user_id = user.id');

          // return $this->db->get();

        return $this->db->query($query)->result_array();
	}

	public function deleteOrder($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('order');
	}

}

/* End of file Order_model.php */
/* Location: ./application/models/Order_model.php */
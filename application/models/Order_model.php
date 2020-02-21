<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

	public function getAllOrder()
	{
		$query = "SELECT `order`.*, `user`.`name`,`user`.`email`,`order_status`.status,`order_status`.color
          FROM `user`
          JOIN `order` ON `order`.`user_id` = `user`.`id`
          JOIN `order_status` ON `order_status`.`id` = `order`.`status_id`";

        return $this->db->query($query);
	}

	public function deleteOrder($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('order');
		$this->db->where('order_id', $id);
		$this->db->delete('order_detail');
	}

	public function getUserOrder()
	{
		$query = "SELECT `order`.*, `order_detail`.*, `order_status`.status,`order_status`.color
          FROM `order`
          JOIN `order_detail` ON `order_detail`.`order_id` = `order`.`id`
          JOIN `order_status` ON `order_status`.`id` = `order`.`status_id`";

          return $this->db->query($query)->result_array();
	}

}

/* End of file Order_model.php */
/* Location: ./application/models/Order_model.php */
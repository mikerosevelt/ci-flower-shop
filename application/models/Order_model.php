<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

	public function getAllOrder()
	{
		$query = "SELECT `order`.*, `user`.`name`,`user`.`email`,`order_statuses`.`order_status`,`order_statuses`.`order_color`
          FROM `user`
          JOIN `order` ON `order`.`user_id` = `user`.`id`
          JOIN `order_statuses` ON `order_statuses`.`id` = `order`.`status_id`";

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
		$query = "SELECT `order`.*, `order_detail`.*, `order_statuses`.`order_status`,`order_statuses`.`order_color`
          FROM `order`
          JOIN `order_detail` ON `order_detail`.`order_id` = `order`.`id`
          JOIN `order_statuses` ON `order_statuses`.`id` = `order`.`status_id`";

          return $this->db->query($query)->result_array();
	}

	public function getOrderDetail($id)
	{
		# code...
	}

}

/* End of file Order_model.php */
/* Location: ./application/models/Order_model.php */
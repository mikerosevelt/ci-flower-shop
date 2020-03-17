<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

	public function getAllOrder()
	{
		$query = "SELECT `order`.*, `user`.`name`,`user`.`email`
          FROM `order`
          JOIN `user` ON `order`.`user_id` = `user`.`id`";

        return $this->db->query($query);
	}

	public function deleteOrder($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('order');
		$this->db->where('order_id', $id);
		$this->db->delete('order_detail');
	}

	public function getUserOrderList($id)
	{
		return $this->db->get_where('order', ['user_id' => $id]);
	}

	public function getUserOrderDetail()
	{
		$query = "SELECT `order`.*, `order_detail`.* `order_statuses`.`order_status`,`order_statuses`.`order_color`, `payment_statuses`.`payment_status`, `payment_statuses`.`payment_color`
          FROM `order`
          JOIN `order_statuses` ON `order_statuses`.`id` = `order`.`status_id`
          JOIN `payment_statuses` ON `payment_statuses`.`id` = `order`.`payment_status`
          WHERE `order`.`user_id` = $id";

          return $this->db->query($query);
	}

	public function getOrderDetail($id)
	{
		return $this->db->get_where('order', ['id' => $id]);
	}

	public function getOrderItems($id)
	{
		$query = "SELECT `order`.*, `order_detail`.*
				  FROM `order`
				  JOIN `order_detail` ON `order_detail`.`order_id` = `order`.`id`
				  WHERE `order_detail`.`order_id` = $id";
		return $this->db->query($query);
	}

}

/* End of file Order_model.php */
/* Location: ./application/models/Order_model.php */
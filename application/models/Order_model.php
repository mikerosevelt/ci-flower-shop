<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends CI_Model
{
	// Get all orders
	public function getAllOrder()
	{
		$this->db->select('order.*, user.name, user.email');
		$this->db->from('order');
		$this->db->join('user', 'order.user_id = user.id');
		return $this->db->get()->result_array();
	}

	// Get order with pagination
	public function getOrders($limit, $start)
	{
		$this->db->limit($limit, $start);
		$this->db->select('*');
		$this->db->from('order');
		$this->db->join('user', 'user.id = order.user_id');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

	// Delete order
	public function deleteOrder($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('order');
		$this->db->where('order_id', $id);
		$this->db->delete('order_detail');
	}

	// Get all user order list
	public function getUserOrderList($id)
	{
		return $this->db->get_where('order', ['user_id' => $id])->result_array();
	}

	// Get single user order detail by id
	public function getUserOrderDetail($id)
	{
		$this->db->select('order_detail.*, order_statuses.*, payment_statuses.*, order.*');
		$this->db->from('order');
		$this->db->join('order_statuses', 'order_statuses.id = order.status_id');
		$this->db->join('payment_statuses', 'payment_statuses.id = order.payment_status');
		$this->db->where('order.user_id', $id);
		return $this->db->get()->row_array();
	}

	// Get order detail by id
	public function getOrderDetail($id)
	{
		return $this->db->get_where('order', ['id' => $id])->row_array();
	}

	// Get all order items list by id
	public function getOrderItems($id)
	{
		$this->db->select('order.*, order_detail.*');
		$this->db->from('order');
		$this->db->join('order_detail', 'order.id = order_detail.order_id');
		$this->db->where('order_detail.order_id', $id);
		return $this->db->get()->result_array();
	}
}

/* End of file Order_model.php */
/* Location: ./application/models/Order_model.php */
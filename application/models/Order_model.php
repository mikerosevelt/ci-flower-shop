<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

	public function getAllOrder()
	{
		$this->db->select('order.*, user.name, user.email');
		$this->db->from('order');
		$this->db->join('user', 'order.user_id = user.id');
		return $this->db->get();
	}

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

	public function getUserOrderDetail($id)
	{
		$this->db->select('order_detail.*, order_statuses.*, payment_statuses.*, order.*');
		$this->db->from('order');
		$this->db->join('order_statuses', 'order_statuses.id = order.status_id');
		$this->db->join('payment_statuses', 'payment_statuses.id = order.payment_status');
		$this->db->where('order.user_id', $id);
		return $this->db->get();

	}

	public function getOrderDetail($id)
	{
		return $this->db->get_where('order', ['id' => $id]);
	}

	public function getOrderItems($id)
	{
		$this->db->select('order.*, order_detail.*');
		$this->db->from('order');
		$this->db->join('order_detail', 'order.id = order_detail.order_id');
		$this->db->where('order_detail.order_id', $id);
		return $this->db->get();

	}

}

/* End of file Order_model.php */
/* Location: ./application/models/Order_model.php */
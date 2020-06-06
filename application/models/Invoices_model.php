<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoices_model extends CI_Model
{

	public function getAllInvoiceList()
	{
		$query = "SELECT `user`.`name`, `order`.`total`, `order`.`payment_status`, `invoice`.* 
				  FROM `invoice`
				  JOIN `user` ON `invoice`.`user_id` = `user`.`id`
				  JOIN `order` ON `invoice`.`order_id` = `order`.`id`";

		return $this->db->query($query)->result_array();
	}

	public function getInvoiceDetail($id)
	{
		$query = "SELECT `user`.`name`, `user`.`email`, `order`.*, `invoice`.* 
				  FROM `invoice`
				  JOIN `user` ON `invoice`.`user_id` = `user`.`id`
				  JOIN `order` ON `invoice`.`order_id` = `order`.`id`
				  WHERE `invoice`.`id` = $id";

		return $this->db->query($query);
	}

	public function getInvoiceDetailItems($id)
	{
		$this->db->join('order_detail', 'order_detail.order_id = order.id');
		$this->db->get_where('order', ['order_number' => $id]);
	}
}

/* End of file Invoices_model.php */
/* Location: ./application/models/Invoices_model.php */
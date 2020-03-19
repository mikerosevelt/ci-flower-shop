<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoices_model extends CI_Model {

	public function getAllInvoiceList()
	{
		$query = "SELECT `user`.`name`, `order`.`total`, `order`.`payment_status`, `invoice`.* 
				  FROM `invoice`
				  JOIN `user` ON `invoice`.`user_id` = `user`.`id`
				  JOIN `order` ON `invoice`.`order_id` = `order`.`id`";

		return $this->db->query($query);
	}

}

/* End of file Invoices_model.php */
/* Location: ./application/models/Invoices_model.php */
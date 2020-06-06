<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoices_model extends CI_Model
{
	// Get all invoices
	public function getAllInvoiceList()
	{
		$this->db->select('user.name, order.total, order.payment_status, invoice.*');
		$this->db->from('invoice');
		$this->db->join('user', 'user.id = invoice.user_id');
		$this->db->join('order', 'order.id = invoice.order_id');

		return $this->db->get()->result_array();
	}

	// Get single invoice detail by id
	public function getInvoiceDetail($id)
	{
		$this->db->select('user.name, user.email, order.*, invoice.*');
		$this->db->from('invoice');
		$this->db->join('user', 'user.id = invoice.user_id');
		$this->db->join('order', 'order.id = invoice.order_id');
		$this->db->where('invoice.id', $id);

		return $this->db->get()->row_array();
	}

	public function getInvoiceDetailItems($id)
	{
		$this->db->join('order_detail', 'order_detail.order_id = order.id');
		$this->db->get_where('order', ['order_number' => $id]);
	}
}

/* End of file Invoices_model.php */
/* Location: ./application/models/Invoices_model.php */
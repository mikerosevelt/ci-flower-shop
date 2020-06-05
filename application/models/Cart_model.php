<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart_model extends CI_Model
{

	public function completeOrder()
	{
		// insert order
		// $n = $this->db->get('order')->num_rows();
		$dataOrder = [
			'user_id' => $this->input->post('id'),
			'total' => $this->cart->total(),
			'payment_method' => $this->input->post('payment'),
			'shipping_name' => $this->input->post('name'),
			'shipping_address' => $this->input->post('address'),
			'shipping_address2' => $this->input->post('address2'),
			'shipping_city' => $this->input->post('city'),
			'shipping_zipcode' => $this->input->post('zipcode'),
			'shipping_state' => $this->input->post('state'),
			'shipping_country' => $this->input->post('country'),
			'shipping_phone' => $this->input->post('phone'),
			'status' => 'Pending',
			'payment_status' => 'Unpaid',
			'date_order' => time(),
			'ipaddress' => $this->input->ip_address()
		];
		$this->db->insert('order', $dataOrder);
		$order_id = $this->db->insert_id();
		// insert order_detail
		foreach ($this->cart->contents() as $c) {
			$orderDetail = [
				'order_id' => $order_id,
				'items' => $c['name'],
				'price' => $c['price'],
				'quantity' => $c['qty'],
				'subtotal' => $c['subtotal']
			];
			$this->db->insert('order_detail', $orderDetail);
		}
		// insert invoice
		$dataInvoice = [
			'user_id' => $this->input->post('id'),
			'order_id' => $order_id,
			'invoice_date' => time(),
			'due_date' => time()
		];
		$this->db->insert('invoice', $dataInvoice);
	}
}

/* End of file Cart_model.php */
/* Location: ./application/models/Cart_model.php */
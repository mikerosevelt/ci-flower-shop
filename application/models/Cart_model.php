<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model {

public function completeOrder()
	{
		$n = $this->db->get('order')->num_rows() + 1;
		$dataOrder = [
				'user_id' => $this->input->post('id'),
				'order_number' => $n++,
				'total' => $this->cart->total(),
				'status_id' => 1,
				'date_order' => time()
			];
			$this->db->insert('order', $dataOrder);

		$cartInfo = $this->cart->contents();
		if (is_array($cartInfo)) {
			$name = array();
			$price = array();
			$qty = array();
			foreach ($cartInfo as $c) {
				$name = $c['name'];
	   			$price = $c['price'];
	    		$qty = $c['qty'];

	    		$names[] = $name;
	    		$prices[] = $price;
	    		$quantities[] = $qty;
		}

		$items = implode(',', $names);
		$price = implode(',', $prices);
		$quantity = implode(',', $quantities);
			}
			    $orderDetail = [
					'order_id' => $this->db->insert_id(),
					'items' => $items,
					'price' => $price,
					'quantity' => $quantity,
					'shipping_address' => $this->input->post('address'),
					'shipping_address2' => $this->input->post('address2'),
					'shipping_city' => $this->input->post('city'),
					'shipping_zipcode' => $this->input->post('zipcode'),
					'shipping_state' => $this->input->post('state'),
					'shipping_country' => $this->input->post('country'),
					'shipping_phone' => $this->input->post('phone'),
					
				];
		$this->db->insert('order_detail', $orderDetail);
		// $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your order has been placed.</div>');
	}	

}

/* End of file Cart_model.php */
/* Location: ./application/models/Cart_model.php */
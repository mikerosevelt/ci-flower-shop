<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model {

public function completeOrder()
	{
		$n = $this->db->get('order')->num_rows();
		$dataOrder = [
				'user_id' => $this->input->post('id'),
				'order_number' => $n++,
				'total' => $this->cart->total(),
				'status_id' => 1,
				'date_order' => time()
			];
			$this->db->insert('order', $dataOrder);

			// $orderDetail = [
			// 	'order_id' => $this->db->insert_id(),
			// 	'product_id' => ,
			// ];
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your order has been placed.</div>');
	}	

}

/* End of file Cart_model.php */
/* Location: ./application/models/Cart_model.php */
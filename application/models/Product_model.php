<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{

	public function getAllProduct()
	{
		return $this->db->get('product');
	}

	public function getProductById($id)
	{
		$query = $this->db->get_where('product', ['id' => $id]);
		return $query;
	}

	public function addNewProduct()
	{
		$config['upload_path']          = './assets/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = '2000';

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('image')) {
        	$data = [
			'name' => $this->input->post('name', true),
			'price' => $this->input->post('price', true),
			'image' => $this->upload->data('file_name'),
			'description' => $this->input->post('description', true),
			'date_added' => time()
		];
	    $this->db->insert('product', $data);
        } else {
        	echo $this->uploaad->display_errors();
        }
	}

	public function editDataProduct()
	{	
		$id = $this->input->post('id');
		$data['product'] = $this->db->get_where('product', ['id' => $id])->row_array();

    	$config['upload_path']          = './assets/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = '2000';
        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('image')) {
        	if ($data['product']['image'] != 'default.png') {
            unlink(FCPATH . 'assets/img/' . $data['product']['image']);
        }
        $data = [
			'name' => $this->input->post('name', true),
			'price' => $this->input->post('price', true),
			'image' => $this->upload->data('file_name'),
			'description' => $this->input->post('description', true),
			'date_added' => time()
		];
		$this->db->where('id', $id);
		$this->db->update('product', $data);
        } else {
        	echo $this->upload->display_errors();
        }
       
	}

	public function deleteProduct($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('product');
	}
}

/* End of file Product_model.php */
/* Location: ./application/models/Product_model.php */

<?php
class OrderProduct_model extends CI_Model
{
	public $invoice;
	public $id_user;

	public function get_all()
	{
		$this->db->select('*');
		$this->db->from('order_product');
		$this->db->join('users', 'users.id_user = order_product.id_user');
		$this->db->join('product', 'product.id_product = order_product.id_product');
		$this->db->join('detail_order', 'detail_order.invoice = order_product.invoice');

		return $this->db->get()->result_array();
	}

	public function create($data)
	{
		$this->invoice = $data['invoice'];
		$this->id_user = $data['id_user'];
		$this->db->insert('order-product', $this);
	}

	public function update($data)
	{
		$this->invoice = $data['invoice'];
		$this->id_user = $data['id_user'];
		$this->db->update('order-product', $this, array('id' => $data['id']));
	}
	public function delete($where)
	{
		$this->db->delete('order-product', $where);
	}
}
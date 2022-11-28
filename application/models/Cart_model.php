<?php
class Cart_model extends CI_Model
{
	public $id_user;
	public $id_product;

	public function get_all()
	{
		$query = $this->db->get('cart');
		return $query->result();
	}

	public function create($data)
	{
		$this->id_user = $data['id_user'];
		$this->id_product = $data['id_product'];
		$this->db->insert('cart', $this);
	}

	public function update($data)
	{
		$this->id_user = $data['id_user'];
		$this->id_product = $data['id_product'];
		$this->db->update('cart', $this, array('id' => $data['id']));
	}
	public function delete($where)
	{
		$this->db->delete('cart', $where);
	}
}
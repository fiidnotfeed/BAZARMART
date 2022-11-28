<?php
class Category_model extends CI_Model
{
	public $name;

	public function get_all()
	{
		$query = $this->db->get('category');
		return $query->result();
	}

	public function create($data)
	{
		$this->name = $data['name'];
		$this->db->insert('category', $this);
	}

	public function update($data)
	{
		$this->name = $data['name'];
		$this->db->update('category', $this, array('id' => $data['id']));
	}
	public function delete($where)
	{
		$this->db->delete('category', $where);
	}
}
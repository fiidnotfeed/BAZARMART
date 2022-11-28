<?php
class Role_model extends CI_Model
{
	public $id_role;
	public $name;

	public function get_all()
	{
		$query = $this->db->get('Role');
		return $query->result();
	}

	public function create($data)
	{
		$this->id_role = $data['id_role'];
		$this->name = $data['name'];
		$this->db->insert('role', $this);
	}

	public function update($data)
	{
		$this->id_role = $data['id_role'];
		$this->name = $data['name'];
		$this->db->update('role', $this, array('id' => $data['id']));
	}
	public function delete($where)
	{
		$this->db->delete('role', $where);
	}
}
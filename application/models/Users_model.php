<?php
class Users_model extends CI_Model
{
	public $id_user;
	public $name;
	public $email;
	public $password;
	public $address;
	public $no_whatsapp;
	public $id_role;

	public function get_all()
	{
		$query = $this->db->get('users');
		return $query->result();
	}

	public function create($data)
	{
		$this->name = $data['name'];
		$this->email = $data['email'];
		$this->password = $data['password'];
		$this->address = $data['address'];
		$this->no_whatsapp = $data['no_whatsapp'];
		$this->id_role = $data['id_role'];
		$this->db->insert('users', $this);
	}

	public function update($data)
	{
		$this->id_user = $data['id_user'];
		$this->name = $data['name'];
		$this->email = $data['email'];
		$this->password = $data['password'];
		$this->address = $data['address'];
		$this->no_whatsapp = $data['no_whatsapp'];
		$this->id_role = $data['id_role'];
		$this->db->update('users', $this, array('id' => $data['id']));
	}

	public function delete($where)
	{
		$this->db->delete('users', $where);
	}
}
<?php
class Product_model extends CI_Model
{
	public $name;
	public $price;
	public $description;
	public $image;
	public $status;
	public $created_at;
	public $id_category;

	public function get_all()
	{
		$query = $this->db->get('product');
		return $query->result_array();
	}

	public function create($data)
	{
		$this->name = $data['name'];
		$this->price = $data['price'];
		$this->description = $data['description'];
		$this->image = $data['image'];
		$this->status = $data['status'];
		$this->created_at = $data['created_at'];
		$this->id_category = $data['id_category'];
		$this->db->insert('product', $this);
	}

	public function update($data)
	{
		$this->name = $data['name'];
		$this->price = $data['price'];
		$this->description = $data['description'];
		$this->image = $data['image'];
		$this->status = $data['status'];
		$this->created_at = $data['created_at'];
		$this->id_category = $data['id_category'];
		$this->db->update('product', $this, array('id' => $data['id']));
	}
	public function delete($where)
	{
		$this->db->delete('product', $where);
	}

	public function getByKategori($kategoriId)
	{
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where("product.id_category", $kategoriId);
		$this->db->join('category', 'category.id_category = product.id_category');

		return $this->db->get()->result_array();
	}
}
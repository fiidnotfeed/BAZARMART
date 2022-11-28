<?php
class DetailOrder_model extends CI_Model
{
	public $qty;
	public $pesan;
	public $id_product;
	public $invoice;

	public function get_all()
	{
		$query = $this->db->get('detail-order');
		return $query->result();
	}

	public function create($data)
	{
		$this->qty = $data['qty'];
		$this->pesan = $data['pesan'];
		$this->id_product = $data['id_product'];
		$this->invoice = $data['invoice'];
		$this->db->insert('detail-order', $this);
	}

	public function update($data)
	{
		$this->iqty = $data['qty'];
		$this->pesan = $data['pesan'];
		$this->id_product = $data['id_product'];
		$this->invoice = $data['invoice'];
		$this->db->update('detail-order', $this, array('id' => $data['id']));
	}
	public function delete($where)
	{
		$this->db->delete('detail-order', $where);
	}
}
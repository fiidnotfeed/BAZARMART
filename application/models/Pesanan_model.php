<?php
class Pesanan_model extends CI_Model
{
    public function get_all()
    {
        $query = $this->db->get('order_product');
        return $query->result_array();
    }

    public function getByUserId()
    {
        $this->db->select('*');
        $this->db->from('order_product');
        $this->db->where("id_user", $this->session->userdata("user_id"));
        $this->db->join('product', 'product.id_product = order_product.id_product');

        return $this->db->get()->result_array();
    }

    public function getDetail($invoice)
    {
        $this->db->select('*');
        $this->db->from('order_product');
        $this->db->where("order_product.invoice", $invoice);
        $this->db->join('detail_order', 'detail_order.invoice = order_product.invoice');
        $this->db->join('product', 'product.id_product = order_product.id_product');

        return $this->db->get()->row_array();
    }
}
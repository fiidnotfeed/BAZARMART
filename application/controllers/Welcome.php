<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$data['category'] = $this->db->get('category')->result_array();

		$keyword = $this->input->get("search");
		if ($keyword) {
			$this->db->like('name', $keyword);
			$data["product"] = $this->db->get('product')->result_array();
		} else {
			$data['product'] = $this->db->order_by('id_product', 'DESC')->get_where('product', ['status' => 1])->result_array();
		}
		$data["title"] = "Home";

		$this->load->view('template/customer/head', $data);
		$this->load->view('home', $data);
		$this->load->view('template/customer/footer');
	}
}
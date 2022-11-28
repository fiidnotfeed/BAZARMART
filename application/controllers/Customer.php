<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pesanan_model', 'pesanan');
		$this->load->model('Product_model', 'product');
		$this->load->model('Category_model', 'category');
	}

	public function index()
	{
		$data['category'] = $this->db->get('tb_category')->result_array();
		$data['product'] = $this->db->order_by('product_id', 'DESC')->limit(8)->get_where('tb_product', ['product_status' => 1])->result_array();
		$this->load->view('template/customer/head');
		$this->load->view('home', $data);
		$this->load->view('template/customer/footer');
	}

	public function product()
	{
		$data['category'] = $this->category->get_all();
		$data['products'] = $this->product->get_all();
		$this->load->view('template/customer/head', $data);
		$this->load->view('customer/product/index');
		$this->load->view('template/customer/footer');
	}
	public function update()
	{
		$this->load->view('produk/update');
	}

	public function delete($id_product)
	{
		echo "Controller Delete Produk " . $id_product;
	}

	public function detail($id = null)
	{
		$data['product'] = $this->db->get_where('tb_product', ['product_id' => $id])->row();
		$this->load->view('detail-produk', $data);
	}

	public function pesanan($invoice = null)
	{
		if ($invoice) {
			$data['product'] = $this->pesanan->getDetail($invoice);
			$data['category'] = $this->db->get('category')->result_array();
			$data['title'] = 'Detail Pesanan';

			$this->load->view('template/customer/head', $data);
			$this->load->view('customer/pesanan/detail');
			$this->load->view('template/customer/footer');
		} else {
			$data['product'] = $this->pesanan->getByUserId($this->session->userdata("user_id"));
			$data['category'] = $this->db->get('category')->result_array();
			$data['title'] = 'Pesanan';

			$this->load->view('template/customer/head', $data);
			$this->load->view('customer/pesanan/index');
			$this->load->view('template/customer/footer');
		}
	}
}
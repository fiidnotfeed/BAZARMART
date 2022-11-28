<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model', 'product');
	}

	public function index()
	{
		if ($this->session->userdata("login")) {
			if ($this->session->userdata("role_id") == 1) {
				$data['product'] = $this->db->get('product')->result_array();
				$data['title'] = 'Daftar Produk';

				$this->load->view('template/admin/head', $data);
				$this->load->view('admin/produk/index', $data);
				$this->load->view('template/admin/footer');
			} else {
				redirect("/");
			}
		} else {
			redirect("auth");
		}
	}

	public function create()
	{
		$this->form_validation->set_rules("name", "Name", "trim|required");
		$this->form_validation->set_rules("price", "Price", "trim|required");
		$this->form_validation->set_rules("description", "Description", "trim|required");

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Tambah Produk';
			$data['category'] = $this->db->get('category')->result_array();

			$this->load->view('template/admin/head', $data);
			$this->load->view('admin/produk/create', $data);
			$this->load->view('template/admin/footer');
		} else {
			$gambarProduk = $_FILES["image"]["name"];

			if ($gambarProduk) {
				$config['upload_path'] = './assets/images/produk';
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size']     = '2048';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload("image")) {
					$data = [
						"name" => htmlspecialchars($this->input->post("name", true)),
						"price" => htmlspecialchars($this->input->post("price", true)),
						"description" => $this->input->post("description"),
						"image" => $gambarProduk,
						"status" => $this->input->post("status"),
						"id_category" => $this->input->post("id_category"),
					];

					$this->db->insert("product", $data);
					$this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show" role="alert">Poduct has been created <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
					redirect("produk");
				} else {
					echo $this->upload->display_errors();
				}
			}
		}
	}
	public function update($productId)
	{
		$this->form_validation->set_rules("name", "Name", "trim|required");
		$this->form_validation->set_rules("price", "Price", "trim|required");
		$this->form_validation->set_rules("description", "Description", "trim|required");

		if ($this->form_validation->run() == false) {
			$data['product'] = $this->db->get_where('product', ['id_product' => $productId])->row_array();
			$data['category'] = $this->db->get('category')->result_array();
			$data['title'] = 'Edit Produk';

			$this->load->view('template/admin/head', $data);
			$this->load->view('admin/produk/update', $data);
			$this->load->view('template/admin/footer');
		} else {
			$gambarProduk = $_FILES["image"]["name"];

			if ($gambarProduk) {
				$config['upload_path'] = './assets/images/produk';
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size']     = '2048';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload("image")) {
					$oldImage = $this->input->post("oldImage");
					unlink(FCPATH . "assets/images/produk/" . $oldImage);

					$newImage = $this->upload->data("file_name");
					$this->db->set("image", $newImage);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set("name", htmlspecialchars($this->input->post("name", true)));
			$this->db->set("price", htmlspecialchars($this->input->post("price")));
			$this->db->set("description", $this->input->post("description"));
			$this->db->set("status", $this->input->post("status"));
			$this->db->set("id_category", $this->input->post("id_category"));
			$this->db->where("id_product", $productId);
			$this->db->update("product");

			$this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show" role="alert">Poduct has been updated <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
			redirect("produk");
		}
	}

	public function delete($productId)
	{
		$product = $this->db->get_where("product", ["id_product" => $productId])->row_array();
		unlink(FCPATH . "assets/images/produk/" . $product["image"]);

		$this->db->where("id_product", $productId);
		$this->db->delete("product");

		$this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show" role="alert">Poduct has been deleted <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
		redirect("produk");
	}

	public function detail($id = null)
	{
		$data['product'] = $this->db->get_where('product', ['id_product' => $id])->row_array();
		$data['category'] = $this->db->get('category')->result_array();
		$data['title'] = 'Detail Produk';

		$this->load->view('template/customer/head', $data);
		$this->load->view('produk/detail', $data);
		$this->load->view('template/customer/footer');
	}

	public function kategori($kategoriId)
	{
		$keyword = $this->input->get("search");
		if ($keyword) {
			$this->db->like('name', $keyword);
			$data['product'] = $this->product->getByKategori($kategoriId);
		} else {
			$data['product'] = $this->product->getByKategori($kategoriId);
		}

		$data['kategori'] = $this->db->get_where('category', ['id_category' => $kategoriId])->row_array();
		$data['category'] = $this->db->get('category')->result_array();
		$data['title'] = 'Kategori ' . $data['kategori']['category_name'];

		$this->load->view('template/customer/head', $data);
		$this->load->view('produk/kategori', $data);
		$this->load->view('template/customer/footer');
	}
}
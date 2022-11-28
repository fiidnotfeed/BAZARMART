<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('OrderProduct_model', 'order');
    }

    public function index()
    {
        if ($this->session->userdata("login")) {
            if ($this->session->userdata("role_id") == 1) {
                $data['pesanan'] = $this->order->get_all();
                $data["title"] = "Daftar Pesanan";

                $this->load->view('template/admin/head', $data);
                $this->load->view('admin/pesanan/index', $data);
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
        if ($this->session->userdata("email")) {
            $this->form_validation->set_rules("qty", "Qty", "trim|required");
            $this->form_validation->set_rules("pesan", "Pesan", "trim");

            if ($this->form_validation->run() == false) {
                $data["title"] = "Detail Produk";
                $data['product'] = $this->db->get_where('product', ['id_product' => $this->input->post("id_product")])->row_array();
                $data['category'] = $this->db->get('category')->result_array();

                $this->load->view('template/admin/head', $data);
                $this->load->view('produk/detail', $data);
                $this->load->view('template/admin/footer');
            } else {
                $data_cart = [
                    "id_user" => $this->session->userdata("user_id"),
                    "id_product" => $this->input->post("id_product"),
                    "qty" => $this->input->post("qty")
                ];

                $this->db->insert("order_product", $data_cart);
                $detail_order = [
                    "invoice" => $this->db->insert_id(),
                    "pesan" => htmlspecialchars($this->input->post("pesan", true)),
                ];

                $this->db->insert("detail_order", $detail_order);

                redirect("customer/pesanan");
            }
        } else {
            $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show" role="alert">Login Dulu<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect("auth");
        }
    }

    public function uploadBukti()
    {
        $buktiBayar = $_FILES["bukti_bayar"]["name"];

        if ($buktiBayar) {
            $config['upload_path'] = './assets/images/bukti';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size']     = '2048';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload("bukti_bayar")) {

                $this->db->set('bukti_bayar', $buktiBayar);
                $this->db->where('invoice', $this->input->post("invoice"));
                $this->db->update('detail_order');

                redirect("customer/pesanan");
            } else {
                echo $this->upload->display_errors();
            }
        }
    }

    public function delete($invoice)
    {
        $this->db->where("invoice", $invoice);
        $this->db->delete("detail_order");
        $this->db->where("invoice", $invoice);
        $this->db->delete("order_product");

        redirect("customer/pesanan");
    }

    public function konfirmasi()
    {
        $this->db->set("status_order", "Terkonfirmasi");
        $this->db->where("invoice", $this->input->post("invoice"));
        $this->db->update("order_product");

        redirect("pesanan");
    }
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata("email")) {
            if ($this->session->userdata("role_id") == 1) {
                $produk = $this->db->query("SELECT * FROM product");
                $order = $this->db->query("SELECT * FROM order_product");
                $customer = $this->db->query("SELECT * FROM users WHERE id_role = 2");

                $data["title"] = "Dashboard";
                $data["jumlah_produk"] = $produk->num_rows();
                $data["jumlah_pesanan"] = $order->num_rows();
                $data["jumlah_customer"] = $customer->num_rows();

                $this->load->view('template/admin/head', $data);
                $this->load->view('admin/dashboard', $data);
                $this->load->view('template/admin/footer');
            } else {
                redirect("/");
            }
        } else {
            $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show" role="alert">Login Dulu<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect("auth");
        }
    }
}
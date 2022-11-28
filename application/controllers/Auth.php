<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model', 'user');
    }

    public function index()
    {
        if ($this->session->userdata("email")) {
            redirect("/");
        } else {
            $this->form_validation->set_rules("email", "Email", "trim|required");
            $this->form_validation->set_rules("password", "Password", "trim|required");

            if ($this->form_validation->run() == false) {
                $data["title"] = "Login";
                $data['category'] = $this->db->get('category')->result_array();

                $this->load->view('template/customer/head', $data);
                $this->load->view('auth/login');
                $this->load->view('template/customer/footer');
            } else {
                $this->_login();
            }
        }
    }

    public function _login()
    {
        $email = $this->input->post("email");
        $password = $this->input->post("password");
        $user = $this->db->get_where("users", ["email" => $email])->row_array();

        if ($user) {
            if (password_verify($password, $user["password"])) {
                $data = [
                    "login" => true,
                    "user_id" => $user["id_user"],
                    "name" => $user["name"],
                    "email" => $user["email"],
                    "role_id" => $user["id_role"]
                ];

                $this->session->set_userdata($data);

                if ($user["id_role"] == 1) {
                    redirect("admin");
                }

                redirect("/");
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show" role="alert">Login Failed<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                redirect("auth");
            }
        } else {
            $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show" role="alert">Login Failed<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect("auth");
        }
    }

    public function register()
    {
        $this->form_validation->set_rules("name", "Name", "required|trim");
        $this->form_validation->set_rules("address", "Address", "required|trim");
        $this->form_validation->set_rules("no_whatsapp", "No Whatsapp", "required|trim");
        $this->form_validation->set_rules("email", "Email", "required|trim|valid_email|is_unique[users.email]", [
            "is_unique" => "This email has already registered"
        ]);
        $this->form_validation->set_rules("password1", "Password", "required|trim|min_length[5]|matches[password2]", [
            "matches" => "Password dont match!",
            "min_length" => "Password is to short"
        ]);
        $this->form_validation->set_rules("password2", "Password", "required|trim|matches[password1]");

        if ($this->form_validation->run() == false) {
            $data["title"] = "Register";
            $data['category'] = $this->db->get('category')->result_array();

            $this->load->view('template/customer/head', $data);
            $this->load->view('auth/register');
            $this->load->view('template/customer/footer', $data);
        } else {
            $data = [
                "name" => htmlspecialchars($this->input->post("name", true)),
                "email" => htmlspecialchars($this->input->post("email", true)),
                "password" => password_hash($this->input->post("password1"), PASSWORD_DEFAULT),
                "id_role" => 2,
                "address" => htmlspecialchars($this->input->post("address", true)),
                "no_whatsapp" => htmlspecialchars($this->input->post("no_whatsapp", true)),
            ];

            $this->db->insert("users", $data);
            $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show" role="alert">Your account has been created <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect("auth");
        }
    }


    public function logout()
    {
        $this->session->unset_userdata("login");
        $this->session->unset_userdata("user_id");
        $this->session->unset_userdata("name");
        $this->session->unset_userdata("email");
        $this->session->unset_userdata("role_id");

        $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show" role="alert">You have been logged out<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        redirect("auth");
    }
}
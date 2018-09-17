<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//include general controller supaya bisa extends General_controller
require_once("application/core/General_controller.php");

class Admin extends General_controller {
	public function __construct() {
		parent::__construct();
        $this->load->model("Admin_model");
        parent::redirect_if_not_admin();
	}
	
	public function index()
	{
        $what = $this->Admin_model->get_what()[0]->what_text;
        $data = array(
			"title" => "Admin &mdash; Home",
			"menu_active" => parent::set_admin_menu_active("what"),
            "menu_title" => "What We Do",
            "what" => $what
		);
		
		parent::adminview("admin", $data);
    }

    public function get_what() {
        $what = $this->Admin_model->get_what()[0]->what_text;
        echo json_encode(array(
            "status" => "success",
            "data" => $what
        ));
    }

    public function update_what() {
        $what = $this->input->post("what");
        $data = array(
            "what_text" => $what
        );
        $affected_rows = $this->Admin_model->update_what($data);
        if ($affected_rows > 0) {
            $what = $this->Admin_model->get_what()[0]->what_text;
            echo json_encode(array(
                "status" => "success",
                "data" => $what
            ));
        } else {
            echo json_encode(array(
                "status" => "error"
            ));
        }
    }

    public function settings()
	{
		$data = array(
            "title" => "Admin &mdash; Settings",
            "menu_active" => parent::set_admin_menu_active("about_us"),
			"menu_title" => "Settings"
		);
		
		parent::adminview("admin_settings", $data);
    }
    
    public function do_change_password() {
        $oldPassword = $this->input->post("old-password", true);
		$newPassword = $this->input->post("new-password", true);

		$stored_password = $this->Admin_model->get_password()->admin_password;
		if (password_verify($oldPassword, $stored_password)) {
			$newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
			$this->Admin_model->update_password($newPassword);
			$this->session->set_flashdata("success_message", "Sukses ganti password");
			redirect(base_url("admin/settings"));
		} else {
			$this->session->set_flashdata("error_message", "Password lama salah");
			redirect(base_url("admin/settings"));
		}
    }
}

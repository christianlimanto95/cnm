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
			"title" => "Admin &mdash; What We Do",
			"menu_active" => parent::set_admin_menu_active("what"),
            "menu_title" => "What We Do",
            "what" => $what
		);
		
		parent::adminview("admin", $data);
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

    public function buy()
	{
        $buy = $this->Admin_model->get_buy()[0]->buy_text;
        $data = array(
			"title" => "Admin &mdash; Buy",
			"menu_active" => parent::set_admin_menu_active("buy"),
            "menu_title" => "Buy",
            "buy" => $buy
		);
		
		parent::adminview("admin_buy", $data);
    }

    public function update_buy() {
        $buy = $this->input->post("buy");
        $data = array(
            "buy_text" => $buy
        );
        $affected_rows = $this->Admin_model->update_buy($data);
        if ($affected_rows > 0) {
            $buy = $this->Admin_model->get_buy()[0]->buy_text;
            echo json_encode(array(
                "status" => "success",
                "data" => $buy
            ));
        } else {
            echo json_encode(array(
                "status" => "error"
            ));
        }
    }

    public function sell()
	{
        $sell = $this->Admin_model->get_sell()[0]->sell_text;
        $data = array(
			"title" => "Admin &mdash; Sell",
			"menu_active" => parent::set_admin_menu_active("sell"),
            "menu_title" => "Sell",
            "sell" => $sell
		);
		
		parent::adminview("admin_sell", $data);
    }

    public function update_sell() {
        $sell = $this->input->post("sell");
        $data = array(
            "sell_text" => $sell
        );
        $affected_rows = $this->Admin_model->update_sell($data);
        if ($affected_rows > 0) {
            $sell = $this->Admin_model->get_sell()[0]->sell_text;
            echo json_encode(array(
                "status" => "success",
                "data" => $sell
            ));
        } else {
            echo json_encode(array(
                "status" => "error"
            ));
        }
    }

    public function faq()
	{
        $faq = $this->Admin_model->get_faq()[0]->faq_text;
        $data = array(
			"title" => "Admin &mdash; FAQ",
			"menu_active" => parent::set_admin_menu_active("faq"),
            "menu_title" => "FAQ",
            "faq" => $faq
		);
		
		parent::adminview("admin_faq", $data);
    }

    public function update_faq() {
        $faq = $this->input->post("faq");
        $data = array(
            "faq_text" => $faq
        );
        $affected_rows = $this->Admin_model->update_faq($data);
        if ($affected_rows > 0) {
            $faq = $this->Admin_model->get_faq()[0]->faq_text;
            echo json_encode(array(
                "status" => "success",
                "data" => $faq
            ));
        } else {
            echo json_encode(array(
                "status" => "error"
            ));
        }
    }

    public function contact()
	{
        $contact = $this->Admin_model->get_contact()[0]->contact_text;
        $data = array(
			"title" => "Admin &mdash; Contact",
			"menu_active" => parent::set_admin_menu_active("contact"),
            "menu_title" => "Contact",
            "contact" => $contact
		);
		
		parent::adminview("admin_contact", $data);
    }

    public function update_contact() {
        $contact = $this->input->post("contact");
        $data = array(
            "contact_text" => $contact
        );
        $affected_rows = $this->Admin_model->update_contact($data);
        if ($affected_rows > 0) {
            $contact = $this->Admin_model->get_contact()[0]->contact_text;
            echo json_encode(array(
                "status" => "success",
                "data" => $contact
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

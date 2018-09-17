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
        $data = array(
			"title" => "Admin &mdash; Home",
			"menu_active" => parent::set_admin_menu_active("what"),
            "menu_title" => "What We Do"
		);
		
		parent::adminview("admin", $data);
    }
}

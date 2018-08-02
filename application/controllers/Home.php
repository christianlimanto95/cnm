<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//include general controller supaya bisa extends General_controller
require_once("application/core/General_controller.php");

class Home extends General_controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("Home_model");
	}
	
	public function index()
	{
        parent::load_additional_js("velocity.min");
		$data = array(
            "title" => "CNM"
		);
		
		parent::view("home", $data);
    }
}

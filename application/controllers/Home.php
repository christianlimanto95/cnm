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
        $what = $this->Home_model->get_what()[0];
        $testimony = $this->Home_model->get_testimony();
        $trading = $this->Home_model->get_trading();
        $faq = $this->Home_model->get_faq()[0];
        $contact = $this->Home_model->get_contact()[0];
        parent::load_additional_js("velocity.min");
		$data = array(
            "title" => "CNM &mdash; Your Trading Solution",
            "meta_description" => "Jasa tt (transfer) RMB | Jasa Trading Indonesia China | Top Up Alipay & Wechat | QUICK & 100% TRUSTED",
            "testimony" => $testimony,
            "trading" => $trading,
            "faq" => $faq,
            "contact" => $contact,
            "what" => $what
		);
		
		parent::view("home", $data);
    }
}

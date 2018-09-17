<?php

class Home_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_what() {
        $query = $this->db->query("
            SELECT what_text
            FROM what
        ");
        return $query->result();
    }

    public function get_buy() {
        $query = $this->db->query("
            SELECT buy_text
            FROM buy
        ");
        return $query->result();
    }

    public function get_sell() {
        $query = $this->db->query("
            SELECT sell_text
            FROM sell
        ");
        return $query->result();
    }

    public function get_testimony() {
        $query = $this->db->query("
            SELECT testimony_id, testimony_image_extension, testimony_index, modified_date
            FROM testimony
            WHERE status = 1
            ORDER BY created_date DESC
        ");
        return $query->result();
    }

    public function get_trading() {
        $query = $this->db->query("
            SELECT trading_id, trading_image_extension, trading_index, modified_date
            FROM trading
            WHERE status = 1
            ORDER BY created_date DESC
        ");
        return $query->result();
    }

    public function get_faq() {
        $query = $this->db->query("
            SELECT faq_text
            FROM faq
        ");
        return $query->result();
    }
    
    public function get_contact() {
        $query = $this->db->query("
            SELECT contact_text
            FROM contact
        ");
        return $query->result();
    }
}

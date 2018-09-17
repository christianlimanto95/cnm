<?php

class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_what() {
        return $this->db->get("what")->result();
    }

    public function update_what($data) {
        $this->db->set("what_text", $data["what_text"]);
        $this->db->update("what");
        return $this->db->affected_rows();
    }

    public function get_buy() {
        return $this->db->get("buy")->result();
    }

    public function update_buy($data) {
        $this->db->set("buy_text", $data["buy_text"]);
        $this->db->update("buy");
        return $this->db->affected_rows();
    }

    public function get_sell() {
        return $this->db->get("sell")->result();
    }

    public function update_sell($data) {
        $this->db->set("sell_text", $data["sell_text"]);
        $this->db->update("sell");
        return $this->db->affected_rows();
    }

    public function delete_from_table($data) {
        $this->db->where($data["table_name"] . "_id", $data["id"]);
        $this->db->set("status", 0);
        $this->db->set("modified_date", "NOW()", false);
        $this->db->set("modified_by", $data["user_id"]);
        $this->db->update($data["table_name"]);
        return $this->db->affected_rows();
    }

    public function get_password() {
        $this->db->select("admin_password");
        return $this->db->get("admin")->result()[0];
    }

    public function update_password($password) {
        $this->db->set("admin_password", $password);
        $this->db->set("modified_date", "NOW()", false);
        $this->db->update("admin");
    }

    function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces []= $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }
}

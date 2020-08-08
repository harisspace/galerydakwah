<?php

class Session_model
{
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getDataById($table, $id)
    {
        $this->db->query("SELECT * FROM " . $table . " WHERE id=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }
}

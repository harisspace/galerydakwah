<?php

class Sirah_model
{
    private $db;
    private $table = 'sirah';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllSirah()
    {
        $query = "SELECT * FROM {$this->table}";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getSirahById($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahSirah($data) {
        $judul = htmlspecialchars($data['judul']);
        $channel = htmlspecialchars($data['channel']);
        $video = htmlspecialchars($data['video']);

        $query = "INSERT INTO " . $this->table . " VALUES
                    ('', :judul, :channel, :video)";
        $this->db->query($query);
        $this->db->bind('judul', $judul);
        $this->db->bind('channel', $channel);
        $this->db->bind('video', $video);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getSirahSum()
    {
        $query = "SELECT * FROM {$this->table}";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();;
    }
}

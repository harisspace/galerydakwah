<?php

class Renungan_model
{
    private $db;
    private $table = 'renungan';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllRenungan()
    {
        $query = "SELECT * FROM {$this->table}";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getRenunganById($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahRenungan($data)
    {
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

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getRenunganSum()
    {
        $query = "SELECT * FROM {$this->table}";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();;
    }
}

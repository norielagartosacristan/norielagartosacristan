<?php

class User {
    private $db;

    public function __construct() {
        $this->db = new Database();  // Initialize the Database handler
    }

    public function getUsers() {
        $this->db->query("SELECT * FROM Users");
        return $this->db->resultSet();
    }

    public function getUserById($id) {
        $this->db->query("SELECT * FROM Users WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    // Add more functions as needed to interact with your Users table
}


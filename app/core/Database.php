<?php

class Database {
    private $host = 'localhost';    // Database host
    private $user = 'root';         // Database username
    private $pass = '';             // Database password
    private $dbname = 'your_db_name'; // Database name

    private $mysqli;  // MySQLi object
    private $stmt;    // Prepared statement

    public function __construct() {
        // Create a new MySQLi instance
        $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

        // Check connection
        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }

    // Prepare statement with query
    public function query($sql) {
        $this->stmt = $this->mysqli->prepare($sql);
        if ($this->stmt === false) {
            die("MySQLi statement preparation failed: " . $this->mysqli->error);
        }
    }

    // Bind values to the statement
    public function bind($param, $value, $type = 's') {
        $this->stmt->bind_param($type, $value);
    }

    // Execute the prepared statement
    public function execute() {
        return $this->stmt->execute();
    }

    // Get result set as array of objects
    public function resultSet() {
        $this->execute();
        $result = $this->stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Get single record as object
    public function single() {
        $this->execute();
        $result = $this->stmt->get_result();
        return $result->fetch_assoc();
    }

    // Get record count
    public function rowCount() {
        $this->stmt->store_result();
        return $this->stmt->num_rows;
    }

    // Close the statement
    public function closeStmt() {
        $this->stmt->close();
    }

    // Close the connection
    public function closeConnection() {
        $this->mysqli->close();
    }
}


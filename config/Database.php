<?php
require __DIR__ . "/config.php";

class Database
{

    private $host = DB_HOSTNAME;
    private $db_name = DB_NAME;
    private $username = DB_USERNAME;
    private $password = DB_PASSWORD;
    private $conn;

    // Method to get the database connection
    public function getConnection()
    {
        $this->conn = null;

        try {
            // Create a new PDO connection
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            // Set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            // Handle connection errors
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}

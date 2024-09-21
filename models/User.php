<?php
class User
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function register($username, $email, $password)
    {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the SQL statement
        $stmt = $this->conn->prepare("INSERT INTO user (user_name, email,password) VALUES (:username, :email, :password)");

        // Bind parameters
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

        // Execute the statement
        if ($stmt->execute()) {
            return true; // Registration successful
        }

        return false; // Registration failed
    }

    public function usernameExists($username)
    {
        $query = "SELECT * FROM user WHERE user_name = :username LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        // Return true if the username exists, false otherwise
        return $stmt->rowCount() > 0;
    }
    public function getUserByUsername($username)
    {
        $query = "SELECT * FROM user WHERE user_name = :username LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

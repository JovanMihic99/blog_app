<?php
class Post
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function add_post()
    {
        $title = $_POST("title");
        $content = $_POST("content");
        $user_id = $_POST("user_id");
        $category_id = $_POST("category_id");
        $stmt = $this->conn->prepare("INSERT INTO blog_post (title, content, user_id, category_id) VALUES (:title, :content, :user_id, :category);");

        // Bind parameters
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':category_id', $category_id);

        // Execute the statement
        if ($stmt->execute()) {
            return true; // Add post successful
        }

        return false; // Add post failed
    }
    public function getPosts()
    {
        $stmt = $this->conn->prepare("SELECT * FROM blog_post");
        if ($stmt->execute()) {
            // Fetch all results as an associative array
            $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $posts; // Return the fetched posts
        }
        return [];
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

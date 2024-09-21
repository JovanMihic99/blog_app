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
        $stmt = $this->conn->prepare("SELECT bp.*, u.user_name FROM blog_post AS bp JOIN user AS u ON bp.user_id = u.user_id;");
        if ($stmt->execute()) {
            // Fetch all results as an associative array
            $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $posts; // Return the fetched posts
        }
        return [];
    }
    public function getPostsByUserId()
    {
        $user_id = $_GET['user_id'];
        $stmt = $this->conn->prepare("SELECT bp.*, u.user_name FROM blog_post AS bp JOIN user AS u ON bp.user_id = u.user_id WHERE bp.user_id = :user_id;");
        $stmt->bindParam(':user_id', $user_id);
        if ($stmt->execute()) {
            // Fetch all results as an associative array
            $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $posts; // Return the fetched posts
        }
        return [];
    }
}

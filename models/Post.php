<?php
class Post
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function add_post($title, $content, $user_id, $category_id)
    {
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
    public function get_posts()
    {
        $stmt = $this->conn->prepare("SELECT bp.*, u.user_name FROM blog_post AS bp JOIN user AS u ON bp.user_id = u.user_id;");
        if ($stmt->execute()) {
            // Fetch all results as an associative array
            $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $posts; // Return the fetched posts
        }
        return [];
    }
    public function get_post($id)
    {
        $stmt = $this->conn->prepare("SELECT bp.*, u.user_name FROM blog_post AS bp JOIN user AS u ON bp.user_id = u.user_id WHERE blog_id = :blog_id;");
        $stmt->bindParam(':blog_id', $id);
        if ($stmt->execute()) {
            $post = $stmt->fetch(PDO::FETCH_ASSOC);
            return $post;
        }
        return null;
    }
    public function get_comment($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM comment WHERE comment_id = :comment_id;");
        $stmt->bindParam(':comment_id', $id);
        if ($stmt->execute()) {
            $comment = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $comment;
        }
    }
    public function get_comments($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM comment c JOIN user AS u ON c.user_id = u.user_id WHERE post_id = :blog_id;");
        $stmt->bindParam(':blog_id', $id);
        if ($stmt->execute()) {
            $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $comments;
        }
        return null;
    }
    public function post_comment($content, $user_id, $post_id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stmt = $this->conn->prepare("INSERT INTO comment (content, user_id, post_id) VALUES ( :content, :user_id, :post_id);");

            // Bind parameters
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':post_id', $post_id);

            // Execute the statement
            if ($stmt->execute()) {
                return true; // Add comment successful
            }
        }
    }
    public function delete_comment($comment_id, $user_id, $post_id)
    {

        $stmt = $this->conn->prepare("SELECT * FROM comment WHERE comment_id = :comment_id AND user_id = :user_id;");

        // Bind parameters
        $stmt->bindParam(':comment_id', $comment_id);
        $stmt->bindParam(':user_id', $user_id);

        if ($stmt->execute() && $stmt->rowCount() > 0) {
            // If the comment exists and belongs to the user, proceed with deletion
            $deleteStmt = $this->conn->prepare("DELETE FROM comment WHERE comment_id = :comment_id");
            $deleteStmt->bindParam(':comment_id', $comment_id);

            if ($deleteStmt->execute()) {
                header('Location: /blog_app/post.php?blog_id=' .  $post_id);
            } else {
                echo "Error deleting comment.";
            }
        } else {
            echo "You do not have permission to delete this comment.";
        }
    }
    public function get_post_by_user_id($user_id)
    {

        $stmt = $this->conn->prepare("SELECT bp.*, u.user_name FROM blog_post AS bp JOIN user AS u ON bp.user_id = u.user_id WHERE bp.user_id = :user_id;");
        $stmt->bindParam(':user_id', $user_id);
        if ($stmt->execute()) {
            // Fetch all results as an associative array
            $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $posts; // Return the fetched posts
        }
        return [];
    }
    public function get_categories()
    {
        $stmt = $this->conn->prepare("SELECT * FROM category;");
        if ($stmt->execute()) {
            // Fetch all results as an associative array
            $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $categories; // Return the fetched posts
        }
        return [];
    }
    public function post_blog($title, $content, $user_id, $category_id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stmt = $this->conn->prepare("INSERT INTO blog_post (title, content, user_id, category_id) VALUES (:title, :content, :user_id, :category_id);");

            // Bind parameters
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':category_id', $category_id);

            // Execute the statement
            if ($stmt->execute()) {
                return true; // Add post successful
            }
            die();
        }

        header("Location: /blog_app/index.php");
        exit();
    }
    public function delete_blog($post_id, $user_id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM blog_post WHERE blog_id = :post_id; AND user_id = :user_id");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Bind parameters
        $stmt->bindParam(':post_id', $post_id);
        $stmt->bindParam(':user_id', $user_id);


        if ($rows > 0) {
            // If the comment exists and belongs to the user, proceed with deletion
            $deleteStmt = $this->conn->prepare("DELETE FROM blog_post WHERE blog_id = :post_id");
            $deleteStmt->bindParam(':post_id', $post_id);

            if ($deleteStmt->execute()) {
                header('Location: index.php');
                exit();
            } else {
                echo "Error deleting comment.";
            }
        } else {
            echo "You do not have permission to delete this comment.";
        }
    }
}

<?php
class BlogController
{
    private $db;
    private $blogModel;

    public function __construct($db)
    {
        $this->db = $db;
        $this->blogModel = new Post($db);
    }


    public function logout()
    {
        session_start();

        // Unset all session variables
        $_SESSION = [];
        // Destroy the session
        session_destroy();

        header("Location: /blog_app/index.php");
        exit();
    }
}

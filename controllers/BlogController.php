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


    public function add_blog()
    {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $user_id = $_SESSION['user_id'];
        $category_id = $_POST['category'];

        if ($this->blogModel->add_blog($title, $content, $user_id, $category_id)) {
            echo "Registration successful!";
            // Redirect or take additional actions (like login)
        } else {
            echo "Registration failed. Please try again.";
        }

        header("Location: /blog_app/index.php");
        exit();
    }
}

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
            echo "Add blog post successful!";
        } else {
            echo "Add blog post failed. Please try again.";
        }

        header("Location: /blog_app/index.php");
        exit();
    }
    public function add_comment()
    {
        $content = $_POST['content'];
        $user_id = $_SESSION['user_id'];
        $post_id = $_GET['blog_id'];
        if ($this->blogModel->post_comment($content, $user_id, $post_id)) {
            echo "Add blog post successful!";
            header('Location: /blog_app/post.php?blog_id=' . $post_id);
        } else {
            echo "Add blog post failed. Please try again.";
        }
    }
}

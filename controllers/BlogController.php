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


    public function add_blog($title, $content, $user_id, $category_id)
    {

        if ($this->blogModel->post_blog($title, $content, $user_id, $category_id)) {
            echo "Add blog post successful!";
        } else {
            echo "Add blog post failed. Please try again.";
        }

        header("Location: /blog_app/index.php");
        exit();
    }

    public function add_comment($content, $user_id, $post_id)
    {

        if ($this->blogModel->post_comment($content, $user_id, $post_id)) {
            echo "Add blog post successful!";
            header('Location: /blog_app/post.php?blog_id=' . $post_id);
            die();
        } else {
            echo "Add blog post failed. Please try again.";
        }
    }
    public function remove_comment($comment_id, $user_id, $post_id)
    {
        if ($this->blogModel->delete_comment($comment_id, $user_id, $post_id)) {
            echo "Remove comment post successful!";
            die();
        } else {
            echo "Remove comment failed. Please try again.";
            die();
        }
    }
    public function remove_blog($blog_id, $user_id)
    {
        if ($this->blogModel->delete_blog($blog_id, $user_id)) {
            echo "Remove blog post successful!";
            die();
        } else {
            echo "Remove blog post failed. Please try again.";
            die();
        }
    }
}

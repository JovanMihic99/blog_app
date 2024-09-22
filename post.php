<?php
require_once 'config/init.php';
require_once 'controllers/BlogController.php';
$blogPostModel = new Post($connection);
$post = $blogPostModel->get_post($_GET['blog_id']); // Fetch post
$comments = $blogPostModel->get_comments($_GET['blog_id']); // Fetch comments
$blog_id = $_GET['blog_id'];
$blogController = new BlogController($connection);

// Set the page title and any initial variables
$title = $post['title'];
$content = $post['content'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];
    $post_id = $_GET['blog_id'];
    $blogController->add_comment($content, $user_id, $post_id); // Pass the inputs to the method
    die();
}


// Render the view
ob_start(); // Start output buffering
include 'views/post.php'; // Include the specific view for the homepage
$content = ob_get_clean(); // Get the content of the view

// Render the layout
include 'views/layout.php'; // Include the layout

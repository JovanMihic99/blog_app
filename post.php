<?php
require_once 'config/init.php';

$blogPostModel = new Post($connection);
$post = $blogPostModel->get_post($_GET['blog_id']); // Fetch post
$comments = $blogPostModel->get_comments($_GET['blog_id']); // Fetch comments
// Set the page title and any initial variables
$title = $post['title'];
$content = $post['content'];

// Render the view
ob_start(); // Start output buffering
include 'views/post.php'; // Include the specific view for the homepage
$content = ob_get_clean(); // Get the content of the view

// Render the layout
include 'views/layout.php'; // Include the layout

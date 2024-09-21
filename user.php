<?php
require_once 'config/init.php';

$blogPostModel = new Post($connection);
$posts = $blogPostModel->get_post_by_user_id(); // Fetch posts

$user_name = $userModel->getUserById($_GET['user_id'])['user_name'];
// Set the page title and any initial variables
$title = $user_name . "'s blog posts";
$content = "";

// Render the view
ob_start(); // Start output buffering
include 'views/home.php'; // Include the specific view for the homepage
$content = ob_get_clean(); // Get the content of the view

// Render the layout
include 'views/layout.php'; // Include the layout

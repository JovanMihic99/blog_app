<?php
require_once 'config/init.php';


$blogPostModel = new Post($connection);
$posts = $blogPostModel->get_posts(); // Fetch posts
$categories = $blogPostModel->get_categories();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $cateogry_id = $_POST['category_id'];
    $posts = $blogPostModel->get_posts($cateogry_id); // Fetch posts from a certain category
}
// Set the page title and any initial variables
$title = "Bloggy blog posts";
$content = "";

// Render the view
ob_start(); // Start output buffering
include 'views/home.php'; // Include the specific view for the homepage
$content = ob_get_clean(); // Get the content of the view

// Render the layout
include 'views/layout.php'; // Include the layout

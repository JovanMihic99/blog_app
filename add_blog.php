
<?php
require_once 'config/init.php';
require_once 'controllers/BlogController.php';
$blogController = new BlogController($connection);
$blogPostModel = new Post($connection);

// Set the page title and any initial variables
$title = "Register";
$content = ""; // Initialize content
$categories = $blogPostModel->get_categories();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $blogController->add_blog();
    header("Location: /blog_app/index.php");
    die();
}

// Render the view
ob_start(); // Start output buffering
include 'views/add_blog_form.php'; // Include the register view
$content = ob_get_clean(); // Get the content of the view

// Render the layout
include 'views/layout.php'; // Include the layout
?>

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
    $title = $_POST["title"];
    $content = $_POST["content"];
    $user_id = $_SESSION["user_id"];
    $category_id = $_POST["category_id"];
    $blog_id = $_GET['blog_id'];
    $blogController->edit_blog($blog_id, $title, $content, $user_id, $category_id);
}
// Set form values
$blog_id = $_GET['blog_id'];
$blog = $blogPostModel->get_post($blog_id);

// Render the view
ob_start(); // Start output buffering
include 'views/add_blog_form.php'; // Include the register view
$content = ob_get_clean(); // Get the content of the view

// Render the layout
include 'views/layout.php'; // Include the layout
?>

<?php
require_once 'config/init.php';
require_once 'models/User.php';
require_once 'controllers/AuthController.php';

// Initialize the User model with the database connection
$userModel = new User($connection);
// Initialize the AuthController with the user model
$authController = new AuthController($connection);

// Set the page title and any initial variables
$title = "Register";
$content = ""; // Initialize content

// Check if the registration form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $authController->register(); // Call the register method from AuthController
    header("Location: /blog_app/index.php");
    die();
}

// Render the view
ob_start(); // Start output buffering
include 'views/register_form.php'; // Include the register view
$content = ob_get_clean(); // Get the content of the view

// Render the layout
include 'views/layout.php'; // Include the layout
?>
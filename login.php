<?php
require_once 'config/init.php';
require_once 'models/User.php';
require_once 'controllers/AuthController.php';

// Initialize the User model with the database connection
$userModel = new User($connection);
// Initialize the AuthController with the user model
$authController = new AuthController($connection);

$title = "Login";
$content = "<h1>LOGIN CONTENT</h1>"; // Initialize content

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $authController->login(); // Pass the inputs to the method
    die();
}

// Render the view
ob_start(); // Start output buffering
include 'views/login_form.php'; // Include the register view
$content = ob_get_clean(); // Get the content of the view

// Render the layout
include 'views/layout.php'; // Include the layout

<?php
require_once 'config/init.php';


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

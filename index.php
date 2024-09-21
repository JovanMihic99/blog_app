<?php


require_once 'config/init.php'; // Include your initialization logic

// Set the page title and any initial variables
$title = "My Blog Website";
$content = `<p>This is the homepage of your blog application.</p>`;

// Render the view
ob_start(); // Start output buffering
include 'views/home.php'; // Include the specific view for the homepage
$content = ob_get_clean(); // Get the content of the view

// Render the layout
include 'views/layout.php'; // Include the layout

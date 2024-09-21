<?php
require_once(__DIR__ . '/Database.php'); // Points to blog_app/models/Database.php
require_once(__DIR__ . '/../models/User.php'); // Points to blog_app/models/User.php
require_once(__DIR__ . '/../controllers/AuthController.php'); // Points to blog_app/controllers/AuthController.php

// Start the session
session_start();

// Create a database connection
$db = new Database();
$connection = $db->getConnection();

// Initialize the models
$userModel = new User($connection);
// $userModel = new Post($connection);
// Initialize the AuthController with the User model
$authController = new AuthController($connection);

<?php
// Correct paths based on the structure
require_once(__DIR__ . '/../models/Database.php'); // Points to blog_app/models/Database.php
require_once(__DIR__ . '/../models/User.php'); // Points to blog_app/models/User.php
require_once(__DIR__ . '/../controllers/AuthController.php'); // Points to blog_app/controllers/AuthController.php

// Create a database connection
$db = new Database();
$connection = $db->getConnection();

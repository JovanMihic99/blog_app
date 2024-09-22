<?php
require_once "config/init.php";
require_once "controllers/BlogController.php";
$blogController = new BlogController($connection);
$post = new Post($connection);
if (!$_SERVER['REQUEST_METHOD'] === "POST") {
    var_dump($_POST);
    die();
    header("Location: index.php");
    exit();
}
// Check if the user is logged in and if the comment_id is provided
if (!isset($_SESSION['user_id']) || !isset($_GET['comment_id'])) {



    // exit();
}
$blogController->remove_comment($_GET['comment_id'], $_SESSION['user_id'], $_GET['blog_id']);

// var_dump($_GET['blog_id']);
// exit

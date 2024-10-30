<?php
if (!user_is_logged_in()) {
  header('location: index.php?route=login');
  die();
}

$postManager = new PostManager();

// Deletes a post
if (request_method_is_post()) {
  $postManager->deletePostById($_POST['post_id']);
}

$posts = $postManager->getAllPostsFromUser($_SESSION['user']['id']);

$postManager = null;

/* SHOW PAGE */
$title = "Admin Dashboard";
require_once('views/dashboard/my-posts.view.php');

<?php
if (!user_is_logged_in()) {
  header('location: index.php?route=login');
  die();
}
$postManager = new PostManager();

if (request_method_is_post()) {
  $postManager->deletePostById((int)$_POST['post_id']);
}

$posts = $postManager->getAllPostsFromUser($_SESSION['user']['id']);

/* SHOW PAGE */
$title = "Admin Dashboard";
require_once('views/dashboard/my-posts.view.php');

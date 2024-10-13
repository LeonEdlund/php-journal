<?php
if (!user_is_logged_in()) {
  header('location: index.php?route=login');
  die();
}

if (request_method_is_post()) {
  $postConnection = new Post();
  $postConnection->deletePost((int)$_POST['post_id']);
  $postConnection = null;
}

$postsConnection = new Posts();
$posts = $postsConnection->getAllPostsFromUser($_SESSION['user']['id']);
$postsConnection = null; // close connection

/* SHOW PAGE */
$title = "Admin Dashboard";
require_once('views/dashboard-myposts.view.php');

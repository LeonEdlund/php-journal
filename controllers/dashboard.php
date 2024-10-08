<?php
if (!user_is_logged_in()) {
  header('location: index.php?route=login');
  die();
}

if (request_method_is_post()) {
  $post = new Posts();
  $postStatus = $post->publishPost($_POST['title'], $_POST['post_text']);
  $post = null;
}

/* SHOW PAGE */
$title = "Admin Dashboard";
require_once('views/dashboard.view.php');

<?php
if (!user_is_logged_in()) {
  header('location: index.php?route=login');
  die();
}

// get post info
$postManager = new PostManager();
$post = $postManager->getPostById($_GET['id']);

// Edit post
if (request_method_is_post()) {
  $postManager->editPost($_GET['id'], $_POST['title'], $_POST['post_text']);
  header("Location: index.php?route=my-posts&id=$postId");
  die();
}

/*------- SHOW PAGE ---------*/
$title = "Admin Dashboard";
require_once('views/dashboard/edit-post.view.php');

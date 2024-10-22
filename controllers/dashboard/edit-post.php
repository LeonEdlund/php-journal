<?php
if (!user_is_logged_in()) {
  header('location: index.php?route=login');
  exit();
}

$postId = @$_GET['id'];

if (!$postId || !is_numeric($postId)) {
  header('location: ?route=my-posts');
  exit();
}

// get post info
$postManager = new PostManager();
$post = $postManager->getPostById($postId);

if (!$post) {
  header('location: ?route=my-posts');
  exit();
}

// Edit post
if (request_method_is_post()) {
  $title = $_POST['title'];
  $textBody = $_POST['post_text'];

  require_once("utils/TextValidator.php");
  $validator = new TextValidator();
  $errors = $validator->validatePost($title, $textBody);

  if (empty($errors)) {
    $postManager->editPost($_GET['id'], $title, $textBody);
    header("Location: ?route=my-posts");
    exit();
  }
}

$postManager = null;

/*------- SHOW PAGE ---------*/
$title = "Admin Dashboard";
require_once('views/dashboard/edit-post.view.php');

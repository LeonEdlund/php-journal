<?php
if (!user_is_logged_in()) {
  header('location: index.php?route=login');
  exit();
}

if (request_method_is_post()) {
  $title = $_POST['title'];
  $textBody = $_POST['post_text'];

  require_once 'utils/TextValidator.php';
  $validator = new TextValidator();
  $errors = $validator->validatePost($title, $textBody);

  if (empty($errors)) {
    $postManager = new PostManager();
    $postManager->publishPost($title, $textBody);
    $postStatus = "Post uploaded!";
  }
}

$postManager = null;

/* SHOW PAGE */
$title = "Admin Dashboard";
require_once('views/dashboard/dashboard.view.php');

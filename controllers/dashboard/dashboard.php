<?php
if (!user_is_logged_in()) {
  header('location: index.php?route=login');
  exit();
}

if (request_method_is_post()) {
  require_once 'utils/TextValidator.php';
  $validator = new TextValidator();
  $errors = [];

  // Validate title
  if ($validator->strIsEmpty($_POST['title'])) {
    $errors[] = 'Fill in a title!';
  } elseif ($validator->exceedsMaxLength($_POST['title'], 254)) {
    $errors[] = 'Title is too long!';
  }

  // Validate body
  if ($validator->strIsEmpty($_POST['post_text'])) {
    $errors[] = 'Do not leave post empty!';
  } elseif ($validator->exceedsMaxLength($_POST['post_text'], 65500)) {
    $errors[] = 'Post is too long!';
  }

  // publish comment
  if (empty($errors)) {
    $postManager = new PostManager();
    $postManager->publishPost($_POST['title'], $_POST['post_text']);
    $postStatus = "Post uploaded!";
  }
}

/* SHOW PAGE */
$title = "Admin Dashboard";
require_once('views/dashboard/dashboard.view.php');

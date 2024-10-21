<?php
$postId = @$_GET['id'];

// Redirect if post-id is invalid
if (!$postId || !is_numeric($postId)) {
  header('location: index.php?route=posts');
  exit();
}

// Get post by id
$postManager = new PostManager();
$post = $postManager->getPostById($postId);
$comments = $postManager->getCommentsByPostId($postId);

// show 404 error if no post is found
if (!$post) {
  abort('notFound');
}

// if a comment is posted
if (request_method_is_post()) {
  require_once 'utils/TextValidator.php';
  $validator = new TextValidator();
  $errors = [];

  // Validate name
  if ($validator->strIsEmpty($_POST['name'])) {
    $errors[] = 'Fill in a name!';
  } elseif ($validator->exceedsMaxLength($_POST['name'], 254)) {
    $errors[] = 'Name is too long!';
  }

  // Validate comment
  if ($validator->strIsEmpty($_POST['comment'])) {
    $errors[] = 'Fill in a comment text!';
  } elseif ($validator->exceedsMaxLength($_POST['comment'], 65500)) {
    $errors[] = 'Comment is too long!';
  }

  // publish comment
  if (empty($errors)) {
    $postManager->publishComment($postId, $_POST['name'], $_POST['comment']);
    header("Location: index.php?route=post&id=$postId");
    exit();
  }
}

/* SHOW PAGE */
$title = htmlspecialchars($post['title']);
require_once('views/post.view.php');

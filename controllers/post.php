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

// upload a comment
if (request_method_is_post()) {
  $name = $_POST['name'];
  $commentBody = $_POST['comment'];

  require_once 'utils/TextValidator.php';
  $validator = new TextValidator();
  $errors = $validator->validatePost($name, $commentBody);

  // publish comment
  if (empty($errors)) {
    $postManager->publishComment($postId, $name, $commentBody);
    header("Location: index.php?route=post&id=$postId");
    exit();
  }
}

$postManager = null;

/* SHOW PAGE */
$title = htmlspecialchars($post->title);
require_once('views/post.view.php');

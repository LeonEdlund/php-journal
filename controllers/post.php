<?php

$postId = $_GET['id'];

if (!isset($postId)) {
  header('location: index.php?route=posts');
  die();
}

if (!is_numeric($postId)) {
  abort('notFound');
}

$postConnection = new Post();
$post = $postConnection->getPost($postId);
$comments = $postConnection->getComments($postId);

if (!$post) {
  abort('notFound');
}

// post comment
if (request_method_is_post()) {
  if ($postConnection->publishComment($postId, $_POST['name'], $_POST['comment'])) {
    // Redirect to the same page to force a GET request
    header("Location: index.php?route=post&id=$postId");
    die();
  } else {
    $errorMessage = 'Fill in all fields';
  }
}

$postsConnection = null;

/* SHOW PAGE */
$title = htmlspecialchars($post['title']);
require_once('views/post.view.php');

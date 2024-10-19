<?php
$postId = @$_GET['id'];

if (!$postId || !is_numeric($postId)) {
  header('location: index.php?route=posts');
  die();
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

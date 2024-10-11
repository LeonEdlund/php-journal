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
$postsConnection = null;
if (!$post) {
  abort('notFound');
}

if (!$comments) {
  $comments = [];
}
//dd($comments);

/* SHOW PAGE */
$title = htmlspecialchars($post['title']);
require_once('views/post.view.php');

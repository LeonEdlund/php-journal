<?php

$postId = $_GET['id'];

if (!isset($postId)) {
  header('location: index.php?route=posts');
  die();
}

if (!is_numeric($postId)) {
  abort('notFound');
}

$postsConnection = new Posts();
$post = $postsConnection->getPost($postId);
$postsConnection = null;

if (!$post) {
  abort('notFound');
}

/* SHOW PAGE */
$title = htmlspecialchars($post['title']);
require_once('views/post.view.php');

<?php
$postManager = new PostManager();

// set up pagination
$resultsPerPage = 10;
$numberOfPosts = $postManager->getNumberOfPosts();
$numberOfPages = ceil($numberOfPosts / $resultsPerPage);

if (!isset($_GET['page'])) {
  $page = 1;
} elseif ($_GET['page'] > $numberOfPages) {
  $page = 1;
} else {
  $page = $_GET['page'];
}

$startingPost = ($page - 1) * $resultsPerPage;

// get all posts
$posts = $postManager->getAllPosts("LIMIT $startingPost , $resultsPerPage");

/* SHOW PAGE */
$title = "Posts";
require_once('views/posts.view.php');

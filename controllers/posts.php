<?php

// connect to database
$postsConnection = new Posts();

// set up pagination
$resultsPerPage = 10;
$numberOfPosts = $postsConnection->getNumberOfPosts();
$numberOfPages = ceil($numberOfPosts / $resultsPerPage);

// get chosen page
if (!isset($_GET['page'])) {
  $page = 1;
} elseif ($_GET['page'] > $numberOfPages) {
  $page = 1;
} else {
  $page = $_GET['page'];
}

$startingPost = ($page - 1) * $resultsPerPage;

// get all posts
$posts = $postsConnection->getAllPosts("LIMIT $startingPost , $resultsPerPage");
$postsConnection = null; // close connection

/* SHOW PAGE */
$title = "Posts";
require_once('views/posts.view.php');

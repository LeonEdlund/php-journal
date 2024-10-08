<?php

$postsConnection = new Posts();
$posts = $postsConnection->getAllPosts();
$postsConnection = null;

/* SHOW PAGE */
$title = "Posts";
require_once('views/posts.view.php');

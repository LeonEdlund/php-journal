<?php
require_once 'config/enable-errors.php'; // enable server errors
require_once 'functions.php'; // load global functions
require_once 'models/Database.php'; // load Databass class
require_once 'models/Posts.php'; // load Authenticator class

header('Content-Type: text/xml');
$postsConnection = new Posts();
$posts = $postsConnection->getAllPosts("LIMIT 10");
$postsConnection = null;

echo "<?xml version='1.0' encoding='UTF-8'?>"
?>

<rss version="2.0">
  <channel>
    <title>Journal - RSS Feed</title>

    <?php foreach ($posts as $post) : ?>
      <post>
        <title><?= $post['title'] ?></title>
        <author><?= $post['first_name'] . " " .  $post['first_name'] ?></author>
        <created><?= $post['created_at'] ?></created>
        <text><?= $post['post_text'] ?></text>
      </post>
    <?php endforeach ?>
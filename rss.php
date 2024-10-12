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
    <title>Journal</title>
    <link>https://www.melab.lnu.se/~le223nd/webbteknik-4/journal/</link>
    <description>A rss feed of the posts from a journal webbsite.</description>
    <?php foreach ($posts as $post) : ?>
      <item>
        <title><?= $post['title'] ?></title>
        <author><?= $post['first_name'] . " " .  $post['first_name'] ?></author>
        <created><?= $post['created_at'] ?></created>
        <link>https://www.melab.lnu.se/~le223nd/webbteknik-4/journal/index.php?route=post&amp;id=<?= $post['id'] ?></link>
        <text><?= $post['post_text'] ?></text>
      </item>
    <?php endforeach ?>
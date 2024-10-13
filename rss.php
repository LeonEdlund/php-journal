<?php
require_once 'config/enable-errors.php'; // enable server errors
require_once 'functions.php'; // load global functions
require_once 'models/Database.php'; // load Databass class
require_once 'models/Posts.php'; // load Authenticator class

header('Content-Type: application/xml; charset=utf-8');
$postsConnection = new Posts();
$posts = $postsConnection->getAllPosts("LIMIT 10");
$postsConnection = null;

echo "<?xml version='1.0' encoding='UTF-8'?>"
?>

<rss version="2.0">
  <channel>
    <title>Journal</title>
    <link>https://melab.lnu.se/~le223nd/webbteknik-4/journal/</link>
    <description>A rss feed of the posts from a journal webbsite.</description>

    <?php foreach ($posts as $post) : ?>
      <item>
        <title>
          <![CDATA[ <?= $post['title'] ?> ]]>
        </title>
        <author>
          <![CDATA[<?= $post['first_name'] . " " .  $post['last_name'] ?>]]>
        </author>
        <pubDate>
          <![CDATA[<?= $post['created_at'] ?>]]>
        </pubDate>
        <link>
        <![CDATA[https://melab.lnu.se/~le223nd/webbteknik-4/journal/index.php?route=post&id=<?= $post['id'] ?>]]>
        </link>
        <description>
          <![CDATA[<?= nl2br($post['post_text']) ?>]]>
        </description>
      </item>
    <?php endforeach ?>
  </channel>
</rss>
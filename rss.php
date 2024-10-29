<?php
header('Content-Type: application/xml; charset=utf-8');

$postManager = new PostManager();
$posts = $postManager->getAllPosts("LIMIT 10");

echo "<?xml version='1.0' encoding='UTF-8'?>"
?>

<rss version="2.0">
  <channel>
    <title>Journal</title>
    <link>https://melab.lnu.se/~le223nd/webbteknik-4/journal/</link>
    <description>A rss feed of the posts from a journal webbsite.</description>

    <?php foreach ($posts as $post) : ?>
      <?php $date = date(DATE_RSS, strtotime($post->created_at)); ?>
      <item>
        <title><?= htmlspecialchars($post->title) ?></title>
        <author><?= htmlspecialchars($post->email) ?> (<?= htmlspecialchars($post->author) ?>)</author>
        <pubDate><?= $date ?></pubDate>
        <link>https://melab.lnu.se/~le223nd/webbteknik-4/journal/index.php?route=post&amp;id=<?= $post->id ?></link>
        <description><?= htmlspecialchars($post->post_text) ?></description>
      </item>
    <?php endforeach ?>
  </channel>
</rss>
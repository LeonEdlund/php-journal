<?php
$shortUri = isset($_GET['route']) ? $_GET['route'] : '/';

$routs = [
  '/' => 'controllers/posts.php',
  'posts' => 'controllers/posts.php',
  'post' => 'controllers/post.php',
  'login' => 'controllers/login.php',
  'dashboard' => 'controllers/dashboard.php',
  'my-posts' => 'controllers/dashboard-myposts.php',
  'edit-post' => 'controllers/dashboard-edit-post.php',
  'logout' => 'controllers/logout.php',
];

if (array_key_exists($shortUri, $routs)) {
  require $routs[$shortUri];
} else {
  abort('notFound');
}

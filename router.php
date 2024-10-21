<?php
$shortUri = isset($_GET['route']) ? $_GET['route'] : '/';

$routs = [
  '/' => 'controllers/posts.php',
  'posts' => 'controllers/posts.php',
  'post' => 'controllers/post.php',
  'dashboard' => 'controllers/dashboard/dashboard.php',
  'my-posts' => 'controllers/dashboard/my-posts.php',
  'edit-post' => 'controllers/dashboard/edit-post.php',
  'login' => 'controllers/login.php',
  'logout' => 'utils/logout.php',
];

if (array_key_exists($shortUri, $routs)) {
  require $routs[$shortUri];
} else {
  abort('notFound');
}

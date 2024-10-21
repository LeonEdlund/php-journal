<?php

/**
 * Prints out information on the page and ends script
 * 
 * @param var $var can be any type.
 * 
 * @return void
 */
function dd($var)
{
  echo '<pre>';
  var_dump($var);
  echo '<pre>';
  die();
}

/**
 * Handles different errors on the page.
 * 
 * @param string $errorType Specifies what type of error and redirects accordingly.
 * 
 * @return void
 */
function abort($errorType)
{
  switch ($errorType) {
    case "dbError":
      require 'controllers/errors/db-error.php';
      die();
    case "notFound":
      require 'controllers/errors/404.php';
      die();
    default:
      require 'controllers/404.php';
      die();
  }
}

function user_is_logged_in()
{
  if (isset($_SESSION['user'])) {
    return true;
  } else {
    return false;
  }
}

function request_method_is_post()
{
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    return true;
  } else {
    return false;
  }
}

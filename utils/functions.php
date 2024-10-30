<?php

/**
 * Handles and reroutes based on different errors.
 * 
 * @param string $errorType Specifies what type of error and redirects accordingly.
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

/**
 * Check if user is logged in by if 'user' key exists in $_SESSION. 
 * 
 * @return bool True if user is logged in, False if not
 */
function user_is_logged_in()
{
  if (isset($_SESSION['user'])) {
    return true;
  } else {
    return false;
  }
}

/**
 * Check if user is requesting the page with POST. 
 * 
 * @return bool True if page is requested with POST, false if not.
 */
function request_method_is_post()
{
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    return true;
  } else {
    return false;
  }
}

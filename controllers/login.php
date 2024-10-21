<?php
require_once 'models/Authenticator.php';

if (user_is_logged_in()) {
  header('location: index.php?route=posts');
}

if (request_method_is_post()) {
  $authenticator = new Authenticator();

  if ($authenticator->authenticate($_POST['username'], $_POST['password'])) {
    header('location: index.php?route=dashboard');
    die();
  } else {
    $loginError = 'Invalid username or password';
  }

  $authenticator = null; //close db connection
}

/* SHOW PAGE */
$title = "Log in";
require_once('views/login.view.php');

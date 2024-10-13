<?php

/**
 * Authenticator class
 * 
 * Handles user authentication based on users credentials in the database
 * and saves authenticated user in session.
 */
class Authenticator extends Database
{
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Authenticates the user based on credentials in users table
   * 
   * @return bool 
   * returns true if the credentials match and saves user in $_SESSION['user']
   * returns false if user input does not match
   */
  public function authenticate($username, $pwd)
  {
    $query = 'SELECT * FROM users WHERE username=?';
    $user = $this->query($query, [$username])->fetch();

    if ($user && password_verify($pwd, $user['pwd'])) {
      $this->saveUserSession($user);
      return true;
    } else {
      return false;
    }
  }

  /** 
   * Saves the user in SESSION
   * 
   * @return void
   */
  private function saveUserSession($user)
  {
    $_SESSION['user'] = [
      'id' => $user['id'],
      'username' => $user['username'],
      'fullname' => ($user['first_name'] . $user['last_name'])
    ];
  }
}

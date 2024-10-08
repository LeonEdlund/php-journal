<?php

/**
 * User class
 * 
 * Handles user authentication
 */
class Authenticator extends Database
{
  /**
   * Creates a new connection to database and saves provided username and password
   */
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
    $query = 'SELECT * FROM users WHERE username=? AND pwd=?';
    $user = $this->query($query, [$username, $pwd])->fetch();

    if ($user) {
      $this->saveUserSession($user);
      return true;
    } else {
      return false;
    }
  }

  private function saveUserSession($user)
  {
    $_SESSION['user'] = [
      'id' => $user['id'],
      'username' => $user['username'],
      'fullname' => ($user['first_name'] . $user['last_name'])
    ];
  }
}

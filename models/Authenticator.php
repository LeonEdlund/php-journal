<?php

class Authenticator extends Database
{
  /**
   * Establish connection to database using PDO.
   * 
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Authenticates the user based on credentials in users table.
   * 
   * @param string $username provided username from log-in-form.
   * @param string $pwd provided password from log-in-form.
   * @return bool 
   * returns true if the credentials match and saves user in $_SESSION['user'].
   * returns false if user input does not match.
   */
  public function authenticate($username, $pwd)
  {
    $query = 'SELECT pwd FROM users WHERE username=:username';
    $dbPwd = $this->query($query, [":username" => $username])->fetchColumn();

    if ($dbPwd && password_verify($pwd, $dbPwd)) {
      $secondQuery = 'SELECT * FROM users WHERE username=:username';
      $user = $this->query($secondQuery, [":username" => $username])->fetch();
      $this->saveUserSession($user);
      return true;
    } else {
      return false;
    }
  }

  /** 
   * Saves the user in SESSION as key 'user'.
   * 
   * @param object $user a anonyms object with user info from database.   
   * @return void
   */
  private function saveUserSession($user)
  {
    $_SESSION['user'] = [
      'id' => $user->id,
      'username' => $user->username,
      'email' => $user->email,
      'fullName' => "$user->first_name $user->last_name"
    ];
  }
}

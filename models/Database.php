<?php

/**
 * 
 */
class Database
{
  protected $connection; // The connection to the database

  /**
   * Establishes connection to Mysql database
   * 
   * Imports configuration data for database and establishes a connection using PDO  
   * and sets the default fetch mode to associative array.
   * If the connection fails aborts function is called and the database error page is shown.   
   * 
   * @return void
   */
  public function __construct()
  {
    $config = require 'config/config.php';

    try {
      //$dsn = "mysql:host=" . $config['host'] . ";dbname=" . $config['dbName'];
      $this->connection = new PDO("mysql:host=" . $config['host'] . ";dbname=" . $config['dbName'], $config['dbUsername'], $config['dbPwd'], [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    } catch (PDOException $e) {
      abort('dbError');
    }
  }

  public function query($query, $params = [])
  {
    $stmt = $this->connection->prepare($query);
    $stmt->execute($params);

    return $stmt;
  }
}

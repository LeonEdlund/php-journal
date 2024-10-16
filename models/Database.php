<?php

/**
 * 
 */
class Database
{
  protected $connection; // The connection to the database

  public function __construct()
  {
    $config = require 'config/config.php';

    try {
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

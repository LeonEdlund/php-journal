<?php

class Posts extends Database
{

  public function __construct()
  {
    parent::__construct();
  }

  public function getNumberOfPosts()
  {
    $query = "SELECT * FROM posts";
    return $this->query($query)->rowCount();
  }

  public function getAllPosts($limit = "")
  {
    $query = "SELECT posts.*, users.first_name, users.last_name FROM posts INNER JOIN users ON users.id = posts .author_id ORDER BY posts.id DESC $limit";
    return $this->query($query)->fetchAll();
  }

  public function getAllPostsFromUser($userId)
  {
    $query = "SELECT * FROM posts WHERE author_id = $userId ORDER BY posts.id DESC";
    return $this->query($query)->fetchAll();
  }
}

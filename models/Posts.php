<?php

class Posts extends Database
{

  public function __construct()
  {
    parent::__construct();
  }

  public function publishPost($title, $postText)
  {
    if (strlen($title) > 0 && strlen($postText) > 0) {
      $query = 'INSERT INTO posts(author_id, title, post_text) VALUES (?, ?, ?)';
      $this->query($query, [$_SESSION['user']['id'], $title, $postText]);

      return 'Post uploaded!';
    } else {
      return 'Fill in all fields!';
    }
  }

  public function getAllPosts()
  {
    $query = 'SELECT posts.*, users.first_name, users.last_name FROM posts INNER JOIN users ON users.id = posts.author_id ORDER BY posts.id DESC';
    return $this->query($query)->fetchAll();
  }

  public function getPost($id)
  {
    $query = 'SELECT posts.*, users.first_name, users.last_name FROM posts INNER JOIN users ON posts.author_id = users.id WHERE posts.id=?';
    return $this->query($query, [$id])->fetch();
  }
}

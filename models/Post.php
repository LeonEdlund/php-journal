<?php

class Post extends Database
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

  public function publishComment($post_id, $author, $comment_text)
  {
    if (strlen($author) > 0 && strlen($comment_text) > 0) {
      $query = 'INSERT INTO comments(post_id, author, comment_text) VALUES (?, ?, ?)';
      $this->query($query, [$post_id, $author, $comment_text]);

      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function getPost($id)
  {
    $query = 'SELECT posts.*, users.first_name, users.last_name FROM posts INNER JOIN users ON posts.author_id = users.id WHERE posts.id=?';
    return $this->query($query, [$id])->fetch();
  }

  public function getComments($id)
  {
    $query = 'SELECT * FROM comments WHERE post_id=? ORDER BY comment_id DESC';
    return $this->query($query, [$id])->fetchAll();
  }
}

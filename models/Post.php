<?php

/**
 * Post class that handless getting and publishing posts from the database.
 * 
 * Extends the Database class to get the PDO connection and query method.
 */
class Post extends Database
{

  /**
   * Initializing the connection to the database with PDO.
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Publishes a new post to table posts.
   *
   * This method inserts a new post into the `posts` table with the provided title and post text.
   * The author ID is from the current session.
   *
   * @param string $title The title of the post.
   * @param string $postText The content of the post.
   * @return string A message indicating the result of the operation.
   */
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

  /**
   * Deletes a post from the posts table.
   *
   * This method deletes a post with the provided ID from the 'posts' table.
   *
   * @param int $postId The id of the post.
   * @return void
   */
  public function deletePost($postId)
  {
    $query = "DELETE FROM posts WHERE id = ?";
    $this->query($query, [$postId]);
  }


  /**
   * Publishes a new comment to 'comments' table.
   *
   * This method inserts a new comment into the 'comments' table with the provided post ID, author and post text.
   * Only if the length of the input is greater then 0. 
   * The POST ID is linked to a specific post in the 'post' table.
   *
   * @param string $post_id The ID of the post that the comment is left on.
   * @param string $author The name of the author of the comment.
   * @param string $comment_text The content of the comment.
   * @return bool Returns TRUE if the author and content is greater then 0. False if its not.
   */
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

  /**
   * Gets a specific post based on the post id.
   *
   * This method gets a specific post and it's author based on the provided ID. 
   *
   * @param int $id The id of the post.
   * @return array Returns an associative array with the post and authors first and last name. 
   */
  public function getPost($id)
  {
    $query = 'SELECT posts.*, users.first_name, users.last_name FROM posts INNER JOIN users ON posts.author_id = users.id WHERE posts.id=?';
    return $this->query($query, [$id])->fetch();
  }

  /**
   * Gets a all comments relating to a post.
   *
   * This method gets a all the comments for a specific post through the provided ID.
   *
   * @param int $id The id of the post.
   * @return array Returns an associative array with all the comments. 
   */
  public function getComments($id)
  {
    $query = 'SELECT * FROM comments WHERE post_id=? ORDER BY comment_id DESC';
    return $this->query($query, [$id])->fetchAll();
  }
}

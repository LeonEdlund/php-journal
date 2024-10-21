<?php

/**
 * Post class handels getting and publishing posts from and to the database.
 * 
 * Extends the Database class to get the PDO connection and query method.
 */
class PostManager extends Database
{
  /**
   * Initializing the connection to the database with PDO.
   */
  public function __construct()
  {
    parent::__construct();
  }

  /* ----- METHODS FOR POSTING DATA TOO DB ----- */

  /**
   * Publishes a new post to table 'posts'.
   *
   * @param string $title The title of the post.
   * @param string $postText The content of the post.
   * @return string A message indicating the result of the operation.
   */
  public function publishPost($title, $postText)
  {
    $query = 'INSERT INTO posts(author_id, title, post_text) VALUES (:user_id, :title, :content)';
    $this->query($query, [
      ":user_id" => $_SESSION['user']['id'],
      ":title" => $title,
      ":content" => $postText
    ]);
  }

  /**
   * Edits an existing post in table 'posts' by it's ID.
   *
   * @param int $id The id of the existing post.
   * @param int $title The new title.
   * @param int $content The new content for the post.
   * @return void
   */
  public function editPost($id, $title, $content)
  {
    $query = "UPDATE posts SET title = :title, post_text = :content WHERE id = :post_id";
    $this->query($query, [
      ":title" => $title,
      ":content" => $content,
      ":post_id" => $id
    ]);
  }

  /**
   * Deletes a post by it's id.
   *
   * @param int $postId The id of the post.
   * @return void
   */
  public function deletePostById($postId)
  {
    $query = "DELETE FROM posts WHERE id = :post_id";
    $this->query($query, [":post_id" => $postId]);
  }

  /**
   * Publishes a new comment to 'comments' table with the post id connected to it.
   *
   * @param string $post_id The ID of the post that the comment is left on.
   * @param string $author The name of the author of the comment.
   * @param string $comment_text The content of the comment.
   * @return bool Returns TRUE if the author and content is greater then 0. False if its not.
   */
  public function publishComment($post_id, $author, $comment_text)
  {
    $query = 'INSERT INTO comments(post_id, author, comment_text) VALUES (:post_id, :author, :comment)';
    $this->query($query, [
      ":post_id" => $post_id,
      ":author" => $author,
      ":comment" => $comment_text
    ]);
  }


  /* ----- METHODS FOR GETTING DATA FROM DB ----- */

  public function getNumberOfPosts()
  {
    $query = "SELECT count(*) AS total FROM posts";
    $result = $this->query($query)->fetch();
    return $result['total'];
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

  /**
   * Gets a specific post based on the post id.
   *
   * @param int $id The id of the post.
   * @return array Returns an associative array with the post and authors first and last name. 
   */
  public function getPostById($id)
  {
    $query = 'SELECT posts.*, users.first_name, users.last_name FROM posts INNER JOIN users ON posts.author_id = users.id WHERE posts.id=:post_id';
    return $this->query($query, [":post_id" => $id])->fetch();
  }

  /**
   * Gets a all comments relating to a post by its id.
   *
   * @param int $id The id of the post.
   * @return array Returns an associative array with all the comments. 
   */
  public function getCommentsByPostId($id)
  {
    $query = 'SELECT * FROM comments WHERE post_id=:post_id ORDER BY comment_id DESC';
    return $this->query($query, [":post_id" => $id])->fetchAll();
  }
}

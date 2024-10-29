<?php
class TextValidator
{

  /**
   * Checks if a title is under 255 characters and a text body is under 65500 characters.
   * 
   * @param string $title is the shorter string to be checked.
   * @param string $body is the longer string to be checked.
   * @return array returns an array of errors, if no errors found it returns an empty array.
   */
  public function validatePost($title, $body)
  {
    $errors = [];

    // Validate title
    if ($this->strIsEmpty($title)) {
      $errors[] = 'Fill in a title!';
    } elseif ($this->exceedsMaxLength($title, 100)) {
      $errors[] = 'Title is too long!';
    }

    // Validate body
    if ($this->strIsEmpty($body)) {
      $errors[] = 'Do not leave post empty!';
    } elseif ($this->exceedsMaxLength($body, 65500)) {
      $errors[] = 'Post is too long!';
    }

    return $errors;
  }

  /**
   * Checks if a string is empty.
   * 
   * @param string $string The text string that is checked
   * @return bool Returns true if string is empty, false if it contains characters. 
   */
  public function strIsEmpty($string)
  {
    if (strlen(trim($string)) <= 0) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * Checks if a string is longer then the provided max length. 
   * 
   * @param string $string The text string that is checked.
   * @param int $max The max length of the string.
   * @return bool Returns true if string is too long, false if it's under the max length. 
   */
  public function exceedsMaxLength($string, $max)
  {
    if (strlen(trim($string)) > $max) {
      return true;
    } else {
      return false;
    }
  }
}

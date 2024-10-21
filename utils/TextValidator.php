<?php

class TextValidator
{
  /**
   * Checks if a string is empty not including whitespace.
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
   * Checks if a string is empty not including whitespace.
   * 
   * @param string $string The text string that is checked.
   * @param int $max The max length of the string.
   * @return bool Returns false if string is too long, true if it's under the max length. 
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

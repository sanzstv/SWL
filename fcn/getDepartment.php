<?php
  function getDepartment() {
    if(isset($_SERVER['REMOTE_USER']))
      return $_SERVER['REMOTE_USER'];
    if(isset($_SERVER['REDIRECT_REMOTE_USER']))
      return $_SERVER['REDIRECT_REMOTE_USER'];
    else
      die("Unable to Determine the Department.");
  }
?>

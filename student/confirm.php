<?php
  if( 
    !isset(
      $_POST['fname'],
      $_POST['lname'],
      $_POST['studentId'],
      $_POST['year'],
      $_POST['email'],
      $_POST['reason']
    )
  )
    die("Some of the Fields were not Entered.");
?>

<?php
  $firstName;$lastName;$studentID;$gradYear;$email;$reason;$captcha;
  if(isset($_POST['firstName'])) {
      $firstName = $_POST['firstName'];
  }
  if(isset($_POST['lastName'])) {
      $lastName = $_POST['lastName'];
  }
  if(isset($_POST['studentID'])) {
          $studentID = $_POST['studentID'];
  }
  if(isset($_POST['gradYear'])) {
          $gradYear = $_POST['gradYear'];
  }
  if(isset($_POST['email'])) {
          $email = $_POST['email'];
  }
  if(isset($_POST['reason'])) {
          $reason = $_POST['reason'];
  }
  if(isset($_POST['g-recaptcha-response'])) {
          $captcha = $_POST['g-recaptcha-response'];
  }
  if(!$captcha) {
      echo '<h2>Please check the captcha form.</h2>';
      exit;
  }
  $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LdJGBATAAAAAKaI13d4CGW6J9Ad5GSXkvBuo0NO&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);

  if($response.success==false) {
      echo '<h2> you are a spammer</h2>';
  }
  else {
      echo '<h2>You have been added to waitlist!</h2>';
  }
?>

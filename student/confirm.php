<!DOCTYPE html>
<html>
<head>
  <title>Request Submitted | SCUWaitlister</title>
  <link rel = "stylesheet" type = "text/css" href = "../css/style.css">
</head>
<body>
  <div class = "head">
    <h1>SCUWaitLister</h1>

  </div>
  <div class = "content">
  <h2>SCUWaitLister Request Confirmation Page</h2>

  <?php
    $captcha = "";
    if(isset($_POST['g-recaptcha-response']))
      $captcha = $_POST['g-recaptcha-response'];
    if(!$captcha)
      die(
        "CAPTCHA Validation Failed.<br />" .
        "Please use the browser's back button."
      );
    $response = json_decode(
      file_get_contents(
        "https://www.google.com/recaptcha/api/siteverify?secret=6LdLFRATAAAAAEwcCFP4vugEpWz19hwWV9kWxKa_&response=" .
        $captcha .
        "&remoteip=" .
        $_SERVER['REMOTE_ADDR']
      )
    );
    if($response->success==false)
      die(
        "CAPTCHA Validation Failed.<br />" .
        "Please use the browser's back button."
      );
  ?>

  <?php
    if( 
      !isset(
        $_POST['department'],
        $_POST['section'],
        $_POST['fname'],
        $_POST['lname'],
        $_POST['studentId'],
        $_POST['year'],
        $_POST['email'],
        $_POST['reason']
      )
    )
      die(
        "Some of the Fields were not Entered.<br />" .
        "Please use the browser's back button."
      );
    $nameRegex = '/^[A-Za-z]+$/';
    $idRegex = '/^\d{11}$/';
    $yearRegex = '/^[2-9]\d{3}$/';
    $emailRegex = '/[A-Za-z0-9.-_]+@[A-Za-z0-9._]+/';
    if( ! preg_match($nameRegex, $_POST['fname']) )
      die(
        "First Name is invalid : ". $_POST['fname'] ."<br />" .
        "Use the browser's back button to go back."
      );
    if( ! preg_match($nameRegex, $_POST['lname']) )
      die(
        "Last Name is invalid : ". $_POST['lname'] ."<br />" .
        "Use the browser's back button to go back."
      );
    if( ! preg_match($idRegex, $_POST['studentId']) )
      die(
        "ID is invalid : ". $_POST['studentId'] ."<br />".
        "Be sure to include all 11 digits.<br />" .
        "Use the browser's back button to go back."
      );
    if( ! preg_match($yearRegex, $_POST['year']) )
      die(
        "Invalid Graduation Year : ". $_POST['year'] ."<br />" .
        "Use the browser's back button to go back."
      );
    if( ! preg_match($emailRegex, $_POST['email']) )
      die(
        "Invalid email : ". $_POST['email'] ."<br />" .
        "Use the browser's back button to go back."
      );
    $_POST['reason'] = preg_replace('/"/', "'", $_POST['reason']);
    $_POST['reason'] = '"' . $_POST['reason'] . '"';
  ?>
  
  <a class = "return" href='../student/index.php'>Return</a><br /><br />

  <?php
    $requestFile = "../resource/". $_POST['department'] ."/request/". $_POST['section'] . ".csv";
    if( file_exists($requestFile) ) {
      $handle = fopen($requestFile, "r");
      while(!flock($handle, LOCK_EX)) {};
      while( ($request = fgetcsv($handle)) !== false ) {
        if(count($request) < 6)
          continue;
        if($request[2] == $_POST['studentId'])
          die("<p>You are already on the waitlist, so you weren't added again.</p>");
      }
      flock($handle, LOCK_UN);
      fclose($handle);
    }
    $requestString =
      "\n" .
      $_POST['lname'] .",".
      $_POST['fname'] .",".
      $_POST['studentId'] .",".
      $_POST['year'] .",".
      $_POST['email'] .",".
      $_POST['reason'];
    if(false == file_put_contents($requestFile, $requestString, FILE_APPEND))
      die("<p>There was an issue writing your request. Please contact the System Administrator.</p>");
  ?>

  <p>
    You have been added to the waitlist.<br />
    You will be contacted via email if space becomes available.
  </p>
  </div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
  <title> Courselist Uploaded| SCUWaitLister</title>
  <link rel = "stylesheet" type = "text/css" href = "../css/style.css">
</head>

<body>
  <div class = "head">
    <h1>SCUWaitLister</h1>
  </div>
  <div class = "content">
    <h2>SCUWaitLister Upload Confirmation Page</h2>
    <?php
      require "../fcn/getDepartment.php";
      $theDepartment = getDepartment();
    ?>
    <p>
      You are using this system as the <?php echo $theDepartment; ?> Department.<br />
      To change the Department, please restart the browser.
    </p>
    <a href='index.php' class = 'return'>Return</a><br />
    <br />
    <?php
      ini_set("auto_detect_line_endings", true);
      if( 
        ! isset($_FILES["courseList"]) ||
        empty($_FILES["courseList"]) ||
        ! isset($_FILES["courseList"]["tmp_name"] ) ||
        empty($_FILES["courseList"]["tmp_name"] )
      )
        die(
          "Upload Failed. <br /><br />" .
          "Either you did not choose a file, or the file was unable to be uploaded.<br />" .
          "If it is the latter case, please contact the system administrator."
        );
      // actual file we will save
      $actFile = "../resource/" . $theDepartment . "/courseList.csv";
      // uploaded file
      $tmpFile = $_FILES["courseList"]["tmp_name"];

      $fp = fopen($tmpFile, "r");
      $fw = fopen($actFile, "w");
      while(!flock($fw, LOCK_EX)){};
      $lineNumber = 0;
      $sectionIdArray = array();
      while( ($data = fgetcsv($fp)) !== false ) {
        $lineNumber++;
        if( count($data) == 1 && $data[0] == null )
          continue;
        if( count($data) > 0 && $data[0][0] == '#' )
          continue;
        if( count($data) < 3 )
          die(
            "Upload Cancelled. The current course list may be inconsistent.<br /><br />" .
            "Incorrect number of fields on line $lineNumber."
          );
        $courseSection = trim($data[0]);
        $courseNumber = trim($data[1]);
        $courseName = trim($data[2]);
        $courseName = preg_replace('/"/', "'", $courseName);
        $courseName = '"' . $courseName . '"';
        if( strlen($courseSection) != 5 || ! is_numeric($courseSection) )
          die(
            "Upload Cancelled. The current course list may be inconsistent.<br /><br />" .
            "Line $lineNumber's Section Number is not in correct format.<br />" .
            "Line $lineNumber : $courseSection, $courseNumber, $courseName<br />"
          );
        if( preg_match("/[0-9]{1,4}[A-Ba-b]{0,1}/", $courseNumber) != 1 )
          die(
            "Upload Cancelled. The current course list may be inconsistent.<br /><br />" .
            "Line $lineNumber's Course Number is not in correct format.<br />" .
            "Line $lineNumber : $courseSection, $courseNumber, $courseName<br />"
          );
        if( $courseName == '""' )
          die(
            "Upload Cancelled. The current course list may be inconsistent.<br /><br />" .
            "Line $lineNumber's Course Name is empty.<br />" .
            "Line $lineNumber : $courseSection, $courseNumber, $courseName<br />"
          );
        if(array_key_exists($courseSection, $sectionIdArray)) {
          echo "Line $lineNumber was not added because it already exists.<br />";
          echo "Line $lineNumber : $courseSection, $courseNumber, $courseName<br />";
          continue;
        }
        $sectionIdArray[$courseSection] = true;
        if( ! fwrite($fw, "$courseSection,$courseNumber,$courseName\n") )
          die(
            "Upload Failed.<br /><br />" .
            "Error writing file to server. Please contact the administrator."
          );
      }
      flock($fw, LOCK_UN);
      fclose($fw);
      fclose($fp);

      $requestListLocation = "../resource/". $theDepartment ."/request/*";
      foreach(glob($requestListLocation) as $request)
        unlink($request);
      echo "<br />Upload Success<br />";

    ?>
  </div>
</body>
</html>









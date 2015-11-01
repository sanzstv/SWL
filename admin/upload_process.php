<!DOCTYPE html>
<html>
<body>
  <h1>SCUWaitLister Upload Confirmation Page</h1>
  <p>
    You are using this system as the <?php echo $_SERVER['REMOTE_USER']; ?> Department.<br />
    To change the Department, please restart the browser.
  </p>
  <a href='index.php'><button>Return</button></a><br />
  <br />
  <?php
    if( ! isset($_FILES["coursList"]["tmp_name"] ) )
      die(
        "Upload Failed. <br /><br />" .
        "Either you did not choose a file, or the file was unable to be uploaded.<br />" .
        "If it is the latter case, please contact the system administrator."
      );
    // actual file we will save
    $actFile = "../resource/" . $_SERVER['REMOTE_USER'] . "/courseList.csv";
    // uploaded file
    $tmpFile = $_FILES["courseList"]["tmp_name"];

    $fp = fopen($tmpFile, "r");
    $fw = fopen($actFile, "w");
    $lineNumber = 0;
    $sectionIdArray = array();
    while( ($data = fgetcsv($fp)) !== false ) {
      $lineNumber++;
      if( count($data) == 1 && $data[0] == null )
        continue;
      if( count($data) != 3 )
        die(
          "Upload Cancelled.<br /><br />" .
          "Incorrect number of fields on line $lineNumber."
        );
      $courseSection = trim($data[0]);
      $courseNumber = trim($data[1]);
      $courseName = trim($data[2]);
      if( strlen($courseSection) != 5 || ! is_numeric($courseSection) )
        die(
          "Upload Cancelled <br /><br />" .
          "Line $lineNumber's Section Number is not in correct format.<br />" .
          "Line $lineNumber : $courseSection, $courseNumber, $courseName<br />"
        );
      if( strlen($courseNumber) != 3 || ! is_numeric($courseNumber) )
        die(
          "Upload Cancelled.<br /><br />" .
          "Line $lineNumber's Course Number is not in correct format.<br />" .
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
    fclose($fw);
    fclose($fp);

    echo "<br />Upload Success<br />";
  ?>
</body>
</html>









<!DOCTYPE html>
<html>
<body>
  <button><a href='index.php'>Return</a></button> <br />
  <br />
  <?php
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
        die("Incorrect number of fields on line $lineNumber.");
      $courseSection = trim($data[0]);
      $courseNumber = trim($data[1]);
      $courseName = trim($data[2]);
      if( strlen($courseSection) != 5 || ! is_numeric($courseSection) )
        die(
          "Line $lineNumber's Section Number is not in correct format.<br />" .
          "Line $lineNumber : $courseSection, $courseNumber, $courseName<br />" .
          "<br />Upload Cancelled<br />"
        );
      if( strlen($courseNumber) != 3 || ! is_numeric($courseNumber) )
        die(
          "Line $lineNumber's Course Number is not in correct format.<br />" .
          "Line $lineNumber : $courseSection, $courseNumber, $courseName<br />" .
          "<br />Upload Cancelled<br />"
        );
      if(array_key_exists($courseSection, $sectionIdArray)) {
        echo "Line $lineNumber was not added because it already exists.<br />";
        echo "Line $lineNumber : $courseSection, $courseNumber, $courseName<br />";
        continue;
      }
      $sectionIdArray[$courseSection] = true;
      if( ! fwrite($fw, "$courseSection,$courseNumber,$courseName\n") )
        die("Error writing file to server. Please contact the administrator.");
    }
    fclose($fw);
    fclose($fp);

    echo "<br />Upload Success<br />";
  ?>
</body>
</html>









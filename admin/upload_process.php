<!DOCTYPE html>
<html>
<body>
  <button><a href='index.php'>Return</a></button>
  <br />
  <?php
    $directory = "../resource/";
    $fileTarget = $directory . basename($_FILES["courseList"]["name"]);
    $fileExt = pathinfo($fileTarget, PATHINFO_EXTENSION);
    if( strcasecmp($fileExt, 'csv') != 0 )
      die("Incorrect file extension! Please use CSV files.");
    $tmpFile = $_FILES["courseList"]["tmp_name"];

    $fp = fopen($tmpFile, "r");
    $fw = fopen($fileTarget, "w");
    $lineNumber = 0;
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
          "Course Section on line $lineNumber is not in correct format.<br />" .
          "$lineNumber : $courseSection, $courseNumber, $courseName"
        );
      if( strlen($courseNumber) != 3 || ! is_numeric($courseNumber) )
        die(
          "Course Number on line $lineNumber is not in correct format.<br />" .
          "$lineNumber : $courseSection, $courseNumber, $courseName"
        );
      if( ! fwrite($fw, "$courseSection,$courseNumber,$courseName\n") )
        die("Error writing file to server. Please contact the administrator.");
    }
    fclose($fw);
    fclose($fp);

    echo "Upload Success <br />";
  ?>
</body>
</html>









<!DOCTYPE html>
<?php require "/DCNFS/users/web/pages/tchen/COEN/174/SCUWaitLister/fcn/parseCourseList.php"; ?>
<html>
<head>
<style>
  table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;
  }
  th, td {
    padding: 5px;
  }
</style>
</head>

<body>
  <h1>SCUWaitLister Waitlist Selection Page Page</h1>
  <p>You are using this system as <?php echo $_SERVER['REMOTE_USER']; ?>.</p>
  <a href='index.php'><button>Return</button></a><br />
  <?php
    $courseListLocation = "../resource/". $_SERVER['REMOTE_USER'] ."/courseList.csv";
    $requestListLocation = "../resource/". $_SERVER['REMOTE_USER'] ."/request/*";
    if( ! file_exists($courseListLocation))
      die(
        "The ". $_SERVER['REMOTE_USER'] ." Department has not uploaded a course list.<br />" .
        "Please <a href='upload.php'>upload</a> a course list first.<br />"
      );
    $requestList = glob($requestListLocation);
    if( count($requestList) == 0 )
      die("There are currently no requests for ". $_SERVER['REMOTE_USER'] ." Department.");
    $courseList = parseCourseList($courseListLocation);
  ?>
  <p>Select a waitlist to view.<p>
  <table style="width:80%">
    <tr>
      <th>Open</th>
      <th>Section Number</th>
      <th>Course Number</th>
      <th>Course Name</th>
    </tr>
  <?php
    $row=1;
    ini_set('auto_detect_line_endings', TRUE);
    foreach(glob($requestListLocation) as $request) {
      $sectionNumber = basename($request, ".csv");
      $courseNumber = $courseList[$sectionNumber][0];
      $courseName = $courseList[$sectionNumber][1];
      echo "<tr>";
      echo
        "<td>" .
          "<form action='view_waitlist.php' method='post'>" .
          "<input type='hidden' name='path' value='". $request ."' />" .
          "<input type='hidden' name='courseSection' value='". $sectionNumber ."' />" .
          "<input type='hidden' name='courseNumber' value='". $courseNumber ."' />".
          "<input type='hidden' name='courseName' value='". $courseName ."' />".
          "<input type='submit' value='view' />" .
          "</form>" .
        "</td>";
      echo "<td>". $sectionNumber ."</td>";
      echo "<td>". $courseNumber ."</td>";
      echo "<td>". $courseName ."</td>";
      echo "</tr>";
    }
  ?> 
  </table>	
</body>
</html>


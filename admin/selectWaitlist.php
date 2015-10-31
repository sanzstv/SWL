<!DOCTYPE html>
<?php require "/DCNFS/users/web/pages/tchen/COEN/174/SCUWaitLister/fcn/parseCsvFile.php"; ?>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}
</style>
</head>

<body>
  <h1>SCUWaitLister Admin Page</h1>
  <p>You are using this system as <?php echo $_SERVER['REMOTE_USER']; ?>.</p>
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
    $courseList = parseCsvFile($courseListLocation);
  ?>
  <p>Select a waitlist to view.<p>
  <table style="width:80%">
    <tr>
      <th>See waitlist</th>
      <th>Section number</th>
      <th>Course number</th>
      <th>Course name</th>
    </tr>
  <?php
    $row=1;
    ini_set('auto_detect_line_endings', TRUE);
    foreach(glob($requestListLocation) as $request) {
      $sectionNumber = basename($request, ".csv");
      echo "<tr>";
      echo
        "<td>" .
          "<form action='view_waitlist.php' method='post'>" .
          "<button name='". basename($request) ."' value='". basename($request) ."'>view</button>" .
          "</form>" .
        "</td>";
      echo "<td>". $sectionNumber ."</td>";
      echo "<td>".$courseList[$sectionNumber][0]."</td>";
      echo "<td>".$courseList[$sectionNumber][1]."</td>";
      echo "</tr>";
    }
  ?> 
  </table>	
</body>
</html>


<!DOCTYPE html>
<?php require "/DCNFS/users/web/pages/tchen/COEN/174/SCUWaitLister/fcn/parseCourseList.php"; ?>
<html>
<head>

		<title>Course List | SCUWaitLister</title>
		
		<link rel = "stylesheet" type = "text/css" href = "../css/style.css">

<style>
  table {
    width:80%;
  }
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

<div class = "head">
			<h1>SCUWaitLister</h1>
		</div>
		<div class = "content">
  <h2>SCUWaitLister Waitlist Selection Page Page</h2>
  <?php
    require "../fcn/getDepartment.php";
    $theDepartment = getDepartment();
  ?>
  <p>
    You are using this system as the <?php echo $_SERVER['REDIRECT_REMOTE_USER']; ?> Department.<br />
    To change the Department, please restart the browser.
  </p>
  <a class = 'return' href='index.php'>Return</a><br />
  <?php
    $courseListLocation = "../resource/". $theDepartment ."/courseList.csv";
    $requestListLocation = "../resource/". $theDepartment ."/request/*";
    if( ! file_exists($courseListLocation))
      die(
        "<p>" .
        "The ". $theDepartment ." Department has not uploaded a course list.<br />" .
        "Please <a href='upload.php'>upload</a> a course list first.<br />" .
        "</p>"
      );
    $requestList = glob($requestListLocation);
    if( count($requestList) == 0 )
      die("<p>There are currently no requests for ". $theDepartment ." Department.</p>");
    $courseList = parseCourseList($courseListLocation);
  ?>
  <p>Select a waitlist to view.<p>
  <table>
    <tr>
      <th>Open</th>
      <th>Section Number</th>
      <th>Course Number</th>
      <th>Course Name</th>
    </tr>
  <?php
    $row=1;
    //ini_set('auto_detect_line_endings', TRUE);
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
          "<input class = 'submit' type='submit' value='view' />" .
          "</form>" .
        "</td>";
      echo "<td>". $sectionNumber ."</td>";
      echo "<td>". $courseNumber ."</td>";
      echo "<td>". $courseName ."</td>";
      echo "</tr>";
    }
  ?> 
  </table>	
</div>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
  <title>Course Selection | SCUWaitlister</title>
    <link rel = "stylesheet" type = "text/css" href = "../css/style.css">

  <style>
    table {
      width:80%;
    }
   
  </style>
</head>

<body>
	<div class = "head">
		<h1>SCUWaitLister</h1>

	</div>
	<div class = "content">
  <h2>SCUWaitLister Course & Section Selection Page</h2>


  <p>
    Select the Section of the Course you wish to request for waitlisting.<br />
    A list of classes is available at <a href="http://www.scu.edu/courseavail/" target="_blank">CourseAvail</a>.
  </p>

	<a class = "return" href='../student/index.php'>&lt;&lt;Return</a><br /><br />

  <?php
    if( ! isset($_POST['department']) )
      die("<p>Please select the department from the <a href='index.php'>department selection page</a>.</p>");
    require('../fcn/parseCourseList.php');
    $filename = '../resource/' . $_POST['department'] . '/courseList.csv';
    if( ! file_exists($filename))
      die("<p>The ". $_POST['department'] ." Department has not uploaded any course information.</p>");
  ?>

  <p><b>Department : <?php echo $_POST['department']; ?></b></p>
  <table>
    <tr>
      <th>Request</th>
      <th>Course Section</th>
      <th>Course Number</th>
      <th>Course Name</th>
    </tr>
    <?php 
      //open course list
      $courses = array();
      $courses = parseCourseList($filename);
      asort($courses);
      foreach ($courses as $key=>$value){
        $sectionNumber = $key;
        $courseNumber = $value[0];
        $courseName = $value[1];
        echo "<tr>";
        echo
          "<td>" .
            "<form action='submit.php' method='post'>" .
            "<input type='hidden' name='department' value='". $_POST['department'] ."' />" .
            "<input type='hidden' name='courseSection' value='". $sectionNumber ."' />" .
            "<input type='hidden' name='courseNumber' value='". $courseNumber ."' />".
            "<input type='hidden' name='courseName' value='". $courseName ."' />".
            "<input type='submit' class = 'request' value='Request' />" .
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


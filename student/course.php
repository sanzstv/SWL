<!DOCTYPE html>
<html lang = "en">
<head>
        <title>Students | SCUWaitlister</title>

</head>

<body>

<h2 class = "header">SCUWaitlister</h2>

<h4 class = "des">Select Course & Section</h4>

<?php
  require('../fcn/parseCourseList.php');
  $filename = '../resource/' . $_POST['department'] . '/courseList.csv';
  if( ! file_exists($filename))
    die("The ". $_POST['department'] ." Department has not uploaded any course information.");
?>

<p>
  Select the Section of the Course you wish to request for waitlisting.<br />
  The listing format is "CourseNumber [SectionNumber] (CourseName)".</br></br>
  A full list of classes is available at <a href="http://www.scu.edu/courseavail/" target="_blank">CourseAvail.</a>
</p>

	<form action="waitlist.php" method = "post">
        Course: <?php echo $_POST['department'];?>
		<select required id = "course" name = "course">
      <option value = "">Select one</option>
			<?php 
			//open course list
			$courses = array();
			$courses = parseCourseList($filename);
      asort($courses);
			foreach ($courses as $key=>$value)
       echo "<option value='$key'>$value[0] [$key] ($value[1])</option>";
			?>
    </select>
    <button type = "submit" value = "Submit">Submit</button>
    </br></br>


</body>

<script type ="text/javascript"></script>
</html>



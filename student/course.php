<!DOCTYPE html>
<html lang = "en">
<head>
        <title>Students | SCUWaitlister</title>

</head>

<body>

<h2 class = "header">SCUWaitlister</h2>

<h4 class = "des">Select Course</h4>

<p>Select the department of the class waitlist you wish to enroll in.</br></br>

A list of classes for the current quarter can be found at <a href="http://www.scu.edu/courseavail/" target="_blank">CourseAvail.</a></p>

	<form action="waitlist.php" method = "post">
        Course: <?php echo $_POST['department'];?>
		<select required id = "course" name = "course">
                <option value = "">Select one</option>
			<?php 
			require('../fcn/parseCourseList.php');
			$filename = '../resource/' . $_POST['department'] . '/courseList.csv';
			//open course list
			$courses = array();
			$courses = parseCourseList($filename);
			foreach ($courses as $key=>$value)
       echo "<option value='$key'>$value[0] ($value[1])</option>";
			?>
		
        </select>
        <button type = "submit" value = "Submit">Submit</button>
        </br></br>


</body>

<script type ="text/javascript"></script>
</html>



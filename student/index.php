<!DOCTYPE html>
<html>
<head>
  <title>Department Selection | SCUWaitlister</title>
  <link rel = "stylesheet" type = "text/css" href = "../css/style.css">

</head>
<body>
	<div class = "head">
		<h1>SCUWaitLister</h1>

	</div>
	
	<div class = "content">
	<h2>Department Selection</h2>

	<p>
		Select the department of the class in which you wish to be waitlisted in.</br>
		A list of classes is available at <a href="http://www.scu.edu/courseavail/" target="_blank">CourseAvail</a>.
	</p>


	<div class = "form_wrapper">
	<form action="selection.php" method = "post">
	<a class = "return" href='../index.html'>&lt;&lt;Return</a><br /><br />
	
    Department:
    <select required id = "department" name = "department">
      <option value = "">Select One</option>
      <?php
        foreach(glob("../resource/*") as $file) {
          $dept = trim(basename($file).PHP_EOL);
          echo "<option value='$dept'>$dept</option>";
        } 
      ?>
    </select>
    </br></br>
    <button type = "submit" class = "submit" value = "Submit">Submit</button>

	</form>
	</div>
	</div>
  </body>
</html>

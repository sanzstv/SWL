<!DOCTYPE html>
<html>
	<head>
		<title>Administrator Page| SCUWaitLister</title>
		
		<link rel = "stylesheet" type = "text/css" href = "../css/style.css">
	</head>
  <body>
	<div class = "head">
			<h1>SCUWaitLister</h1>
		</div>
<div class = "content">
    <h2>SCUWaitLister Admin Page</h2>
    <?php
      require "../fcn/getDepartment.php";
      $theDepartment = getDepartment();
    ?>
    <p>
      You are using this system as the <?php echo $theDepartment; ?> Department.<br />
      To change the Department, please restart the browser.
    </p>
    <a class = "return" href='../index.html'>Return</a>
    <a class = "submit" href='upload.php'>Update Course</a>
    <a class = "submit" href='select_waitlist.php'>View Requests</a>
    
</div>
  </body>
</html>

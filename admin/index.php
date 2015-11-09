<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $theDepartment; ?> Administrator Page| SCUWaitLister</title>
		
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
<<<<<<< HEAD
    <a class = "return" href='../index.html'>Return</a>
    <a class = "submit" href='upload.php'>Update Course</a>
    <a class = "submit" href='select_waitlist.php'>View Requests</a>
=======
    <a class = "return" href='../index.html'><button>Return</button></a>
    <a class = "submit" href='upload.php'><button>Update Course</button></a>
    <a class = "submit" href='select_waitlist.php'><button>View Requests</button></a>
>>>>>>> eda462fcbae3fa1313480aacbf581a240d29070a
</div>
  </body>
</html>

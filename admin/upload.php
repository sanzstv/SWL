<!DOCTYPE html>
<html>
<head>
  <title> Upload Courselist| SCUWaitLister</title>
  <link rel = "stylesheet" type = "text/css" href = "../css/style.css">
 </head>
  <body>
  <div class = "head">
      <h1>SCUWaitLister</h1>
    </div>
    <div class = "content">
    <h2>SCUWaitLister Update Course Page</h2>
    <?php
      require "../fcn/getDepartment.php";
      $theDepartment = getDepartment();
    ?>
    <p>
      You are using this system as the <?php echo $theDepartment; ?> Department.<br />
      To change the Department, please restart the browser.
    </p>
    <a class = 'return' href='index.php'>Return</a><br />
    <p>
      Upload new course list for your department in CSV format.<br />
      Please view the <a href='sampleCourseList.csv' download='sameple.csv'>sample list</a> for formatting.<br />
      WARNING : Uploading a new course list will delete all existing waitlist requests.
    </p>
    <form action='upload_process.php' method='post' enctype='multipart/form-data'>
      <input class = 'return' type='file' name='courseList' id='courseList' />
      <input class = 'submit' type='submit' value='Upload' />
    </form>
  </div>
</body>
</html>

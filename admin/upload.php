<!DOCTYPE html>
<html>
  <style>
    .example{color: #848484;}
  </style>
  <body>
    <h1>SCUWaitLister Update Course Page</h1>
    <p>
      You are using this system as the <?php echo $_SERVER['REMOTE_USER']; ?> Department.<br />
      To change the Department, please restart the browser.
    </p>
    <a href='index.php'><button>Return</button></a><br />
    <p>Upload new course list for your department in CSV format: <br />
    <span class = "example">sectionNumber,courseNumber,courseName<br />
    i.e. 30991,174,Software Engineering</span></p>
    <form action='upload_process.php' method='post' enctype='multipart/form-data'>
      <input type='file' name='courseList' id='courseList' />
      <input type='submit' value='Upload' />
    </form>
  </body>
</html>

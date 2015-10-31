<!DOCTYPE html>
<html>
  <body>
    <h1>SCUWaitLister Update Course Page</h1>
    <p>You are using this system as <?php echo $_SERVER['REMOTE_USER']; ?>.</p>
    <form action='upload_process.php' method='post' enctype='multipart/form-data'>
      Upload new course list for your department in csv format. <br /><br />
      <input type='file' name='courseList' id='courseList' />
      <input type='submit' value='Upload' />
    </form>
  </body>
</html>

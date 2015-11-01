<!DOCTYPE html>
<html>
  <body>
    <h1>SCUWaitLister Admin Page</h1>
    <p>
      You are using this system as the <?php echo $_SERVER['REMOTE_USER']; ?> Department.<br />
      To change the Department, please restart the browser.
    </p>
    <a href='upload.php'><button>Update Course</button></a>
    <a href='select_waitlist.php'><button>View Requests</button></a>
  </body>
</html>

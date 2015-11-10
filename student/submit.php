<!DOCTYPE html>
<html>
<head>
  <title>Waitlist Request | SCUWaitlister</title>
  <link rel = "stylesheet" type = "text/css" href = "../css/style.css">
</head>

<body>
  <div class = "head">
    <h1>SCUWaitLister</h1>
  </div>
  <div class = "content">
  <h1>SCUWaitLister Waitlist Submission Page</h1>

  <p>
    Please fill out the following form.<br />
    All information is required.
  </p>

  <a class = "return" href='../student/index.php'>Return</a><br /><br />
  <?php
    if(
      ! isset(
        $_POST['department'],
        $_POST['courseSection'],
        $_POST['courseNumber'],
        $_POST['courseName']
      )
    )
      die("<p>Please go back to select the waitlist to be viewed.</p>");
  ?>

  <table>
    <tr>
      <td>Department</td>
      <td><?php echo $_POST['department']; ?></td>
    </tr>
    <tr>
      <td>Course Section</td>
      <td><?php echo $_POST['courseSection']; ?></td>
    </tr>
    <tr>
      <td>Course Number</td>
      <td><?php echo $_POST['courseNumber']; ?></td>
    </tr>
    <tr>
      <td>Course Name</td>
      <td><?php echo $_POST['courseName']; ?></td>
    </tr>
  </table>
  <br /><br />
  <form action = "confirm.php" method = "POST">
    <input type='hidden' name='section' value='<?php echo $_POST['courseSection']; ?>' />
    <input type='hidden' name='department' value='<?php echo $_POST['department']; ?>' />
    First Name <br />
    <input required type='text' name='fname' id='fname' placeholder='John' /> <br /><br />
    Last Name <br />
    <input required type='text' name='lname' id='lname' placeholder='Smith' /> <br /> <br />
    Student ID <br />
    <input required type='text' name='studentId' id='studentId' placeholder='00000123456' /> <br /> <br />
    Graduation Year <br />
    <input required type='text' name='year' id='year' placeholder='2025' /> <br /> <br />
    Student email <br />
    <input required type='email' name='email' id='email' placeholder='js@scu.edu' /> <br /><br />
    Reason for Request <br />
    <textarea required maxlength='500' name='reason' id='reason' cols='50' rows='10' placeholder='Your Reasons (500 max)'></textarea><br /><br />
    <div class="g-recaptcha" data-sitekey="6LdLFRATAAAAAPM4TvuoxcJqFiVoAGdPTuBXe2iO"></div><br />
    <script src = 'https://www.google.com/recaptcha/api.js'></script>
    <button class = "submit" type = "submit" value = "submit">Submit Waitlist Request</button>
  </form>
  </div>
</body>
</html>

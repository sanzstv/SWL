<!DOCTYPE html>
<html>
<head>
  <title>Students | SCUWaitlister</title>
  <style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;
    }
    th, td {
        padding: 5px;
    }
  </style>
</head>

<body>
  <h1>SCUWaitLister Waitlist Submission Page</h1>

  <p>
    Please fill out the following form.<br />
    All information is required.
  </p>

  <a href='index.php'><button>Return</button></a><br /><br />
    
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
    <textarea required name='reason' id='reason' cols='50' rows='10' placeholder='Your Reasons'></textarea><br /><br />
    <button type = "submit" value = "submit">Submit Waitlist Request</button>
  </form>

</body>
</html>

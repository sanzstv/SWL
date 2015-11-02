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

  <a href='index.php'><button>Return</button></a><br />
    
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
  <p>
    Please fill out the following form.<br />
    All information is required.
  </p>
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
  <input required type='text' name='fname' id='fname' placeholder='First Name' /> <br /><br />
  <input required type='text' name='lname' id='lname' placeholder='Last Name' /> <br /> <br />
  <input required type='text' name='studentId' id='studentId' placeholder='ID (e.g. 00000123456)' /> <br /> <br />
  <input required type='text' name='year' id='year' placeholder='Graduation Year (e.g. 2025)' /> <br /> <br />
  <input required type='email' name='email' id='email' placeholder='email (e.g. js@scu.edu)' /> <br /><br />
  <textarea required name='reason' id='reason' cols='50' rows='10' placeholder='Reason for Request'></textarea><br /><br />
  <button type = "submit" value = "submit">Submit Waitlist Request</button>

  </form>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
<style>


table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}
</style>
</head> 
<body>
  <h1>SCUWaitLister Waitlist Viewing Page</h1>
  <p>You are using this system as <?php echo $_SERVER['REMOTE_USER']; ?>.</p>
  <a href='select_waitlist.php'><button>Return</button></a><br />
  <p>
  <table>
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
  </p>
  <?php
    if( ! file_exists($_POST['path']) )
      die(
        "The Request File (".$_POST['path'].") does not exist.<br />".
        "Please go back to the main page to select correct request using the interface."
      )
  ?>
  <!--Define table headers-->
  <table style="width:80%">
    <tr>
      <th>Waitlist Position</th>
      <th>Last Name</th>
      <th>First Name</th>
      <th>Student ID</th>
      <th>Graduation Year</th>
      <th>Student email</th>
      <th>Reason for Request</th>
    </tr>
  <!--PHP file that reads from CSV file and produces a table-->
  <?php
  /*
  $row = 1;
  ini_set('auto_detect_line_endings', TRUE);
  //Make sure we can actually open CSV file
  if (($handle = fopen("../resource/COEN/request/12345.csv", "r")) !== FALSE) {
      //HOW DO I SELECT RIGHT CSV FILE??????
      //scan through CSV file
      while(($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    //Create new row and put CSV file data in it
    echo "<tr>";
    //label each row so we know where a person sits on the waitlist
    echo "<td>" . $row;
    //pick out individual values
    foreach($data as $cell) {
        echo "<td>" . htmlspecialchars($cell);
    }
    echo "</tr>\n";
    $row++;
      }
      fclose($handle);
  }
  ini_set('auto_detect_line_endings', FALSE);
  */
  ?>

  </table>
</body>
</html>

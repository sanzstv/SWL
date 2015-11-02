<!DOCTYPE html>
<html>
<head>
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
  <h1>SCUWaitLister Waitlist Viewing Page</h1>
  <p>
    You are using this system as the <?php echo $_SERVER['REMOTE_USER']; ?> Department.<br />
    To change the Department, please restart the browser.
  </p>
  <a href='select_waitlist.php'><button>Return</button></a><br />
  <?php
    if(
      ! isset(
        $_POST['path'],
        $_POST['courseSection'],
        $_POST['courseNumber'],
        $_POST['courseName']
      )
    )
      die("<p>Please go back to select the waitlist to be viewed.</p>");
  ?>
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
      die("<p>There are no requests for this course.</p>");
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
  $file = fopen($_POST['path'], "r");
  $row = 0;
  while(($request = fgetcsv($file,0, ',', '"')) !== false) {
    if(count($request) < 6)
      continue;
    $row++;
    echo "<tr>";
    echo "<td>$row</td>";
    echo "<td>".htmlspecialchars($request[0])."</td>";
    echo "<td>".htmlspecialchars($request[1])."</td>";
    echo "<td>".htmlspecialchars($request[2])."</td>";
    echo "<td>".htmlspecialchars($request[3])."</td>";
    echo "<td>".htmlspecialchars($request[4])."</td>";
    echo "<td>".htmlspecialchars($request[5])."</td>";
    echo "</tr>";
  }
  fclose($file);
  ?>
  </table>
</body>
</html>

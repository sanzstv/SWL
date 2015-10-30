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

<!--Define table headers-->
<table style="width:80%">
  <tr>
    <th>Waitlist Position</th>
    <th>Last Name</th>
    <th>First Name</th>
    <th>ID Number</th>
    <th>Graduation Year</th>
    <th>E-mail Address</th>
    <th>Reason for needing class</th>
  </tr>

<!--PHP file that reads from CSV file and produces a table-->
<?php
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
?>

</table>
</body>
</html>

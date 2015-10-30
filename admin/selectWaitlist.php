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
  <h1>SCUWaitLister Admin Page</h1>
  <p>You are using this system as <?php echo $_SERVER['REMOTE_USER']; ?>.</p>
  <p>Select a waitlist to view:<p>
<table style="width:80%">
  <tr>
    <th>See waitlist</th>
    <th>Section number</th>
    <th>Course number</th>
    <th>Course name</th>
  </th>
<?php
$row=1;
ini_set('auto_detect_line_endings', TRUE);
if(($handle = fopen("../resource/COEN/courseList.csv", "r")) !== FALSE) {
    while(($data= fgetcsv($handle, 1000, ",")) !== FALSE) {
	$num = count($data);
	for($c=0; $c<$num; $c+=3) {
	    echo "<p>";
	    echo "<tr>"; 
	    echo "<td>"; 
	    echo "<a href='view_waitlist.php'><button>Select</button></a>";
	    foreach($data as $cell) {
		echo "<td>" . htmlspecialchars($cell);
	    }
	    echo"</tr>\n";
	    //echo "<a href='parseCSV.php'><button>$data[1]:$data[2] (Section: $data[0])</button></a>";
	    }
    }
    fclose($handle);
}
ini_set('auto_detect_line_endings', FALSE);
?> 

</table>	
</body>
</html>


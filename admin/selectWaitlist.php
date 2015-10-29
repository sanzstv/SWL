<!DOCTYPE html>
<html>
  <body>
    <h1>SCUWaitLister Admin Page</h1>
    <p>You are using this system as <?php echo $_SERVER['REMOTE_USER']; ?>.</p>
    <p>Select a waitlist to view:<p>
    <?php
    $row=1;
    ini_set('auto_detect_line_endings', TRUE);
    if(($handle = fopen("../resource/COEN/courseList.csv", "r")) !== FALSE) {
	while(($data= fgetcsv($handle, 1000, ",")) !== FALSE) {
	    $num = count($data);
	    for($c=0; $c<$num; $c+=3) {
		echo "<p>";
		echo "<a href='parseCSV.php'><button>$data[1]:$data[2] (Section: $data[0])</button></a>";
	    }
	}
        fclose($handle);
    }
    ini_set('auto_detect_line_endings', FALSE);
    ?> 
        
  </body>
</html>

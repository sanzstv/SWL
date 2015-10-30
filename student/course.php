<!DOCTYPE html>
<html lang = "en">
<head>
        <title>Students | SCUWaitlister</title>

</head>

<body>

<h2 class = "header">SCUWaitlister</h2>

<h4 class = "des">Select Couse</h4>


<p>Select the course you wish to enroll in.</br></br>

A list of classes for the current quarter can be found at <a href="http://www.scu.edu/courseavail/" target="_blank">CourseAvail.</a></p>

	
        Course:<select required id = "course">
                <option value = "">Select one</option>
        <?php 
			
			$file = "../resource/" + $_POST[$key] + ".csv"
			echo $_POST[$key]
			
			

			//column to print, E would be 5th
			$col = 1;

			//open course list
			$file = fopen($file,"r");

			// while there are more lines, keep doing this
			while(! feof($file))
			{
				// print out the given column of the line
				$dept = fgetcsv($file)[$col];?>
				<option value="<?= $dept['dept'] ?>"><?= $dept['dept'] ?></option>
			
			<?
			}

			// close the file connection
				fclose($file);
			?>
        </select>
        </br></br>


</body>

<script type ="text/javascript"></script>
</html>

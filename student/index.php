<!DOCTYPE html>
<html lang = "en">
<head>
        <title>Students | SCUWaitlister</title>

</head>

<body>

<h2 class = "header">SCUWaitlister</h2>

<h4 class = "des">Select Department</h4>


<p>Select the department of the class waitlist you wish to enroll in.</br></br>

A list of classes for the current quarter can be found at <a href="http://www.scu.edu/courseavail/" target="_blank">CourseAvail.</a></p>


<form action="course.php" method = "post">
Department:<select required id = "department">
        <option value = "">Select one</option>
<?php
        //list departments with available waitlists
        foreach(glob("../resource") as $file)
        {
                //parse file names
                $depts = basename($file, '.csv');
        ?>
                 <option value="<?= $file['file'] ?>"><?= $file['file'] ?></option>
         <?php
                } ?>
        </select>
        </br></br>
        <button type = "submit" value = "Submit">Submit</button>

</form>
</body>

<script type ="text/javascript"></script>
</html>

<!DOCTYPE html>
<html lang = "en">
<head>
  <title>Students | SCUWaitlister</title>
</head>
<body>
  <h1>SCUWaitLister Department Selection</h1>

  <p>
    Select the department of the class in which you wish to be waitlisted in.</br>
    A list of classes is available at <a href="http://www.scu.edu/courseavail/" target="_blank">CourseAvail</a>.
  </p>

  <a href='../index.html'><button>Return</button></a><br /><br />

  <form action="selection.php" method = "post">
    Department:
    <select required id = "department" name = "department">
      <option value = "">Select One</option>
      <?php
        foreach(glob("../resource/*") as $file) {
          $dept = trim(basename($file).PHP_EOL);
          echo "<option value='$dept'>$dept</option>";
        } 
      ?>
    </select>
    </br></br>
    <button type = "submit" value = "Submit">Submit</button>

  </form>
</body>
</html>

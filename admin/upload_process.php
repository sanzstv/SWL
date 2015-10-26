<!DOCTYPE html>
<html>
<body>
  <?php
    $directory = "../upload/";
    $file_target = $directory . basename($_FILES["courseList"]["name"]);
    $file_extension = pathinfo($file_target, PATHINFO_EXTENSION);
    if( strcasecmp( $file_extension, 'csv' ) == 0 ) {
      if(! move_uploaded_file($_FILES["courseList"]["tmp_name"], $file_target))
        echo "Upload Failure <br />";
      else
        echo "Upload Success <br />";
    } else
      echo "Incorrect File Format! Please Try Again.";
  ?>
  <button><a href='index.html'>Return</a></button>
</body>
</html>









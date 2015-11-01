<?php
  function parseCourseList($courseListLocation) {
    $courseListHandle = fopen($courseListLocation, "r");
    $courseList = array();
    while( ($courseRecord = fgetcsv($courseListHandle)) !== false )
      $courseList[$courseRecord[0]] = array($courseRecord[1], $courseRecord[2]);
    fclose($courseListHandle);
    return $courseList;
  }
?>

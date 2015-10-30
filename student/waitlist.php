<!DOCTYPE html>
<html lang = "en">
<head>
        <title>Students | SCUWaitlister</title>

</head>

<body>

<h2 class = "header">SCUWaitlister</h2>

<h4 class = "des">Student Waitlist Request</h4>
<form action = "request.php" method = "POST">
        First Name:<input name = "first" label = "First Name" type = "text" id ="fname" required = "required"\> </br>
        Last Name:<input name = "last" label = "Last Name" type = "text" id ="lname" required = "required"\></br>
        SCU Email Login:<input name = "email" label = "SCU Email Login" type = "text" id ="email" value="ex:jdoe" required = "required"\>@scu.edu</br>
        Student ID Number:<input name = "studentid" label = "Student ID Number" type = "text" id ="studentid" value="00000163542" required = "required"\></br>
Reason for requiring enrollment (max. 500 words)</br>
        <textarea id = "reason" cols = "50" rows = "10" required = "required" value = "Please explain why you need to be enrolled in this class."></textarea></br>
        <button type = "submit" value = "Submit">Submit Waitlist Request</button>


</form>

</html>

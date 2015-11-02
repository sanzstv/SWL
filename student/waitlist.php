<!DOCTYPE html>
<html>
<head>
        <title>Students | SCUWaitlister</title>

</head>

<body>

<h2 class = "header">SCUWaitlister</h2>

<h4 class = "des">Student Waitlist Request</h4>
<form action = "formCheck.php" method = "POST">
        Last Name:<input name = "first" label = "Last Name" type = "text" maxlength = "40" id ="fname" required = "required"\> </br>
        First Name:<input name = "last" label = "First Name" type = "text" maxlength = "30" id ="lname" required = "required"\></br>
        Student ID Number:<input name = "studentid" label = "Student ID Number" type = "text" maxlength = "11" id = "studentid" value = "00000117281" required = "required"\></br>
        Graduation Year:<input name = "gradYear" label = "Graduation Year" type = "text" maxlength = "4" id = "gradYear" required = "required"\n></br>
        SCU Email Login:<input name = "email" label = "SCU Email Login" type = "email" maxlength = "43" id ="email" value="ex:jdoe" required = "required"\></br>
        Reason for requiring enrollment (max. 500 characters)</br>
        <textarea id = "reason" cols = "50" rows = "10" required = "required" value = "Please explain why you need to be enrolled in this class."></textarea></br>
        <div class="g-recaptcha" data-sitekey="6LdJGBATAAAAADdwl_wupyRNeiy1go0ZUk2bEu1P" required = "required"></div> 
        <button type = "submit" value = "Submit">Submit Waitlist Request</button>

</form>
<script src='https://www.google.com/recaptcha/api.js'></script>
</html>

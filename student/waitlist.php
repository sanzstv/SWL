<!DOCTYPE html>
<html>
<head>
<style>
        .error {color: #FF0000;}
        <title>Students | SCUWaitlister</title>
</style>
</head>

<body>

<?php
$lastErr = $firstErr = $studentIDErr = $gradYearErr = $emailErr = $reasonErr = "";
$last = $first = $studentID = $gradYear = $email = $reason = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["last"])) {
        $lastErr = "Last name is required";
    }
    else {
        $last = test_input($_POST["last"]);
    }
    if(empty($_POST["first"])) {
        $firstErr = "First name is required";
    }
    else {
        $first = test_input($_POST["first"]);
    }   
    if(empty($_POST["studentID"])) {
        $studentIDErr = "ID number required";
    }   
    else {
        $studentID = test_input($_POST["studentID"]);
    }   
    if(empty($_POST["gradYear"])) {
        $gradYear = "Graduation year required";
    }   
    else {
        $gradYear = test_input($_POST["gradYear"]);
    }   
    if(empty($_POST["email"])) {
        $email = "E-mail required";
    }   
    else {
        $email = test_input($_POST["email"]);
    }   
    if(empty($_POST["reason"])) {
        $reason = "A reason for request is required";
    }   
    else {
        $reason = test_input($_POST["reason"]);
    }   
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2 class = "header">SCUWaitlister</h2>

<h4 class = "des">Student Waitlist Request</h4>
<p><span class = "error" >* Required Field.</span></p>
<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST">
Last Name: <input name = "first" label = "Last Name" type = "text" maxlength = "40"> <span class = "error">*<?php echo $lastErr;?></span><br><br>
First Name: <input name = "last" label = "First Name" type = "text" maxlength = "30"> <span class = "error">* <?php echo $firstErr;?></span><br><br>
Student ID Number (i.e. 00000117281): <input name = "studentID" label = "Student ID Number" type = "text" pattern = "[0-9]{11}" maxlength = "11"> <span class = "error">*<?php echo $studentIDErr;?></span><br><br>
Graduation Year (i.e. 2016): <input name = "gradYear" label = "Graduation Year" type = "text" pattern = "[0-9]{4}" maxlength = "4"> <span class = "error">*<?php echo $gradYearErr;?></span><br><br>
SCU Email Login: <input name = "email" label = "SCU Email Login" type = "email" maxlength = "43" value="ex:jdoe@scu.edu"\> <span class = "error">*<?php echo $emailErr;?></span><br><br>
        Reason for requiring enrollment (max. 500 characters):</br>
        <textarea id = "reason" cols = "50" rows = "10" required = "required" value = "Please explain why you need to be enrolled in this class."></textarea> <span class = "error">*<?php echo $reasonErr;?></span><br><br>
        <div class="g-recaptcha" data-sitekey="6LdJGBATAAAAADdwl_wupyRNeiy1go0ZUk2bEu1P" required = "required"></div>
        <button type = "submit" value = "Submit">Submit Waitlist Request</button>

</form>
<script src='https://www.google.com/recaptcha/api.js'></script>
</html>

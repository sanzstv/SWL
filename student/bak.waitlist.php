<!DOCTYPE html>
<html>
<head>
<style>
  .error {color: #FF0000;}
  <title>Students | SCUWaitlister</title>
  <script src = 'https://www.google.com/recaptcha/api.js'></script>
</style>
</head>

<body>

<?php
$lastErr = $firstErr = $studentIDErr = $gradYearErr = $emailErr = $reasonErr = "";
$last = $first = $studentID = $gradYear = $email = $reason = $captcha = "";

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
    if(isset($_POST['g-captcha-response'])) {
        $captcha = $_POST['g-captcha-response'];
    }   
    if(!$captcha) {
        echo '<h2>Please check the captcha box.</h2>';
        exit;
    }
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LdJGBATAAAAAKaI13d4CGW6J9Ad5GSXkvBuo0NO&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);

    if($response.success == false) {
        echo '<h2> please die, you are spamming bruh</h2>';
    }
    else {
        echo '<h2> You have been added to the waitlist</h2>';
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
SCU Email Login (i.e. jdoe@scu.edu): <input name = "email" label = "SCU Email Login" type = "email" pattern = "[a-zA-Z0-9]+@[a-zA-Z0-9.]+.[a-zA-Z]" maxlength = "43"\> <span class = "error">*<?php echo $emailErr;?></span><br><br>
        Reason for requiring enrollment (max. 500 characters):</br>
        <textarea id = "reason" cols = "50" rows = "10" required = "required" value = "Please explain why you need to be enrolled in this class."></textarea> <span class = "error">*<?php echo $reasonErr;?></span><br><br>
        <div class="g-recaptcha" data-sitekey="6LdJGBATAAAAADdwl_wupyRNeiy1go0ZUk2bEu1P" required = "required"></div>
        <button type = "submit" value = "Submit">Submit Waitlist Request</button>

</form>
<script src='https://www.google.com/recaptcha/api.js'></script>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Students Subject</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
</head>
<body bgcolor="lightgrey">
    <style type="text/css">
    #start{
        color: green;
        font-family: monospace;
        font-size: large;
}
</style>
    <div id="start">
    <center>
        <h3><u>Student Academics</u></h3><br>
        <form action="" method="post">
        Roll No&nbsp;&nbsp;:<input type="text" name="roll_no" required><br><br>
        Course ID:<input type="text" name="courseID" required><br><br>
        <input type="submit" name="submit" style="font-family: cursive;">
</form><br>

<?php
session_start();
if(isset($_POST['submit'])) {
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"sms");
    $query = " select * from subjects where courseID = '$_POST[courseID]'";
    $query_run = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($query_run)){
        if($row['roll_no'] == $_POST['roll_no']){
            if($row['courseID'] == $_POST['courseID']){
                $_SESSION['SubID'] = $row['SubID'];
                header("Location: edit_sub.php");
                echo "Login Successfull";
            }
            else{
                echo "Wrong details";
        }
    }
}
}
?> 
  </center>
</div>
</body>
</html>
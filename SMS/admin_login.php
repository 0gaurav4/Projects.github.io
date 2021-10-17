<!DOCTYPE html>
<html>
<head> 
    <title>Admin Login</title>
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
        <h3><u>Admin Login Page</u></h3><br>
        <form action="" method="post">
        Email&nbsp;&nbsp;&nbsp;:<input type="text" name="email" required><br><br>
        Password:<input type="password" name="password" required><br><br>
        <input type="submit" name="submit" style="font-family: cursive;">
</form><br>
<?php
session_start();
$email = "";
$admin_name = "";
if(isset($_POST['submit'])) {
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"sms");
    $query = "select * from login where email = '$_POST[email]' ";
    $query_run = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($query_run)){
        if($row['email'] == $_POST['email']){
            if($row['password'] == $_POST['password']){
                $_SESSION['email'] = $row['email'];
                $_SESSION['admin_name'] = $row['admin_name'];
                header("Location: admin_dashboard.php");
            
                echo "Login Successfull";
            }
            else{
                echo "Wrong Password";
            }
        }
        else{
            echo "Wrong E-mail ID";
        }
    }
}
?> 
    </center>
    </div>
</body>
</html>
 
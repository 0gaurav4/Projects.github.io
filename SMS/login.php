<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
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
    <center><br><br>
        <h3> <u>Student Management System</u></h3><br>
        <form action="" method="post">
        <input type="submit" name="admin_login" value="Admin Login" style="font-family: cursive;">
</form>
<?php
if(isset($_POST['admin_login'])) {
    header("Location: admin_login.php");
}

?>
    </center>
    </div>
</body>
</html>
<?php
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"sms");
    $query = "insert into students values( $_POST[roll_no], '$_POST[F_name]', '$_POST[L_name]', '$_POST[dob]', '$_POST[email]', '$_POST[password]', $_POST[S_Mno], $_POST[S_Uidno], $_POST[S_Vidno],  '$_POST[courseID]', '$_POST[FatherName]', '$_POST[FatherDOB]', '$_POST[MotherName]', $_POST[SiblingCount], '$_POST[SiblingsName]', $_POST[OtherMNO], '$_POST[Address]' )";
  
    $query_run = mysqli_query($connection,$query);
    // echo $query;
?>
<script type="text/javascript">
	alert("Student Added successfully");
	window.location.href = "admin_dashboard.php";
</script>
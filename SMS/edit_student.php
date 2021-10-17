<?php
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"sms");
    $query = "update students set roll_no='$_POST[roll_no]', F_name='$_POST[F_name]', L_name='$_POST[L_name]', dob='$_POST[dob]',
     email='$_POST[email]', password='$_POST[password]', S_Mno='$_POST[S_Mno]',
      S_Uidno='$_POST[S_Uidno]', S_Vidno='$_POST[S_Vidno]', courseID='$_POST[courseID]', FatherName='$_POST[FatherName]', FatherDOB='$_POST[FatherDOB]', MotherName='$_POST[MotherName]', SiblingCount='$_POST[SiblingCount]', 
      SiblingsName='$_POST[SiblingsName]', OtherMNO='$_POST[OtherMNO]', Address='$_POST[Address]'
      where roll_no = $_POST[roll_no]";
    $query_run = mysqli_query($connection,$query);
    //echo $query;

?>
<script type="text/javascript">
	alert("Details edited successfully");
	window.location.href = "students_dashboard.php";
</script>
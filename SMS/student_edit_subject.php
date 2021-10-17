<?php
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"sms");
    $query = "update subjects set subjectcode='$_POST[subjectcode]', subject1='$_POST[subject1]', ObtM1='$_POST[ObtM1]',
    MM1='$_POST[MM1]', subjectcode2='$_POST[subjectcode2]', subject2='$_POST[subject2]', ObtM2='$_POST[ObtM2]',
    MM2='$_POST[MM2]', subjectcode3='$_POST[subjectcode3]', subject3='$_POST[subject3]', ObtM3='$_POST[ObtM3]',
    MM3='$_POST[MM3]', subjectcode4='$_POST[subjectcode4]', subject4='$_POST[subject4]', ObtM4='$_POST[ObtM4]',
    MM4='$_POST[MM4]', subjectcode5='$_POST[subjectcode5]', subject5='$_POST[subject5]', ObtM5='$_POST[ObtM5]',
    MM5='$_POST[MM5]', TotalObtM='$_POST[TotalObtM]', TotalMM='$_POST[TotalMM]'
      where SubID = $_POST[SubID]";
    $query_run = mysqli_query($connection,$query);
    // echo $query;

?>
<script type="text/javascript">
	 alert("Details edited successfully");
	 window.location.href = "edit_sub.php";
</script>
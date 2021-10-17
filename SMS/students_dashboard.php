<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
    #header{
        height: 10% ;
        width: 100%;
        top: 2%;
        background-color: black;
        position: fixed;
        color: white;
    }
    #left_side{
        height: 75%;
        width: 15%;
        top: 10%;
        position: fixed;
        padding: 1%;
    }
    #right_side{
        height: 75%;
        width: 80%;
        background-color: darkgray;
        left: 17%;
        top: 21%;
        position: fixed;
        font-family: cursive;
        color: purple;
        border: solid 1px black;
    }
    #top_span{
        top: 15%;
        width: 80%;
        left: 17%;
        position: fixed;
    }
    
    </style>
    <?php
    session_start();
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"sms");
    
    ?>
</head>
<body bgcolor="lightgrey">

    <div id="header">
        <center><br><strong><font color="lightgreen"><u>Student Management System</u></font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
        <font color="skyblue">Roll No:-</font> <?php echo $_SESSION['roll_no']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <font color="skyblue">Course ID:-</font> <?php echo $_SESSION['courseID']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <font color="skyblue">First Name:-</font> <?php echo $_SESSION['F_name']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <font color="skyblue">Last Name:-</font> <?php echo $_SESSION['L_name']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
         <a href="logout.php"><font color="gold">Logout</font></a>
    </center>
    </div>
    <span id="top_span"><marquee>Note:- This portal is open now... please edit your info. if wrong.</marquee></span>
    <div id="left_side"><br><br><br>
        <form action="" method="post">
            <table>
                <tr>
                    <td><hr>
                        <input type="submit" name="show_detail" value="Show Details" style="font-family: cursive;">
                    </td>
                </tr>
                <tr>
                    <td><hr>
                        <input type="submit" name="edit_detail" value="Edit Details" style="font-family: cursive;">
                    <hr></td>
                </tr>
                <tr>
                    <td><hr>
                        <input type="submit" name="sub_id" value="Semester 1" style="font-family: cursive;">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="sub_id2" value="Semester 2" style="font-family: cursive;">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="sub_id3" value="Semester 3" style="font-family: cursive;">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="sub_id4" value="Semester 4" style="font-family: cursive;">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="sub_id5" value="Semester 5" style="font-family: cursive;">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="sub_id6" value="Semester 6" style="font-family: cursive;">
                        <hr>
                    </td>
                </tr>
            </table>
</form>
    </div>  

<?php
if(isset($_POST['sub_id'])) {
    header("Location: sub_id.php");
}
?>

<?php
if(isset($_POST['sub_id2'])) {
    header("Location: sub_id2.php");
}
?>

<?php
if(isset($_POST['sub_id3'])) {
    header("Location: sub_id3.php");
}
?>

<?php
if(isset($_POST['sub_id4'])) {
    header("Location: sub_id4.php");
}
?>

<?php
if(isset($_POST['sub_id5'])) {
    header("Location: sub_id5.php");
}
?>

<?php
if(isset($_POST['sub_id6'])) {
    header("Location: sub_id6.php");
}
?>
       <div id="right_side"><br><br>
        <div id="demo">
               <?php
               if(isset($_POST['show_detail'])){
                $query = "select * from students where roll_no = '$_SESSION[roll_no]' ";
                $query_run = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($query_run)){
                    ?>
                    <center>
                   <table> 
                    <tr>
                    <th>
                        <td><b><u>Student Details:</u></b>
                        </td></th>
                         <th>
                           <td><b>&nbsp;&nbsp;&nbsp;<u>Family Details:</u></b></td>
                       </th>
                    </tr>
                       <tr>
                        <th>
                           <td><b>Roll No: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" value="<?php echo $row['roll_no'];?>" disabled>
                           </td>
                       </th>
                         <td><b>&nbsp;&nbsp;&nbsp;Roll No: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" value="<?php echo $row['roll_no'];?>" disabled>
                           </td>
                       </tr>
                       <tr>
                        <th>
                           <td><b>First Name: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" value="<?php echo $row['F_name'];?>" disabled>
                           </td>
                            </th>
                        <td><b>&nbsp;&nbsp;&nbsp;Father Name: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" value="<?php echo $row['FatherName'];?>" disabled>
                           </td>
                       </tr>
                       <tr>
                        <th>
                           <td><b>Last Name: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" value="<?php echo $row['L_name'];?>" disabled>
                           </td>
                           </th>
                           <td><b>&nbsp;&nbsp;&nbsp;Father DOB: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" value="<?php echo $row['FatherDOB'];?>" disabled>
                           </td>
                       </tr>
                       <tr>
                        <th>
                           <td><b>DOB: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" value="<?php echo $row['dob'];?>" disabled>
                           </td>
                           </th>
                             <td><b>&nbsp;&nbsp;&nbsp;Mother Name: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" value="<?php echo $row['MotherName'];?>" disabled>
                           </td>
                       </tr>
                       <tr>
                        <th>
                           <td><b>E-mail: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" value="<?php echo $row['email'];?>" disabled>
                           </td>
                           </th>
                            <td><b>&nbsp;&nbsp;&nbsp;Sibling Count: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" value="<?php echo $row['SiblingCount'];?>" disabled>
                           </td>
                       </tr>
                       <tr>
                        <th>
                           <td><b>Password: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" value="<?php echo $row['password'];?>" disabled>
                           </td>
                           </th>
                            <td><b>&nbsp;&nbsp;&nbsp;Siblings Name: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" value="<?php echo $row['SiblingsName'];?>" disabled>
                           </td>
                       </tr>
                       <tr>
                        <th>
                           <td><b>Mobile No: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" value="<?php echo $row['S_Mno'];?>" disabled>
                           </td>
                           </th>
                            <td><b>&nbsp;&nbsp;&nbsp;Other Mobile No: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" value="<?php echo $row['OtherMNO'];?>" disabled>
                           </td>
                       </tr>
                        <tr>
                            <th>
                           <td><b>Adhaar No: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" value="<?php echo $row['S_Uidno'];?>" disabled>
                           </td>
                           </th>
                            <td><b>&nbsp;&nbsp;&nbsp;Address: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" value="<?php echo $row['Address'];?>" disabled>
                           </td>
                       </tr>
                       <tr><th>
                           <td><b>Voter ID No: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" value="<?php echo $row['S_Vidno'];?>" disabled>
                           </td>
                       </th>
                       </tr>
                       <tr><th>
                           <td><b>Course ID: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" value="<?php echo $row['courseID'];?>" disabled>
                           </td>
                       </th>
                       </tr>
                   </table></center>
                    <?php
                }
               }
               ?>

               <?php
               if(isset($_POST['edit_detail'])){
                $query = "select * from students where roll_no = '$_SESSION[roll_no]'";
                $query_run = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($query_run)){
                ?>
                <form action="edit_student.php" method="post">
                    <center>
                       <table>
                        <tr>
                        <td><b><u>Student Details:</u></b>
                        </td>
                         <th>
                           <td><b>&nbsp;&nbsp;&nbsp;<u>Family Details:</u></b></td>
                       </th>
                    </tr>
                       <tr>
                           <td><b>Roll No: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" name="roll_no" value="<?php echo $row['roll_no'];?>">
                           </td>
                                <td><b>&nbsp;&nbsp;&nbsp;Roll No: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" name="roll_no" value="<?php echo $row['roll_no'];?>">
                           </td>
                       </tr>
                       <tr>
                           <td><b>First Name: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" name="F_name" value="<?php echo $row['F_name'];?>">
                           </td>
                           <td><b>&nbsp;&nbsp;&nbsp;Father Name: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" name="FatherName" value="<?php echo $row['FatherName'];?>">
                           </td>
                       </tr>
                       <tr>
                           <td><b>Last Name: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" name="L_name" value="<?php echo $row['L_name'];?>">
                           </td>
                           <td><b>&nbsp;&nbsp;&nbsp;Father DOB: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="date" name="FatherDOB" value="<?php echo $row['FatherDOB'];?>">
                           </td>
                       </tr>
                       <tr>
                           <td><b>DOB: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="date" name="dob" value="<?php echo $row['dob'];?>">
                           </td>
                           <td><b>&nbsp;&nbsp;&nbsp;Mother Name: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" name="MotherName" value="<?php echo $row['MotherName'];?>">
                           </td>
                       </tr>
                       <tr>
                           <td><b>E-mail: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" name="email" value="<?php echo $row['email'];?>">
                           </td>
                           <td><b>&nbsp;&nbsp;&nbsp;Sibling Count: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" name="SiblingCount" value="<?php echo $row['SiblingCount'];?>">
                           </td>
                       </tr>
                        <tr>
                           <td><b>Password: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" name="password" value="<?php echo $row['password'];?>">
                           </td>
                           <td><b>&nbsp;&nbsp;&nbsp;Siblings Name: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" name="SiblingsName" value="<?php echo $row['SiblingsName'];?>">
                           </td>
                       </tr>
                       <tr>
                           <td><b>Mobile No: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" name="S_Mno" value="<?php echo $row['S_Mno'];?>">
                           </td>
                           <td><b>&nbsp;&nbsp;&nbsp;Other Mobile No: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" name="OtherMNO" value="<?php echo $row['OtherMNO'];?>">
                           </td>
                       </tr>
                        <tr>
                           <td><b>Adhaar No: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" name="S_Uidno" value="<?php echo $row['S_Uidno'];?>">
                           </td>
                           <td><b>&nbsp;&nbsp;&nbsp;Address: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" name="Address" value="<?php echo $row['Address'];?>">
                           </td>
                       </tr>
                       <tr>
                           <td><b>Voter ID No: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" name="S_Vidno" value="<?php echo $row['S_Vidno'];?>">
                           </td>
                       </tr>
                       <tr>
                           <td><b>Course ID: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" name="courseID" value="<?php echo $row['courseID'];?>">
                           </td>
                       </tr>
                       <tr>
                           <td colspan="2"></td>
                           <td><br><input type="submit" name="edit" value="Save" style="font-family: cursive;"></td>
                       </tr>
                   </table>
                </center>
                </form>
                <?php
                }
                }
               ?>

       

        </div>
    </div>

</body>
</html>
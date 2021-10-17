<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
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
        color: purple;
        font-family: cursive ;
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
        <font color="skyblue">Email:-</font> <?php echo $_SESSION['email']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <font color="skyblue">Name:-</font> <?php echo $_SESSION['admin_name']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <a href="logout.php"><font color="gold">Logout</font></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             </center>
    </div>
    <span id="top_span"><marquee>Note:- This portal is open now... please edit your info. if wrong.</marquee></span>
    <div id="left_side"><br><br><br>
        <form action="" method="post">
            <table>
                <tr>
                    <td><hr>
                        <input type="submit" name="search_student" value="Search Student" style="font-family: cursive;">
                    </td>
                </tr>
                <tr>
                    <td><hr>
                        <input type="submit" name="edit_student" value="Edit Student" style="font-family: cursive;">
                    </td>
                </tr>
                <tr>
                    <td><hr>
                        <input type="submit" name="add_new_student" value="Add New Student" style="font-family: cursive;">
                    </td>
                </tr>
                <tr>
                    <td><hr>
                        <input type="submit" name="delete_student" value="Delete Student" style="font-family: cursive;"><hr>
                    </td>
                </tr> 
                <tr>
                    <td><hr>
                        <input type="submit" name="student_login" value="Student Login" style="font-family: cursive;">
                        <hr>
                    </td>
                </tr>

            </table>

<?php
if(isset($_POST['student_login'])) {
    header("Location: student_login.php");
}
?>

    </div>  

       <div id="right_side"><br><br>
        <div id="demo">
        <?php
        if(isset($_POST['search_student']))
         { 
             ?>
            <center>
                <form action="" method="post">
                   <b> Enter University Roll No:</b>
                    <input type="text" name="roll_no">
                    <input type="submit" name="search_by_roll_no_for_search" value="Search" style="font-family: cursive;">
                </form>
            </center>
            <?php
         }
         if(isset($_POST['search_by_roll_no_for_search']))
         {
                $query = "select * from students where roll_no = '$_POST[roll_no]' ";
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
        if(isset($_POST['edit_student']))
         { 
             ?>
            <center>
                <form action="" method="post">
                    <b>Enter University Roll No:</b>
                    <input type="text" name="roll_no">
                    <input type="submit" name="search_by_roll_no_for_edit" value="Search" style="font-family: cursive;">
                </form>
            </center>
            <?php
         }
         if(isset($_POST['search_by_roll_no_for_edit']))
         {
                $query = "select * from students where roll_no = '$_POST[roll_no]' ";
                $query_run = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($query_run)){
                    ?>
                   <form action="admin_edit_student.php" method="post">
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
         
         <?php
         if(isset($_POST['add_new_student'])){
            ?>
            <center><b><u>Fill the given details:</u></b></center><br>
            <form action="add_student.php" method="post">
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
                        <td><b>Roll No:</b></td>
                        <td>
                            <input type="text" name="roll_no">
                        </td>
                        <td><b>&nbsp;&nbsp;&nbsp;Father Name: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" name="FatherName">
                           </td>
                    </tr>
                    <tr>
                        <td><b>First Name:</b></td>
                        <td>
                            <input type="text" name="F_name">
                        </td>
                         <td><b>&nbsp;&nbsp;&nbsp;Father DOB: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="date" name="FatherDOB">
                           </td>
                    </tr>
                    <tr>
                        <td><b>Last Name:</b></td>
                        <td>
                            <input type="text" name="L_name">
                        </td>
                       <td><b>&nbsp;&nbsp;&nbsp;Mother Name: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" name="MotherName">
                           </td>
                    </tr>
                    <tr>
                        <td><b>DOB:</b></td>
                        <td>
                            <input type="date" name="dob">
                        </td>
                        <td><b>&nbsp;&nbsp;&nbsp;Sibling Count: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" name="SiblingCount">
                           </td>
                    </tr>
                    <tr>
                        <td><b>E-mail:</b></td>
                        <td>
                            <input type="text" name="email">
                        </td>
                       <td><b>&nbsp;&nbsp;&nbsp;Siblings Name: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" name="SiblingsName">
                           </td>
                    </tr>
                    <tr>
                        <tr>
                        <td><b>Password:</b></td>
                        <td>
                            <input type="text" name="password">
                        </td>
                         <td><b>&nbsp;&nbsp;&nbsp;Other Mobile No: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" name="OtherMNO">
                           </td>
                    </tr>
                    <tr>
                        <td><b>Mobile No:</b></td>
                        <td>
                            <input type="text" name="S_Mno">
                        </td>
                          <td><b>&nbsp;&nbsp;&nbsp;Address: &nbsp;&nbsp;&nbsp;</b></td>
                           <td>
                               <input type="text" name="Address">
                           </td>
                    </tr>
                    <tr>
                        <td><b>Adhaar No:</b></td>
                        <td>
                            <input type="text" name="S_Uidno">
                        </td>
                    </tr>
                    <tr>
                        <td><b>Voter ID No:</b></td>
                        <td>
                            <input type="text" name="S_Vidno">
                        </td>
                    </tr>
                    <tr>
                        <td><b>Course ID:</b></td>
                        <td>
                            <input type="text" name="courseID">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td>
                            <input type="submit" name="add" value="Add Student" style="font-family: cursive;">
                        </td>
                    </tr>
                </table>
            </center>
            </form> 
            <?php
         }
         ?>

         <?php
         if(isset($_POST['delete_student'])){
            ?>
            <center>
                <b><u>Enter University Roll No. To Delete Student </u></b><br><br>
                <form action="delete_student.php" method="post">
                    <b>Roll No:</b>
                    <input type="text" name="roll_no">
                    <input type="submit" name="search_by_roll_no_for_delete" value="Delete Student" style="font-family: cursive;">
                    
                </form>
            </center>
            <?php
         }
         ?>

         
        </div>
    </div>

</body>
</html>
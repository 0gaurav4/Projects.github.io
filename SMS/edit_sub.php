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
        <font color="skyblue">SUB ID:-</font> <?php echo $_SESSION['SubID']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
         <a href="logout_student.php"><font color="gold">Logout</font></a>
    </center>
    </div>
    <span id="top_span"><marquee>Note:- This portal is open now... please edit your info. if wrong.</marquee></span>
    <div id="left_side"><br><br><br>
        <form action="" method="post">
            <table>
                <tr>
                    <td><hr>
                        <input type="submit" name="show_subject" value="Show Academics" style="font-family: cursive;">
                    <hr></td>
                </tr>
                 <tr>
                    <td><hr>
                        <input type="submit" name="edit_subject" value="Edit Academics" style="font-family: cursive;">
                    <hr></td>
                </tr>
            </table>
</form>
    </div>  

       <div id="right_side"><br><br>
        <div id="demo">


 <?php
         if(isset($_POST['show_subject'])){
        
                $query = "select * from subjects where SubID = '$_SESSION[SubID]' ";
                $query_run = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($query_run)){
                    ?>
                    <center>
                       <table>
                         <tr>
                            <th><b>Semester: &nbsp;</b>
                            </th>
                            <th><input type="text" name="sem_name" value="<?php echo $row['sem_name'];?>" disabled>
                            </th>
                            <th><b>Roll No: &nbsp;</b>
                            </th>
                            <th><input type="text" name="roll_no" value="<?php echo $row['roll_no'];?>" disabled>
                            </th>
                            <th><b>Course ID: &nbsp;</b>
                            </th>
                            <th><input type="text" name="courseID" value="<?php echo $row['courseID'];?>" disabled>
                            </th>
                            <th><b>Sub ID: &nbsp;</b>
                            </th>
                            <th><input type="text" name="SubID" value="<?php echo $row['SubID'];?>" disabled>
                            </th>
                        </tr>
                       <tr>
                           <td><b>Subject Code: &nbsp;</b></td>
                           <td>
                               <input type="text" name="subjectcode" value="<?php echo $row['subjectcode'];?>" disabled>
                           </td>
                           <td><b>&nbsp;Subject Name: &nbsp;</b></td>
                           <td>
                               <input type="text" name="subject1" value="<?php echo $row['subject1'];?>" disabled>
                           </td>
                           <td><b>&nbsp;Obtain Marks: &nbsp;</b></td>
                           <td>
                               <input type="text" name="ObtM1" value="<?php echo $row['ObtM1'];?>" disabled>
                           </td>
                           <td><b>&nbsp;Max Marks: &nbsp;</b></td>
                           <td>
                               <input type="text" name="MM1" value="<?php echo $row['MM1'];?>" disabled>
                           </td>
                       </tr>
                       <tr>
                           <td><b>Subject Code: &nbsp;</b></td>
                           <td>
                               <input type="text" name="subjectcode2" value="<?php echo $row['subjectcode2'];?>" disabled>
                           </td>
                           <td><b>&nbsp;Subject Name: &nbsp;</b></td>
                           <td>
                               <input type="text" name="subject2" value="<?php echo $row['subject2'];?>" disabled>
                           </td>
                           <td><b>&nbsp;Obtain Marks: &nbsp;</b></td>
                           <td>
                               <input type="text" name="ObtM2" value="<?php echo $row['ObtM2'];?>" disabled>
                           </td>
                           <td><b>&nbsp;Max Marks: &nbsp;</b></td>
                           <td>
                               <input type="text" name="MM2" value="<?php echo $row['MM2'];?>" disabled>
                           </td>
                       </tr>
                       <tr>
                           <td><b>Subject Code: &nbsp;</b></td>
                           <td>
                               <input type="text" name="subjectcode3" value="<?php echo $row['subjectcode3'];?>" disabled>
                           </td>
                           <td><b>&nbsp;Subject Name: &nbsp;</b></td>
                           <td>
                               <input type="text" name="subject3" value="<?php echo $row['subject3'];?>" disabled>
                           </td>
                           <td><b>&nbsp;Obtain Marks: &nbsp;</b></td>
                           <td>
                               <input type="text" name="ObtM3" value="<?php echo $row['ObtM3'];?>" disabled>
                           </td>
                           <td><b>&nbsp;Max Marks: &nbsp;</b></td>
                           <td>
                               <input type="text" name="MM3" value="<?php echo $row['MM3'];?>" disabled>
                           </td>
                       </tr>
                       <tr>
                           <td><b>Subject Code: &nbsp;</b></td>
                           <td>
                               <input type="text" name="subjectcode4" value="<?php echo $row['subjectcode4'];?>" disabled>
                           </td>
                           <td><b>&nbsp;Subject Name: &nbsp;</b></td>
                           <td>
                               <input type="text" name="subject4" value="<?php echo $row['subject4'];?>" disabled>
                           </td>
                           <td><b>&nbsp;Obtain Marks: &nbsp;</b></td>
                           <td>
                               <input type="text" name="ObtM4" value="<?php echo $row['ObtM4'];?>" disabled>
                           </td>
                           <td><b>&nbsp;Max Marks: &nbsp;</b></td>
                           <td>
                               <input type="text" name="MM4" value="<?php echo $row['MM4'];?>" disabled>
                           </td>
                           <tr>
                           <td><b>Subject Code: &nbsp;</b></td>
                           <td>
                               <input type="text" name="subjectcode5" value="<?php echo $row['subjectcode5'];?>" disabled>
                           </td>
                           <td><b>&nbsp;Subject Name: &nbsp;</b></td>
                           <td>
                               <input type="text" name="subject5" value="<?php echo $row['subject5'];?>" disabled>
                           </td>
                           <td><b>&nbsp;Obtain Marks: &nbsp;</b></td>
                           <td>
                               <input type="text" name="ObtM5" value="<?php echo $row['ObtM5'];?>" disabled>
                           </td>
                           <td><b>&nbsp;Max Marks: &nbsp;</b></td>
                           <td>
                               <input type="text" name="MM5" value="<?php echo $row['MM5'];?>" disabled>
                           </td>
                       </tr>
                       </tr>
                       <tr>
                            <td><b>Total Obtain Marks: &nbsp;</b></td>
                           <td>
                               <input type="text" name="TotalObtM" value="<?php echo $row['TotalObtM'];?>" disabled>
                           </td>
                           <td><b>&nbsp;Total Max Marks: &nbsp;</b></td>
                           <td>
                               <input type="text" name="TotalMM" value="<?php echo $row['TotalMM'];?>" disabled>
                           </td>
                       </tr>
                   </table>
                </center>
                   <?php
         }
         }
         ?>

 <?php
         if(isset($_POST['edit_subject'])){
                $query = "select * from subjects where SubID = '$_SESSION[SubID]' ";
                $query_run = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($query_run)){
                    ?>
                   <form action="student_edit_subject.php" method="post">
                    <center>
                       <table>
                        <tr>
                            <th><b>Semester: &nbsp;</b>
                            </th>
                            <th><input type="text" name="sem_name" value="<?php echo $row['sem_name'];?>" disabled>
                            </th>
                            <th><b>Roll No: &nbsp;</b>
                            </th>
                            <th><input type="text" name="roll_no" value="<?php echo $row['roll_no'];?>" disabled>
                            </th>
                            <th><b>Course ID: &nbsp;</b>
                            </th>
                            <th><input type="text" name="courseID" value="<?php echo $row['courseID'];?>" disabled>
                            </th>
                            <th><b>Sub ID: &nbsp;</b>
                            </th>
                            <th><input type="text" name="SubID" value="<?php echo $row['SubID'];?>">
                            </th>
                        </tr>
                       <tr>
                           <td><b>Subject Code: &nbsp;</b></td>
                           <td>
                               <input type="text" name="subjectcode" value="<?php echo $row['subjectcode'];?>">
                           </td>
                           <td><b>&nbsp;Subject Name: &nbsp;</b></td>
                           <td>
                               <input type="text" name="subject1" value="<?php echo $row['subject1'];?>">
                           </td>
                           <td><b>&nbsp;Obtain Marks: &nbsp;</b></td>
                           <td>
                               <input type="text" name="ObtM1" value="<?php echo $row['ObtM1'];?>">
                           </td>
                           <td><b>&nbsp;Max Marks: &nbsp;</b></td>
                           <td>
                               <input type="text" name="MM1" value="<?php echo $row['MM1'];?>">
                           </td>
                       </tr>
                       <tr>
                           <td><b>Subject Code: &nbsp;</b></td>
                           <td>
                               <input type="text" name="subjectcode2" value="<?php echo $row['subjectcode2'];?>">
                           </td>
                           <td><b>&nbsp;Subject Name: &nbsp;</b></td>
                           <td>
                               <input type="text" name="subject2" value="<?php echo $row['subject2'];?>">
                           </td>
                           <td><b>&nbsp;Obtain Marks: &nbsp;</b></td>
                           <td>
                               <input type="text" name="ObtM2" value="<?php echo $row['ObtM2'];?>">
                           </td>
                           <td><b>&nbsp;Max Marks: &nbsp;</b></td>
                           <td>
                               <input type="text" name="MM2" value="<?php echo $row['MM2'];?>">
                           </td>
                       </tr>
                       <tr>
                           <td><b>Subject Code: &nbsp;</b></td>
                           <td>
                               <input type="text" name="subjectcode3" value="<?php echo $row['subjectcode3'];?>">
                           </td>
                           <td><b>&nbsp;Subject Name: &nbsp;</b></td>
                           <td>
                               <input type="text" name="subject3" value="<?php echo $row['subject3'];?>">
                           </td>
                           <td><b>&nbsp;Obtain Marks: &nbsp;</b></td>
                           <td>
                               <input type="text" name="ObtM3" value="<?php echo $row['ObtM3'];?>">
                           </td>
                           <td><b>&nbsp;Max Marks: &nbsp;</b></td>
                           <td>
                               <input type="text" name="MM3" value="<?php echo $row['MM3'];?>">
                           </td>
                       </tr>
                       <tr>
                           <td><b>Subject Code: &nbsp;</b></td>
                           <td>
                               <input type="text" name="subjectcode4" value="<?php echo $row['subjectcode4'];?>">
                           </td>
                           <td><b>&nbsp;Subject Name: &nbsp;</b></td>
                           <td>
                               <input type="text" name="subject4" value="<?php echo $row['subject4'];?>">
                           </td>
                           <td><b>&nbsp;Obtain Marks: &nbsp;</b></td>
                           <td>
                               <input type="text" name="ObtM4" value="<?php echo $row['ObtM4'];?>">
                           </td>
                           <td><b>&nbsp;Max Marks: &nbsp;</b></td>
                           <td>
                               <input type="text" name="MM4" value="<?php echo $row['MM4'];?>">
                           </td>
                           <tr>
                           <td><b>Subject Code: &nbsp;</b></td>
                           <td>
                               <input type="text" name="subjectcode5" value="<?php echo $row['subjectcode5'];?>">
                           </td>
                           <td><b>&nbsp;Subject Name: &nbsp;</b></td>
                           <td>
                               <input type="text" name="subject5" value="<?php echo $row['subject5'];?>">
                           </td>
                           <td><b>&nbsp;Obtain Marks: &nbsp;</b></td>
                           <td>
                               <input type="text" name="ObtM5" value="<?php echo $row['ObtM5'];?>">
                           </td>
                           <td><b>&nbsp;Max Marks: &nbsp;</b></td>
                           <td>
                               <input type="text" name="MM5" value="<?php echo $row['MM5'];?>">
                           </td>
                       </tr>
                       </tr>
                       <tr>
                            <td><b>Total Obtain Marks: &nbsp;</b></td>
                           <td>
                               <input type="text" name="TotalObtM" value="<?php echo $row['TotalObtM'];?>">
                           </td>
                           <td><b>&nbsp;Total Max Marks: &nbsp;</b></td>
                           <td>
                               <input type="text" name="TotalMM" value="<?php echo $row['TotalMM'];?>">
                           </td>
                           <td> &nbsp; &nbsp;<input type="submit" name="edit" value="Save" style="font-family: cursive;"></td>
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
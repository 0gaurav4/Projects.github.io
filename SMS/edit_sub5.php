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
                        <input type="submit" name="students_subject" value="Academics" style="font-family: cursive;">
                    <hr></td>
                </tr>
            </table>
</form>
    </div>  

       <div id="right_side"><br><br>
        <div id="demo">

 <?php
         if(isset($_POST['students_subject'])){
        ?>
         <center>
                <form action="" method="post">
                    <b>Enter Subject ID:</b>
                    <input type="text" name="SubID">
                    <input type="submit" name="student_edit_subject" value="Search" style="font-family: cursive;"><br>
                    <br>
                    <i>(Subject ID for Semester 5 is given in nav bar as above.)</i>
                </form>
            </center>
         <?php
         }
         if(isset($_POST['student_edit_subject']))
         {
                $query = "select * from subjects5 where SubID = '$_POST[SubID]' ";
                $query_run = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($query_run)){
                    ?>
                   <form action="student_edit_subject.php" method="post">
                    <center>
                       <table>
                        <tr>
                            <th></th>
                            <th><b>Semester: &nbsp;</b><input type="text" name="sem_name" value="<?php echo $row['sem_name'];?>" disabled>
                            </th>
                            <th></th>
                            <th><b>Roll No: &nbsp;</b><input type="text" name="roll_no" value="<?php echo $row['roll_no'];?>" disabled>
                            </th>
                        </tr>
                       <tr>
                           <td><b>Subject Code: &nbsp;</b></td>
                           <td>
                               <input type="text" name="subject1" value="<?php echo $row['subjectcode'];?>">
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
                            <td><b>Total Obtain Marks: &nbsp;</b></td>
                           <td>
                               <input type="text" name="TotalObtM" value="<?php echo $row['TotalObtM'];?>">
                           </td>
                           <td><b>&nbsp;Total Max Marks: &nbsp;</b></td>
                           <td>
                               <input type="text" name="TotalMM" value="<?php echo $row['TotalMM'];?>">
                           </td>
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
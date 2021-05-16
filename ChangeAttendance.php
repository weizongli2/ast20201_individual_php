<?php
            require ("db_config.php");
            $conn=new mysqli($servername,$username,$password,$mysql_database);
        
            if($conn->connect_error){
                die("connection failed:" . $conn->connect_error);
            }
            $student_id=filter_input(INPUT_POST,'student_id');
            $course=filter_input(INPUT_POST,'course');
            $title=filter_input(INPUT_POST,'title');
            $situation=filter_input(INPUT_POST,'situation');
            
            session_start();
            $id=$_SESSION['id'];
            $user=$_SESSION['user'];
            $usertype=$_SESSION['usertype'];

            $sql="UPDATE attendance SET situation='$situation' WHERE student_id='$student_id' AND course='$course' AND title='$title'";
            $result= $conn->query($sql);
            echo '<script>$(function(){var course="'.$course.'";$.post("checkAttendance.php",{course:course},function(data){$("#div_result").html(data);});});</script>';


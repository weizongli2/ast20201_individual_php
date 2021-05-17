<?php
            require ("db_config.php");
            $conn=new mysqli($servername,$username,$password,$mysql_database);

            if($conn->connect_error){
                die("connection failed:" . $conn->connect_error);
            }

            $ToSave=json_decode(filter_input(INPUT_POST,'ToSave'));
            $student_ids=json_decode(filter_input(INPUT_POST,'student_ids'));
            $titles=json_decode(filter_input(INPUT_POST,'titles'));
            $course=filter_input(INPUT_POST,'course');
//            echo gettype($ToSave);
//            echo $ToSave[0];
//            echo gettype($student_ids);
//            echo $student_ids[0];
//            echo gettype($titles);
//            echo $titles[0];
            session_start();
            $id=$_SESSION['id'];
            $user=$_SESSION['user'];
            $usertype=$_SESSION['usertype'];

            for($i=0;$i< sizeof($ToSave);$i++){
                if($ToSave[$i]==""){
//                    echo '<script>alert("test");</script>';
                }else{
//                    $temp=$i+1;
//                    echo '<script>alert('.$temp.');</script>';
                      $sql="UPDATE attendance SET situation='$ToSave[$i]' WHERE student_id='$student_ids[$i]'AND title='$titles[$i]'AND course='$course'";
                      $result= $conn->query($sql);
                }
            }
            echo '<script>alert("Save all successfully!");</script>';

<?php
            require ("db_config.php");
        
            $conn=new mysqli($servername,$username,$password,$mysql_database);

            if($conn->connect_error){
                die("connection failed:" . $conn->connect_error);
            }
            session_start();
            $id=$_SESSION['id'];
            $user=$_SESSION['user'];
            $usertype=$_SESSION['usertype'];
            
            $courseid=filter_input(INPUT_POST,'id');
            $course=filter_input(INPUT_POST,'course');
            $title=filter_input(INPUT_POST,'title');
            $date=filter_input(INPUT_POST,'date');
            $time=filter_input(INPUT_POST,'time');
            $URL=filter_input(INPUT_POST,'URL');
            $description=filter_input(INPUT_POST,'description');

            $sql1="SELECT * FROM classinfo WHERE id='$courseid'";
            $result1= $conn->query($sql1);
            
            if($result1->num_rows>0){
                while($row=$result1->fetch_assoc()){
                    if($title==null){
                        $title=$row['title'];
                    }
                    if($date==null){
                        $date=$row['date'];
                    }
                    if($time==null){
                        $time=$row['time'];
                    }
                    if($URL==null){
                        $URL=$row['URL'];
                    }
                    if($description==null){
                        $description=$row['description'];
                    }
                }
            }
            
            $sql2="UPDATE classinfo SET title='$title',date='$date',time='$time',URL='$URL',description='$description' WHERE id='$courseid'";
            $result2= $conn->query($sql2);
            
            $sql3="SELECT * FROM userinfo WHERE usertype='$usertype'";
            $result3= $conn->query($sql3);
            if($result3->num_rows>0){
                while($row=$result3->fetch_assoc()){
                    $sql4="INSERT INTO attendance (course,title,student_id,student_name) VALUES ('$course','$title','".$row['id']."','".$row['username']."')";
                }
            }
            
            echo '<script>alert("'.$course.' information published successfully!");</script>';
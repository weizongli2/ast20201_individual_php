<?php
            require ("db_config.php");
            $conn=new mysqli($servername,$username,$password,$mysql_database);
        
            if($conn->connect_error){
                die("connection failed:" . $conn->connect_error);
            }
            $URL=filter_input(INPUT_POST,'URL');
            $course=filter_input(INPUT_POST,'course');
            $title=filter_input(INPUT_POST,'title');
           
            $date=date('D F d H:i:s e Y',time());
//            echo '<script>alert('.$date.');</script>';
//            echo date('D F d H:i:s e Y',time());
            
            session_start();
            $id=$_SESSION['id'];
            $user=$_SESSION['user'];
            $usertype=$_SESSION['usertype'];
            
            $sql="UPDATE attendance SET situation='present',join_time='$date' WHERE student_id='$student_id' AND course='$course' AND title='$title'";
            $result= $conn->query($sql);
            echo '<div class="card"><div class="card-body">Please wait, we are redirecting you to the course ...</div></div>';
            echo '<script>window.location.href="https://"'.$URL.'"</script>';


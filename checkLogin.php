<?php
        require ("db_config.php");
        
        $conn=new mysqli($servername,$username,$password,$mysql_database);
        
        if($conn->connect_error){
            die("connection failed:" . $conn->connect_error);
        }
        $username=filter_input(INPUT_POST,'username');
        $password=filter_input(INPUT_POST,'password');
        
        $sql="select * from userinfo where username='$username' and password='$password'";
        $result= $conn->query($sql);
        
        if($result->num_rows>0){
            echo '<script>alert("welcome!");</script>';
            while($row=$result->fetch_assoc()){
                session_start();
                $_SESSION['id']=$row['id'];
                $_SESSION['user']=$row['username'];
                $_SESSION['usertype']=$row['usertype'];
//        echo $row['id'];
//        echo $row['username'];
//        echo $row['usertype'];
            }
            if($_SESSION['usertype']=='student'){
                echo '<script>window.location.href="StudentPage.php";</script>';
            }
            if($_SESSION['usertype']=='teacher'){
                echo '<script>window.location.href="TeacherPage.php";</script>';
            }
            
        }else{
            echo 'No User exist!';
        }

        
        
        

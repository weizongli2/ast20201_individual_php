<?php
        require ("db_config.php");
        
        $conn=new mysqli($servername,$username,$password,$mysql_database);
        
        if($conn->connect_error){
            die("connection failed:" . $conn->connect_error);
        }
        session_start();
        if(isset($_SESSION['id'])){
                $id=$_SESSION['id'];
            }
            else{
                echo '<script>alert("Invalid Login!");</script>';
                echo '<script>window.location.href="index.php";</script>';
            }
        $user=$_SESSION['user'];
        $usertype=$_SESSION['usertype'];
        
        if($usertype=="teacher"){
            $sql="SELECT * FROM classinfo WHERE teacher='$user'";
            $result= $conn->query($sql);
        
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    echo '<li class="nav-item"><form class="form-inline"><input type="button" id="btn_addcourse" name="btn_course" class="form-control" value="'.$row['course'].'"/></form></li>';
                }
             }
        }
        if($usertype=="student"){
            $sql="SELECT * FROM classinfo";
            $result= $conn->query($sql);
        
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    echo '<li class="nav-item"><form class="form-inline"><input type="button" id="btn_addcourse" name="btn_course" class="form-control" value="'.$row['course'].'"/></form></li>';
                }
                echo '<li class="nav-item"><form class="form-inline"><input type="button" id="btn_addcourse" name="btn_course" class="form-control" value="all"/></form></li>';
             }
        }
        if($usertype=="admin"){
            $sql="SELECT * FROM classinfo";
            $result= $conn->query($sql);
        
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    echo '<li class="nav-item"><form class="form-inline"><input type="button" id="btn_addcourse" name="btn_course" class="form-control" value="'.$row['course'].'"/></form></li>';
                }
             }
        }
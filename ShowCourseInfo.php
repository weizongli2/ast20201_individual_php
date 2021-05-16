<?php
            require ("db_config.php");
            $conn=new mysqli($servername,$username,$password,$mysql_database);
        
            if($conn->connect_error){
                die("connection failed:" . $conn->connect_error);
            }
            $course=filter_input(INPUT_POST,'course');
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

            $sql="SELECT * FROM classinfo WHERE course='$course'";
            if($course=="all"){
                $sql="SELECT * FROM classinfo";
            }
            
            $result= $conn->query($sql);
            
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    echo '<div>&nbsp;</div>';
                    echo '<div class="card">';
                    echo '<form>';
                    echo '<div class="card-body" id="coursename" name="'.$row['course'].'"><strong>Course</strong>: '.$row['course'].'</div>';
                    echo '<div class="card-body" id="title" name="'.$row['title'].'"><strong>Title</strong>: '.$row['title'].'</div>';
                    echo '</form>';
                    echo '<div class="card-body"><strong>Date</strong>: '.$row['date'].'</div>';
                    echo '<div class="card-body"><strong>Time</strong>: '.$row['time'].'</div>';
                    echo '<div class="card-body"><strong>Course URL</strong>: <input type="submit" style="background-color: transparent;border:0" class="courseURL" href="TakeAttendance.php" value='.$row['URL'].'></div>';
                    echo '<div class="card-body"><strong>Description</strong>: '.$row['description'].'</div>';
                    echo '</div>';
                }
            }


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
            
            $course=filter_input(INPUT_POST,'course');
            
            $sql="SELECT * FROM attendance WHERE student_id='$id' AND course='$course'";
            
           if($course=="all"){
               $sql="SELECT * FROM attendance WHERE student_id='$id'";
           } 
            
            if($usertype=="teacher"){
                $sql="SELECT * FROM attendance WHERE course='$course'";  
            }else if($usertype=="admin"){
                $sql="SELECT * FROM attendance WHERE course='$course'";
                if($course=="all"){
                    $sql="SELECT * FROM attendance";
                }
            }
            
            $result= $conn->query($sql);
            
            echo '<div>&nbsp;</div>';
            echo '<div class="table-responsive">';
            echo '<table class="table table-hover">';
            echo '<thead class="thead-dark">';
            echo '<tr>';
            echo '<th scope="col">Course</th>';
            echo '<th scope="col">Title</th>';
            echo '<th scope="col">Student ID</th>';
            echo '<th scope="col">Student Name</th>';
            echo '<th scope="col">Situation</th>';
            echo '<th scope="col">Join Time</th>';
            if($usertype=="teacher"||$usertype=="admin"){
                echo '<th scope="col">Select</th>';
                echo '<th scope="col">Operation</th>';
            }
            echo '</tr>';
            echo '</thead>';
            
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    echo '<tr>';
                    if($usertype=="teacher"||$usertype=="admin"){
                        echo '<form>';
                        echo '<td><input class="form-control" type="text" id="course" value="'.$row['course'].'" readonly></td>';
                        echo '<td><input class="form-control" type="text" id="title" value="'.$row['title'].'" readonly></td>';
                    }else{
                        echo '<td>'.$row['course'].'</td>';
                        echo '<td>'.$row['title'].'</td>';
                    }
                    echo '<td>'.$row['student_id'].'</td>';
                    echo '<td>'.$row['student_name'].'</td>';
                    if($row['situation']=="absent"){
                        echo '<td style="color:red">'.$row['situation'].'</td>';
                    }else{
                        echo '<td>'.$row['situation'].'</td>';
                    }
                    echo '<td>'.$row['join_time'].'</td>';
                    if($usertype=="teacher"||$usertype=="admin"){
                        echo '<td><select id="selecter" class="form-control"><option value=""></option><option value="present">present</option><option value="absent">absent</option><select></td>';
                        echo '<td><input class="change_submit btn btn-primary" type="submit" style="background-color:grey" name="'.$row['student_id'].'" value="Save"></td>';
                        echo '</form>';
                    }
                    echo '</tr>';
                    }
                    echo '</table>';
                    echo '</div>';
            }
            
            
            
            



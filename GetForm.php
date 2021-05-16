<?php
            require ("db_config.php");
            $conn=new mysqli($servername,$username,$password,$mysql_database);
        
            if($conn->connect_error){
                die("connection failed:" . $conn->connect_error);
            }
            $course=filter_input(INPUT_POST,'course');
            session_start();
            $id=$_SESSION['id'];
            $user=$_SESSION['user'];
            $usertype=$_SESSION['usertype'];
//            echo '<script>alert("'.$course.'");</script>';
            $sql="SELECT * FROM classinfo WHERE course='$course'";
            $result= $conn->query($sql);
            
            if($result->num_rows>0){
//            echo '<script>alert("welcome!");</script>';
            while($row=$result->fetch_assoc()){
                echo '<div>&nbsp;</div>';
                echo '<div style="text-align:center">';
                echo '<form id="course_form">';
                echo '<table>';
                
                echo '<tr>';
                echo '<th>Course ID</th>';
                echo '<td>'.$row["id"].'</td>';
                echo '<td><input class="form-control" type="text" id="id" placeholder="Change here" value="'.$row["id"].'" readonly></td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<th>Course Name</th>';
                echo '<td>'.$row["course"].'</td>';
                echo '<td><input class="form-control" type="text" id="course" placeholder="Change here" value="'.$row["course"].'" readonly></td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<th>Teacher</th>';
                echo '<td>'.$row["teacher"].'</td>';
                echo '<td><input class="form-control" type="text" id="teacher" placeholder="Change here" value="'.$row["teacher"].'" readonly></td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<th>Title</th>';
                echo '<td>'.$row["title"].'</td>';
                echo '<td><input class="form-control" type="text" id="title" placeholder="Change here"></td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<th>Date</th>';
                echo '<td>'.$row["date"].'</td>';
                echo '<td><input class="form-control" type="date" id="date"></td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<th>Time</th>';
                echo '<td>'.$row["time"].'</td>';
                echo '<td><input class="form-control" type="time" id="time"></td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<th>URL</th>';
                echo '<td>'.$row["URL"].'</td>';
                echo '<td><input class="form-control" type="text" id="URL" placeholder="Change here"></td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<th>Description</th>';
                echo '<td>'.$row["description"].'</td>';
                echo '<td><input class="form-control" type="text" id="description" placeholder="Change here"></td>';
                echo '</tr>';
                
                echo '</table>';
                echo '</form>';
                echo '<p></p>';
                echo '<td><input class="change_submit btn btn-primary" type="button" style="background-color:grey" name="'.$row["id"].'" value="Publish"></td>';
                echo '<td><button class="preview btn btn-primary" style="background-color:grey" name="'.$course.'">Preview</button></td>';
                echo '</div>';
            }
        
        }



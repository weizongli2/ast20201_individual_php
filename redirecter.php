<?php
            session_start();
            $usertype=$_SESSION['usertype'];
            
            if($usertype=="student"){
                echo '<script>window.location.href="StudentPage.php"</script>';
            }
            if($usertype=="teacher"){
                echo '<script>window.location.href="TeacherPage.php"</script>';
            }
            if($usertype=="admin"){
                echo '<script>window.location.href="TeacherPage.php"</script>';
            }


<?php
            
            function myFunction(){
                session_start();
                session_destroy();
                echo '<script>alert("You have logged out!");</script>';
                echo '<script>window.location.href="index.php"</script>';
            }
            
            myFunction();


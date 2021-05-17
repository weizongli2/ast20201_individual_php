<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
/*    body{
        background-color: #EAEAEF;
        background-image: url("https://venngage-wordpress.s3.amazonaws.com/uploads/2018/09/Colorful-Circle-Simple-Background-Image-1.jpg");
        background-size: cover;
    }*/
video{
          position: fixed;
          right:0;
          bottom: 0;
          min-width: 100%;
          min-height: 100%;
          width: auto;
          height: auto;
          z-index: -9999;
          /*灰色调*/
          /*-webkit-filter:grayscale(100%)*/

      }
</style>
<script type="text/javascript">
	$(function(){
                                        var name=$("#username").val();
                                        var pwd=$("#password").val();
		$("#btn_submit").click(function(){
                                                    if(name!==""&&pwd!==""){
                                                        $("#div_result").html("<div class='alert alert-info' style='width:95%; margin:0 auto'><strong>Please wait ... </strong></div>");
                                                    }

		});
	});


</script>

</head>
    <body>
        <video id="v1" autoplay muted loop style="">
        <source  src="materials/background.mp4">
    </video>

<article>
<div style="">
	<div>&nbsp;</div>
	<div>


            <form class="container" id="form_login" name="form_login" action="checkLogin.php" method="post">




        <div class="card" style="background-color:#6392B5;background-color:rgba(0,0,0,0.5);">

            <a class="card-body" href="homepage.html" style="border:none;text-align: center">
                <img style="width:25%" class="" src="materials/logo.png" alt="Logo">
            </a>
            <p style="font-family:Times, Times New Roman, serif;font-style:italic;color:#B2B2B2;text-decoration: none;text-align: center">Learning is like rowing upstream, not to advance is to drop back</p>



        <div class="card-body">
			<div><p style="color:silver">User Name:</p></div>
                        <div><p><input type="text" class="form-control" id="username" name="username"  required/></p></div>
        </div>

        <div class="card-body">
			<div><p style="color:silver">Password:</p></div>
            <div><p><input type="password" class="form-control" id="password" name="password" required/></p></div>
        </div>

        <div class="card-body">
			<div>&nbsp;</div>
            <div><p>
            <input type="submit" class="btn btn-primary" style="" id="btn_submit" name="btn_submit" value="Login" /></p></div>
        </div>

        <div>
			<div><p id="div_result">&nbsp;</p></div>
        </div>

        </div>
        </form>
	</div>
    <div>&nbsp;</div>
</div>
</article>
        <?php
        require ("db_config.php");

        $conn=new mysqli($servername,$username,$password,$mysql_database);

        echo $servername;
        echo $username;
        echo $password;
        echo $mysql_database;

        if($conn->connect_error){
            die("connection failed:" . $conn->connect_error);
        }

        $sql="select * from userinfo";
        $result= $conn->query($sql);

//        while($row= mysqli_fetch_assoc($result)){
//            echo "Username:".$row['username'];
//        }
        ?>
    </body>
</html>

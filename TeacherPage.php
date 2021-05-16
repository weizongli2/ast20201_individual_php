<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(function(){
               $.post(
                    "GetCourse.php",
			{
                         
			},
                        function(data){
                            $("#courses").html(data);
			}
                    );
                });

//$(document).ready(function() {
//            $("input[name='btn_course']").click(function (){
//                var course = $(this).val();
//               $.post(
//                    "GetForm.jsp",
//			{
//                         course: course
//			},
//                        function(data){
//                            $("#div_result").html(data);
//			}
//                    );
//                });
//        });
 </script>
        <title>Teacher Page</title>
        <style>
            input[type=button]{
                background-color:transparent;
                border:0;
            }
            input[type=button]:hover{
                color:white;
            }
            table, th, td {
              border: 1px solid white;
              margin:0 auto
            }
        </style>
    </head>
    <body>
        <script>
function logout(){
  if (confirm("Are you going to log out?")) {
    window.location.href="logout.php";
  } else {
  }
}
</script>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#"><img style="width:15%" src="materials/logo.png" alt="Logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

 <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul id="courses" class="navbar-nav">
<!--      <li class="nav-item">
          <form class="form-inline">
              <input type="button" id="btn_addcourse" name="btn_course" class="form-control" value="AST10201"/>
          </form>
      </li>
      
      <li class="nav-item">
          <form class="form-inline">
              <input type="button" id="btn_deletecourse" name="btn_course" class="form-control" value="AST10303"/>
          </form>
      </li>
      
      <li class="nav-item">
          <form class="form-inline">
              <input type="button" id="btn_modifycourse" name="btn_course" class="form-control" value="AST10106"/>
          </form>
      </li>-->
      
    </ul>
      
  </div>
  
        <div class="dropdown ml-auto">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
              <img src="materials/user.png" style="width:10%">
      </a>
          <div class="dropdown-menu">
              <a class="dropdown-item" onclick="logout()">log out</a>
            <a class="dropdown-item" href="HistoryPage.php">history</a>
          </div>
        </div>
</nav>
        <div class="container" id="div_result"></div>
    
    <script type="text/javascript">
    $(document).ready(function() {
        $(document).on("click","input[name='btn_course']",function (){
                var course = $(this).val();
               $.post(
                    "GetForm.php",
			{
                         course: course
			},
                        function(data){
                            $("#div_result").html(data);
			}
                    );
                });
        
    $(document).on("click",".change_submit",function() {
        
        var id = $(this).attr('name');
        var course=$("#course").val();
        var title = $("#title").val();
        var date = $("#date").val();
        var time = $("#time").val();
        var URL = $("#URL").val();
        var description = $("#description").val();
        
//        alert(course);
        
            $.post(
                    "PublishCourse.php",
			{
                         id: id,
                         course:course,
                         title: title,
                         date:date,
                         time:time,
                         URL:URL,
                         description:description
			},
                        function(data){
                            $("#div_result").html(data);
			}
                    );
        });
        
        $(document).on("click",".preview",function() {
            var course=$(this).attr('name');
            $.post(
                    "ShowCourseInfo.php",
			{
                            course:course
			},
                        function(data){
                            $("#div_result").html(data);
			}
                    );
        });
        
        
    });

 </script>
    </body>
</html>

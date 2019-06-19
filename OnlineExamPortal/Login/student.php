<?php
session_start();   
if(isset($_SESSION['username']) and $_SESSION['usertype']>0) {

?>


  <html>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <head>
  <title>Student</title>
     <link rel="stylesheet" type="text/css" href="user_style.css"> 
    <link href="https://fonts.googleapis.com/css?family=Coda" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
      <span class="top" style="font-family: 'Coda', cursive;text-decoration: none;font-size: 20px"><center>ONLINE TEST MANAGEMENT TOOL</center></span>
   
  </head>
  <body>
  

 <ul>
  <li><a class="active" href="student.php" target="_self" >Home</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="options">Exams</a>
    <div class="content">
      <a href="../Student_options/attempt_test.php" target="student_main">Attempt Test</a>
      <a href="../error.php" target="student_main">Results</a>
      <a href="../Student_options/study.php" target="student_main">Study</a>
    </div></li>
  <li><a href="../error.php" target="student_main">History</a></li>
  <li><a href="../Student_options/profile.php" target="student_main">Profile</a></li>
  <li><a href="../Student_options/project.php" target="student_main">Project</a></li>
  <li style="float: right"><a href="logout.php">Logout</a></li>
</ul>
<iframe src="iframe_home.php" height="100%" width="100%" name="student_main"></iframe>
 </html>   

<?php
  
  }
  else{
  	 echo"Please register/login first.";
  }
  ?>
  
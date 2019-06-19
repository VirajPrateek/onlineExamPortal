<?php
session_start();	 
if(isset($_SESSION['username']) && $_SESSION['usertype']<1){

?>

   <html>
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <head>
     <link rel="stylesheet" type="text/css" href="user_style.css"> 
    <link href="https://fonts.googleapis.com/css?family=Coda" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
  <title>Admin</title>
      <span class="top" style="font-family: 'Coda', cursive;text-decoration: none;font-size: 20px">
      <center>ONLINE TEST MANAGEMENT TOOL</center></span>
   
  </head>
  <body>
  

 <ul>
  <li><a class="active" href="admin.php" target="_self" >Home</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="options">Exams</a>
    <div class="content">
      <a href="../Admin_options/create_exam.php" target="main">Create Exam</a>
      <a href="../Admin_options/add_questions.php" target="main">Add Questions</a>
      <a href="../error.php" target="main">Results</a>
    </div></li>
  <li><a href="../Admin_options/user_management.php" target="main">Users</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="options">Others</a>
    <div class="content">
      <a href="../Admin_options/make_admin.php" target="main">Add Admin</a>
      <a href="../Student_options/profile.php" target="main">Profile</a>
      <a href="../Student_options/project.php" target="main">Project</a>
      <a href="https://www.facebook.com/kumarprateekv">Contact Developer</a>
    </div></li>
  <li style="float: right"><a href="logout.php">Logout</a></li>
</ul>

<iframe src="iframe_home.php" height="100%" width="100%" name="main"></iframe>

</body>
</html>   


<?php
   }
  else{
  	 header("Location:register.php");
  }
  ?>
 
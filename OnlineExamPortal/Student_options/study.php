<?php
session_start();	 
if(isset($_SESSION['username']) && $_SESSION['usertype']==1){

 ?>

<!DOCTYPE html>
<html>
<head>
<div class="head">
	<title>Study Material</title>
	<link rel="stylesheet" type="text/css" href="student_style.css">
	<link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
	Study Material</div>
</head>
<body>
<div class="studybody">
 <u>Study Smart,Not Hard!</u><br>
 <img src="../Media/under_construction.jpg">
 
  </div>
</body>
<style type="text/css">
  img {
    max-width: 100%;
    height: auto;
}
</style>
</html>

<?php
  
  }
  else{
  	 echo"Please login/register to view this page.";
  }
  ?>
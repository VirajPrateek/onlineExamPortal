<?php
session_start();	 
if(isset($_SESSION['username']) && ($_SESSION['usertype']==1 || $_SESSION['usertype']==0) ){

 ?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="student_style.css">
<link rel="stylesheet" type="text/css" href="../Login/style.css">
<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
	<title>Change Password</title>
</head>
<body>
<p>
   <center>
   <form method="POST">
   	Enter Old Password<input type="password" name="old_password" required="required" style="border: 1px solid #ccc" >
   	Enter New Password<input type="password" name="new_password" minlength="6" maxlength="13" required="required" style="border: 1px solid #ccc">
   	Confirm new Password<input type="password" name="confirm_new_password" required="required" style="border: 1px solid #ccc">
   	<input type="submit">
   	</form>
   	<?php
     if($_SERVER['REQUEST_METHOD']=='POST'){
     	 include '../Login/dbh.php';
     	  $mysqli=new mysqli('localhost','root','toor','onlineexamportal');
     	  
	     	$old_pass=$mysqli->escape_string(md5($_POST['old_password']));
	     	$new_pass=$mysqli->escape_string(md5($_POST['new_password']));
	     	$confirm_pass=$mysqli->escape_string(md5($_POST['confirm_new_password']));
	     	   $username=$_SESSION['username'];
	     	   $check=$mysqli->query("SELECT * FROM login WHERE username='$username' AND password='$old_pass' ") or die ($mysqli->error());

	        if($check->num_rows<1){
	          echo "Invalid Old Password";
	      }

	      else if($new_pass!=$confirm_pass){
	      	echo " Passwords do not match";
	      }
	      else{
	      	$sql=$mysqli->query("UPDATE login SET password='$new_pass' WHERE username='$username' ");
	      	echo "Password Successfuly Changed!";
	      }
  
     }
   	?>
   </center>
</body>
</html>

 <?php
  }
  else{
  	 echo"Please <a href='../Login/login'>login</a> to view this page.";
  }
  ?>
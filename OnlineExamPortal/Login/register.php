<?php
session_start();
$_SESSION['message']='';
require('dbh.php');
if($_SERVER['REQUEST_METHOD']=='POST'){

     if($_POST['password']==$_POST['confirmpassword']){
        $username=$mysqli->real_escape_string($_POST['username']);
        $email=$mysqli->real_escape_string($_POST['email']);
        $email=strtolower($email);
        $password= $mysqli->escape_string(md5($_POST['password']));         //md5 for password security  
   
   #    $usertype=$_POST['usertype']; 
   #  if($usertype==0){
   #      $adminid=$_POST['adminid'];
   #          }
        
         
  //Checking if email already exists
  $result=mysqli_query($mysqli,"SELECT * FROM login WHERE email='$email'") or die ($mysqli->error());

  if($result->num_rows>0){
    $_SESSION['message']="User with this email already exists";
    }
   else{
       $_SESSION['username']=$username;

   #  if($usertype==0){
   #      $sql="INSERT INTO login (username,password,email,usertype,adminid) VALUES ('$username','$password','$email','$usertype', '$adminid' )";
   #  }
   #      else{
        $sql="INSERT INTO login (username,password,email,usertype) VALUES ('$username','$password','$email','1' )";
          
   #      }
         if($mysqli->query($sql)==true){
              $_SESSION['message']="";
              $_SESSION['username'] = $username;
              $_SESSION['usertype']=1;
   #           if($usertype==1){
               header("location:student.php");
   #           }
   #           else if($usertype==0){
   #          header("location:admin.php");
   #           }
           }
          else{
            $_SESSION['message']="Sorry! Something's wrong.";
          }
      }
   }
     else{
      $_SESSION['message']="Passwords do not match.";}
    }
 mysqli_close($mysqli);

?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
	<title>Register</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
  
</head>
<body>
<div class="header">
   <a href="../index.html">Online Exam Portal</a>
</div><br />
<div class="message" style="font-family: 'Comfortaa';color: red; "><?=$_SESSION['message'] ?> </div>
  <h1>Register</h1>
  <span> or <a href="login.php">Login</a></span>
  <form name="register" action="register.php" method="POST">
     
      <input type="text" name="username" placeholder="Your username" required>
      <input type="password" name="password" placeholder="Your Password" required>
      <input type="password" name="confirmpassword" placeholder="Confirm password" required>
      <input type="text" name="email" placeholder="Email" required>
  <!--
   <input type="radio" name="usertype" value="1" checked>Student
      <input type="radio" name="usertype" value="0" onclick="document.getElementById('adminid').removeAttribute('disabled')" >Admin   
                                                                enable admin id textfield when admin is checked
                                                                0 for admin 1 for student
     <input type="text" name="adminid" id="adminid" placeholder="Admin id" disabled required>  -->

       <input type="submit" >
   </form>
</body>
</html>

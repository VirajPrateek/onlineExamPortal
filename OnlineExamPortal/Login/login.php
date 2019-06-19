<?php
session_start();
require("dbh.php");
$conn=mysqli_connect("localhost","root","toor","onlineexamportal");
$_SESSION['message']='';

if($_SERVER['REQUEST_METHOD']=='POST') {

         $username =mysqli_escape_string($conn,$_POST['username']);
         $password =mysqli_escape_string($conn,md5($_POST['password']));
         $usertype=$_POST['usertype']; 

        if($usertype==0){
         $adminid=$_POST['adminid'];
         $result = mysqli_query($conn,"SELECT username,password,usertype,adminid 
          FROM login WHERE username = '$username' AND password = '$password'
          AND usertype='0'  AND adminid='$adminid' ");
         }
       else{
     $result = mysqli_query($conn,"SELECT username,password,usertype,adminid
                   FROM login WHERE username = '$username'
                               AND password = '$password'
                                AND usertype='1' ");
       }
      $row = mysqli_fetch_assoc($result);
     
    if(mysqli_num_rows($result)==1) {

                $_SESSION['username'] = $username;
                $_SESSION['usertype']=$row['usertype'];
                if($row['usertype']==1){
                header("Location: student.php");
              }
              else if($row['usertype']==0){
                header("location:admin.php");
              }

        } else {

                $_SESSION['message']= " Invalid Credentials!";

        }
  }

    

?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
	<title>Login </title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
  
</head>
<body>
<div class="header">
<a href="../index.html">Online Exam Portal</a>
</div><br>
<span class="message" style="font-family: 'Comfortaa';color: red "><?=$_SESSION['message']?></span>
  <h1>Login</h1>
<span> or <a href="register.php">register</a></span>

  <form id="login_form" action="login.php" method="POST" name="login">
     <input type="text" name="username" placeholder="Your username" required>
     <input type="password" name="password" placeholder="Your password" required>
      <input type="radio" name="usertype" value="1" checked 
            onclick="document.getElementById('adminid').disabled=true ">Student
      <input type="radio" name="usertype" value="0" 
           onclick="document.getElementById('adminid').removeAttribute('disabled')" >Admin   
                                                            <!--  enable admin id textfield when admin is checked
                                                              0 for admin 1 for student-->
   <input type="text" name="adminid" id="adminid" placeholder="Admin id" disabled required='required'>
     <input type="submit" name="login">
   </form>
</body>
</html>
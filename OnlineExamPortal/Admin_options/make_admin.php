<?php
session_start();	 
if(isset($_SESSION['username']) && $_SESSION['usertype']<1){
	$_SESSION['message']='';

 ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
	<title>Add Admin</title>
	<span class="header">NEW ADMINISTRATOR</span>
</head>
<body>
<form method="POST">
<fieldset>
<center>
	<input type="text" name="username" placeholder="Create new admin's user-name" required="required">
	<input type="text" name="email" placeholder="Enter new Admin's Email" required="required">
	<input type="text" name="user" placeholder="Confirm your Username" required="required">
	<input type="text" name="adminid" placeholder="Confirm your Admin ID" required="required">
	<input type="submit">
	<?php
		require('../Login/dbh.php');
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$username= $_POST['username'];
		$email   = $_POST['email'];
		$user    = $_POST['user'];
		$adminid = $_POST['adminid'];

		$new_adminid=rand(1000,9999);   			 //generate random no. b/w 1000 and 9999 for adminid
			     	
		$duplicate_data=$mysqli->query("SELECT * FROM login where username='$username' OR adminid='$new_adminid' ");
        if($duplicate_data->num_rows>0){
            $_SESSION['message']="This username or AdminID is already in use.<br> If the person has already registered as student please delete it from the database first."; 
        }
    	else{
			  $result=$mysqli->query("SELECT * FROM login WHERE adminid='$adminid' ") or die ($mysqli->error());
			     if(mysqli_num_rows($result)==1 && $user==$_SESSION['username']){                 //for Admin Re-Verification
			     	$new_adminid=rand(1000,9999);   			 //generate random no. b/w 1000 and 9999 for adminid
			     	$default_pass=md5("KumarPrateekViraj");
	                $sql="INSERT INTO login (username,password,email,usertype,adminid) VALUES ('$username','$default_pass','$email','0','$new_adminid' )";
	     
	     			    if($mysqli->query($sql)==true){
	     			    	$_SESSION['message']="A new Admin has been created with following details:<br/>Username: ".$username."<br/>Default Password: 							  KumarPrateekViraj <br/> AdminID: ".$new_adminid."<br/>(Please note down the details, will be asked during login).";
	     			    }

			     }
			     else{
			     	  $_SESSION['message']="Admin Re-Verification Failed!";
			     	}  
		}	     	  
	}

	?><br><span class="message"> <?=$_SESSION['message'] ?></span></center>
	</fieldset>
</form>
</body>
<style type="text/css">
.message{
	font-size: 18px;
	color: green;
	font-family: 'Comfortaa';
}
.header{
	font-size: 25px;
	font-family: 'Orbitron';
	border-bottom: 2px solid #eee;
	padding: 10px 0px;
	width: 100%;
	text-align: center;
}
	input[type='text'],input[type='password'] {
		width: 150px;
        transition: ease-in-out, width .35s ease-in-out;
		outline:none;
  		padding:10px;
  		display:block;
  		border-radius: 3px;
 		margin: 20px auto;
 		border:none;
 		border-bottom: 1px solid green;	
	}
   input[type='text']:focus {
		width: 300px;
	}
	
	input[type="submit"]{

	   padding: 10px;
	   color: #fff;
	   background: #0098cb;
	   width: 280px;
	   margin: 15px auto;
	   margin-top: 0px;
	   border: 0px;
	   border-radius: 3px;
	   cursor: pointer;
	   margin-left: 40%;
 }
	
</style>

</html>

 <?php
   }
  else{
  	 header("Location:register.php");
  }
  ?>
 
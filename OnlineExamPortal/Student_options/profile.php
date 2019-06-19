<?php
session_start();	 
if(isset($_SESSION['username']) && ($_SESSION['usertype']==1 || $_SESSION['usertype']==0) ){

 ?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">

<title>MyProfile</title>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="../error.php" target="profile_main">Activities</a>
  <a href="change_password.php" target="profile_main">Change Password</a>
  <a href="../error.php" target="profile_main">Feedback</a>
  <a href="../error.php" target="profile_main">Help</a>
</div>
<span style="font-size:30px;cursor:pointer;font-family: 'Orbitron'" onclick="openNav()">&#9776; Options</span><p>
<iframe src="edit_profile.php" name="profile_main" width=100% height=500 align=right ></iframe>
<script type="text/javascript"> 
	function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}
function closeNav() {
    document.getElementById("mySidenav").style.width = "0px";
}
</script>

</body>
<style type="text/css">
  /**from w3schools **/
.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s
}
 
.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>

</html>


<?php
  
  }
  else{
  	 echo"<center><h3>Please<a href='../Login/login.php'> Login</a> to view this page.</h3></center>";
  }
  ?>
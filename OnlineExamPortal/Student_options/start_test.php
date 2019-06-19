
<?php
session_start();	 
if(isset($_SESSION['username']) && $_SESSION['usertype']==1){
  $_SESSION['message']='';
require '../Login/dbh.php';

echo "server side page to generate questions";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>
<body>

</body>
</html>


 <?php
  }
  else{
  	 echo"<h3>Please <a href='../Login/login'>login</a> to view this page.</h3>";
  }
  ?>

<?php
session_start();	 
if(isset($_SESSION['username']) && ($_SESSION['usertype']==1 || $_SESSION['usertype']==0) ){

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Project</title>
 </head>
 <body>
	 <center>
	   	
	 </center>
	 
 </body>
 </html>

 <?php 
}
else{
	echo "<center><h3><pre>Well, Sorry for this!
	         But you can only view this page if you're an 'valid logged-in user' of the system.</pre></h3></center>";
}?>
<?php
session_start();   
if(isset($_SESSION['username']) && $_SESSION['usertype']==0){
	  if(isset($_POST['id'])){
	         $mysqli=new mysqli('localhost','root','toor','onlineexamportal');
	         $to_delete=$_POST['delete'];
	       
	        $sql="DELETE FROM login WHERE ID='to_delete'";

	      if ($mysqli->query($sql)==true){
	        echo $to_delete;
	      }
	      else{
	      	echo "Something's wrong";
	      }
	  }
	  else{
  	    echo "not set";
      }
  echo"<a href='../user_management.php'>   Back</a>";
}
else{
  mysql_close();
	echo "You're not authorised. Please <a href='../Login/login.php'></a> ";
}
 ?>
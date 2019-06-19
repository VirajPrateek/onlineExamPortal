<?php

$conn = mysqli_connect("localhost","root","toor","onlineexamportal");
$mysqli=new mysqli('localhost','root','toor','onlineexamportal');

if(!$conn){
	die("Connection failed: ".mysqli_connect_error());
}
?>

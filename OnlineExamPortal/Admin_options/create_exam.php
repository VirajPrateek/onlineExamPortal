
<?php
session_start();	 
if(isset($_SESSION['username']) && $_SESSION['usertype']==0){
  $_SESSION['message']='';


?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Exam</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<link rel="stylesheet" type="text/css" href="../Login/table_style.css">

<link rel="stylesheet" href="../jquery-ui-1.12.1.custom/jquery-ui.min.css">
<script src="../jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
<script src="../jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>

</head>
<body>
<span class="header">Create Exam</span>
<center><div class="first" id="first">
   <form method="POST" action="create_exam.php">
   <div class='select'>
   <select name="subject" >
        <li><option value="001">General Aptitude (001)</option></li>
        <option value="002">Quantitative Aptitude (002)</option> 
        <option value="003" selected="selected">Computer Science (003)</option>
        <option value="004">General Science (004)</option>  
     </select><br/><br/>
      <label for="num_ques">Number Of Questions:</label>
       <input name='num_ques' id="num_ques" type="range" min="5" max="30" value="10" step="1" onChange="change();"> <span class="result" id="result"></span>
       <input type="number" name="exam_id" placeholder="Exam ID" min="111" max="999" required="required"><br/>
       <input type="submit" name="submit">

<script>
var result = document.getElementById("result");
var num_ques = document.getElementById("num_ques");
function change(){
    result.innerText = num_ques.value;
}

</script>
   </form></div>
 </center>  
</body>
<style type="text/css">
.result{
	color: green;
	font-size: 30px;
}
	input[type=range] {
    -webkit-appearance: none;
    background-color: gray;
    width: 200px;
    height:20px;
}
select[name='subject']{
	width: 300px;
	padding: 10px;
	border-radius: 3px;
	border: 2px solid #aaa;
    margin: 15px auto; 
}
input[type="number"] {
	display: block;
    width: 150px;
     transition: ease-in-out, width .35s ease-in-out;
     outline:none;
     padding:10px;
     border-radius: 3px;
    border: 1px solid #eee;
    margin: 15px auto;
    
}
input[type="number"]:focus{
  width: 300px;
  border-color: green;
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
}
input[type='submit']:hover{
	background: #0097ac;
}

 </style>
</html>


 <?php
  if($_SERVER['REQUEST_METHOD']=='POST'){
	 	$subject=$_POST['subject'];
	 	$num_ques=$_POST['num_ques'];
	 	$exam_id=$_POST['exam_id'];
	require('../Login/dbh.php');
  $query="SELECT DISTINCT * FROM questionbank  WHERE testid='$subject' LIMIT $num_ques";
  $result=mysqli_query($conn,$query);
	 if($result->num_rows>0){
	 	echo"<center><h3> Questions for the selected subject: <br/></h3> </center>";
#echo <<<_EOT  to use this, uncomment at line 125 and remove this -> ?>
	 	
	 	<center><div style="overflow-x:auto;">     <!--was trying to make the table responsive-->
	 	 <table id="questions" style="width: 50%">
	        <thead >
	            <tr>
	                <td>Select</td>
	                <td>Q no.</td>
	                <td>Question</td>
	                <td>Correct Answer</td>
	            </tr>
	        </thead>
	        <tbody></center>
	<?php  #see that echo on line 111? well, long time ago it ended here with \n 
#_EOT 

	   $i=1;
	  while($row=mysqli_fetch_assoc($result)){
        echo"<tr><td><input type='checkbox'></td>";
	  	echo "<td>".$i++."</td> ";
	  	echo "<td>". $row['question']."</td>";
	  	echo"<td>".$row[$row['ans']]."</td></tr>";
	  }?>
	  </tbody></table></div>
	  <button>Add to Exam</button>
	  <script type="text/javascript">$('#first').hide()</script>   <!-- jQuery to hide the previous page(form) for loading ques-->
	  <?php
	}else{
		echo "<center><h3>Nothing in the question bank!</h3></center>";
	}
 }
  }
  else{
  	 echo"<h3>Please <a href='../Login/login'>login</a> to view this page.</h3>";
  }
  ?>

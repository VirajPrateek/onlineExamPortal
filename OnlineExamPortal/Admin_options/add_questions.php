
<?php
session_start();	 
if(isset($_SESSION['username']) && $_SESSION['usertype']==0 ){
  require("../Login/dbh.php");
  $_SESSION['message']="";
$conn=mysqli_connect("localhost","root","toor","onlineexamportal");

if($_SERVER['REQUEST_METHOD']=='POST') {

        $testid=mysqli_escape_string($conn,$_POST['testid']);
        $question=mysqli_escape_string($conn,$_POST['question']);
          $a=mysqli_escape_string($conn,$_POST['a']);
          $b=mysqli_escape_string($conn,$_POST['b']);
          $c=mysqli_escape_string($conn,$_POST['c']);
          $d=mysqli_escape_string($conn,$_POST['d']);
          $answer=mysqli_escape_string($conn,$_POST['answer']);  

       
     $sql=mysqli_query( $conn,"INSERT INTO questionbank(testid, question,a,b ,c,d,ans) VALUES ('$testid','$question','$a','$b','$c','$d','$answer' )");
     if($sql){
     	$_SESSION['message']= "Question added successfully!";
    } else{
     	$_SESSION['message']= "Something's went wrong!Please Try Again.";
     }
  }

 ?>
 <!DOCTYPE html>
 <html>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <head>
 <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
 	<title>Add Questions</title>
 </head>
 <body>
 <div class="view">
   Recently Added Question:<p/> 
    <?php
     include "../Login/dbh.php";
           
$sql = "SELECT * FROM questionbank order by qno DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $newtext = wordwrap($row['question'] , 30, "<br/>", true);
        echo $newtext."</p><pre><br>(a) ".$row['a']."<br>(b) ".$row['b']."<br>(c) ".$row['c']."<br>(d) ".$row['d'].
              "<br/><br/></pre>Answer Stored: <pre>".$row['ans'].") ". $row[$row['ans']]."</pre>";
    }
} else {
    echo "0 results";
}
$conn->close();

    ?>
    </div>
 <div class="add">
     <form action="add_questions.php" method="POST">
                 <div class="test_id" align="center">
                 <?=$_SESSION['message'] ?>
                 <SELECT name="testid"  required='required'> 
                       <option value="000" > Select a Subject</option>
                       <option value="001"> General Aptitude (001)</option>
                       <option value="002"> Quantitative Aptitude (002)</option>
                       <option value="003"> Computer Science (003)</option>
                       <option value="004"> General Science (004)</option>
                 </SELECT></div>
         <textarea name="question" placeholder="--Question--" required></textarea>
         <input type="text" name="a" placeholder="Option 'A'" required>
         <input type="text" name="b" placeholder="Option 'B'" required>
         <input type="text" name="c" placeholder="Option 'C'" required>
         <input type="text" name="d" placeholder="Option 'D'" required>
                   <select name="answer" required >
                               <option selected="selected">Select the Correct Option</option>
                               <option value="a">A</option>
                               <option value="b">B</option>
                               <option value="c">C</option>
                               <option value="d">D</option>
                          </select>
         <input type="submit" name="submit" value="Add Question">
    </form></div>

 </body>

  <style type="text/css">
 .add{
  text-align: center;
 }
 .view{
  font-family: 'raleway';
  font-size: 20px;
  float: left;
  border-right: 1px solid #aaa;
}
.view:hover{
 
}
body{
  background-color: #eee;
}
 select[name="testid"],select[name="answer"] {
  outline:none;
  padding:10px;
  display:block;
  border-radius: 3px;
  border: 1px solid #eee;
  margin: 20px auto;
}
select[name="answer"]:focus{
  align-content: center;
  font-size: 15px;
  background-color: green;
}
input[type="text"],textarea[name="question"] {
    width: 150px;
    transition: ease-in-out, width .35s ease-in-out;
      outline:none;
     padding:10px;
     border-radius: 3px;
    border: 1px solid #eee;
    margin: 15px auto;
    
}
input[type="text"]:focus{
  width: 300px;
  border-color: green;
}
textarea[name="question"]{
  display: block;
  width: 500px;
  height: 80px;
}
textarea[name="question"]:focus{
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
  </style>
 </html>

 <?php
  
  }
  else{
  	echo"<center><h3>You're not authorised to view this page.</h3></center>";
  }
  ?>
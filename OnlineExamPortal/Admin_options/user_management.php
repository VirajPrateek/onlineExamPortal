<?php
session_start();   
if(isset($_SESSION['username']) && $_SESSION['usertype']==0){

 ?>
<!DOCTYPE html>
<html>
<link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../Login/table_style.css">
<head>
	<title>Management</title>
<div class="head">
	User Management
</div>
 <!-- <script type="text/javascript" src="https://platform.linkedin.com/badges/js/profile.js" async defer></script>
 link to my linked-in 
 <div class="LI-profile-badge"  data-version="v1" data-size="medium" data-locale="en_US" data-type="horizontal" data-theme="dark" data-vanity="kumar-prateek-viraj-274807118"><a class="LI-simple-link" href='https://in.linkedin.com/in/kumar-prateek-viraj-274807118?trk=profile-badge'>Kumar Prateek Viraj</a></div>  -->   
                        <script type='text/javascript'>
                             var view =function(row){
                               window.alert('this may open the profile page');
                             }
                             var remove =function(row){
                                var i=row.parentNode.parentNode.rowIndex;
                                document.getElementById("user_list").deleteRow(i); 

                             }

                 function myFunction() {
                  var input, filter, table, tr, td, i;
                  input = document.getElementById("myInput");
                  filter = input.value.toUpperCase();
                  table = document.getElementById("user_list");
                  tr = table.getElementsByTagName("tr");
                  for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[1];
                    if (td) {
                      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                      } else {
                        tr[i].style.display = "none";
                      }
                    }       
                  }
                }
     
                        </script>

</head>
<body style>
<center>
	<form name="user_mgmnt" action="user_management.php" method="POST">
	 <input type="radio" name="user" id="admin" value="0" >Admin
	 <input type="radio" name="user" id="student" value="1">Student
	 <input type="radio" name="user" id="all" value="2">All	
   <input type="submit" name="submit">

	</form>
<p>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Username.." title="Type in a name">
 <table id="user_list" style="width: 50%">
        <thead >
            <tr class="row">
                <td>ID</td>
                <td>Username</td>
                <td>Email</td>
                <td>Usertype</td>
            </tr>
        </thead>
        <tbody><form method='POST'>
        <?php
            include "../Login/dbh.php";
       if($_SERVER['REQUEST_METHOD']=='POST'){
           $user= isset($_POST['user'])? $_POST['user']:'null';
            if($user==0)
                      $results = mysqli_query($conn,"SELECT * FROM login WHERE usertype = 0 ORDER BY ID ASC LIMIT 50 ");
            else if($user==1)
                      $results = mysqli_query($conn,"SELECT * FROM login WHERE usertype = 1 ORDER BY ID ASC LIMIT 50 "); 
            else 
                      $results = mysqli_query($conn,"SELECT * FROM login ORDER BY ID ASC LIMIT 100 ");       
                while($row = mysqli_fetch_array($results)) {
                ?>
                <tr>
                    <td><?php echo $row['ID'] ?></td>
                    <td><?php echo $row['username']?></td>
                    <td><?php echo $row['email']?></td>
                    <td> <?php if($row['usertype']==0 ){
                    	echo "Admin (".$row['adminid'].")"; } 
                    	else{
                    		echo"Student";}?>  </td>
                    
                </tr>
              <?php
            }
        }else
          echo "<h3>Select usertype </h3>";    
            ?>
            </tbody>
            </table></p></form>

           <button value="" name="">Prev</button> <button value="" name="next">Next>></button>
         

</center>
</body>
</html>
<?php
  }
  else{
  	echo"Sorry! You're not authorised to view this page.You must have administrator level priveleges to access this page ";
    echo "<a href='..Login/login.php'> Login</a>";
    
  }
  ?>

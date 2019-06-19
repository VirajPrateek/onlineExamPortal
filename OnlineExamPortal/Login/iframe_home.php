<?php
session_start();	 
if(isset($_SESSION['username']) && ($_SESSION['usertype']==1 || $_SESSION['usertype']==0) ){

 ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet">
	<title></title>
</head>
<style type="text/css">
	body, html {
    height: 100%;
}

.parallax {
    /* The image used */
    background-image: url("../Media/home-parallax.jpg");
    opacity: 0.7;

    /* Set a specific height */
    min-height: 500px; 

    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
<body>
<p style="color:#789ccc">This page is best viewed in Google Chrome  with resolution 1366 X 668. &nbsp;&nbsp;Scroll down for more.</p>

<div class="parallax">                        
	<span class="first" style="position: fixed;	">
	 <center style="color: #0999bc;" >Welcome <?=$_SESSION['username'] ?>
	 </center> 	
	</span>
</div>

<div style="height:1000px;font-size:20px; background-repeat: no-repeat; background-image: url(../Media/Tomb-Raider.jpg");">
    <span class="second" style="top: 50%">
    <center><br><br><br><p id="demo" style="font-family: 'Comfortaa', sans-serif; font-size:50px;color: red"> </p>
     </span></center>
</div>

<style type="text/css">
	 .first,.second {
    left: 0;
    line-height: 200px;
    margin: auto;
    margin-top: -100px;
    position: absolute;
    top: 40%;
    width: 100%;
}
.first{
	    font-family: 'Tangerine', serif;
        font-size: 120px;
        text-align: center;
        color: red;
        font-weight: bold;
}
	
</style>
</body>
<script> // for contdown timer
// Set the date we're counting down to
var countDownDate = new Date("December 12, 2017 12:30:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML ="This Semester ends in "+ days + "days " + hours + "hrs "
    + minutes + "m " + seconds + "s";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);
</script>
</html>
<?php
}
else{
 echo "<center><h4> If this happened by mistake, it's Okay<br>But if your intentiion is to hack this page,";
  echo "<br>Good Luck with that!</h4>";
	}
	?>
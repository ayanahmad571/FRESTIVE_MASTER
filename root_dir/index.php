<?php
header('Location: app/');
die();
?>
<!DOCTYPE html>
<html>
<title>Frestive - Coming Soon</title>
<meta charset="utf-8">
<link rel="icon" href="app/images/frestive_logo_transparent.png" sizes="16x16" type="image/png">

<style>
body, html {
  height: 100%;
  margin: 0;
}

.bgimg {
  background-image:url(slide3.jpg);
  height: 100%;
  background-position: center;
  background-size: cover;
  position: relative;
  color: white;
  font-family: "Courier New", Courier, monospace;
  font-size: 25px;
}

.topleft {
  position: absolute;
  top: 0;
  left: 16px;
}

.bottomleft {
  position: absolute;
  bottom: 0;
  left: 16px;
}

.middle {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

hr {
  margin: auto;
  width: 40%;
}
#imgCont{
	background-color:rgba(255,255,255,1.00);
	border-radius:23px;
}
#contus{
	color:white;
}
</style>
<body>

<div class="bgimg">
  <div class="topleft">
    <p id="imgCont"><img src="app/images/frestive_logo_transparent.png" width="100px" /></p>
  </div>
  <div class="middle">
    <h1>Virtual Freshers Coming Soon</h1>
    <hr>
    <p id="demo" style="font-size:30px"></p>
  </div>
  <div class="bottomleft">
  </div>
</div>

<script>
// Set the date we're counting down to
var countDownDate = new Date("Jul 13, 2020 12:00:00").getTime();

// Update the count down every 1 second
var countdownfunction = setInterval(function() {

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
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
  
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(countdownfunction);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
.imgfix{
  position: fixed;
  top: 20%;
  right: 40%;
  width: 20%;
  z-index:9999;
}
.road{
	border-right:dashed thick rgba(57,57,57,1.00);
	border-left:dashed thick rgba(57,57,57,1.00);
	background-color:rgba(225,225,225,1.00);
	background-color:rgba(126,126,126,1.00);
	
}
.sideroad{
	background-color:rgba(189,153,136,1.00);
	border-bottom: rgba(123,96,72,1.00) dotted thick;
	padding:1%;
}
.sideroad:hover{
	background-color:rgba(207,160,161,1.00);
}
.boothHead{
	font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
	font-size:5vw;
	color:rgba(255,255,255,1.00);
	position:relative
}
.NavHead{
	font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
	font-size:2em;
	color:rgba(255,255,255,1.00);
	position:relative
}
.imgshop{
	width:60%;
	position:relative;
}
.roadMarking{
	font-size:8vw; 
	color:rgba(255,255,255,1.00);
}
</style>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Blank Page &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css"  />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
</head>
<?php 

$debs = array(
array("ABC SOC","assets/imgfrestive/shop.png"),
array("DEF SOC","assets/imgfrestive/shop.png"),
array("GHI SOC","assets/imgfrestive/shop.png"),
array("JKL SOC","assets/imgfrestive/shop.png"),
array("ABC SOC","assets/imgfrestive/shop.png"),
array("DEF SOC","assets/imgfrestive/shop.png"),
array("GHI SOC","assets/imgfrestive/shop.png"),
array("JKL SOC","assets/imgfrestive/shop.png"),
array("ABC SOC","assets/imgfrestive/shop.png"),
array("DEF SOC","assets/imgfrestive/shop.png"),
array("GHI SOC","assets/imgfrestive/shop.png"),
array("JKL SOC","assets/imgfrestive/shop.png"),
array("ABC SOC","assets/imgfrestive/shop.png"),
array("DEF SOC","assets/imgfrestive/shop.png"),
array("GHI SOC","assets/imgfrestive/shop.png"),
array("JKL SOC","assets/imgfrestive/shop.png"),
array("ABC SOC","assets/imgfrestive/shop.png"),
array("DEF SOC","assets/imgfrestive/shop.png"),
array("GHI SOC","assets/imgfrestive/shop.png"),
array("JKL SOC","assets/imgfrestive/shop.png"),
array("ABC SOC","assets/imgfrestive/shop.png"),
array("DEF SOC","assets/imgfrestive/shop.png"),
array("GHI SOC","assets/imgfrestive/shop.png"),
array("JKL SOC","assets/imgfrestive/shop.png"),
array("ABC SOC","assets/imgfrestive/shop.png"),
array("DEF SOC","assets/imgfrestive/shop.png"),
array("GHI SOC","assets/imgfrestive/shop.png"),
array("JKL SOC","assets/imgfrestive/shop.png"),
array("JKL SOC","assets/imgfrestive/shop.png")
);
?>
<body>
<div class="main-wrapper">
<div style="padding:1%; background-color:rgba(25,57,21,1.00);" class="row">
    <div class="col-5 text-left" >
		<a style="margin-top:auto; margin-bottom:auto;" href="home"><button style="color:black" class="btn btn-warning">Back to Business</button></a>
    </div>
    <div class="col-2 text-center">
    	<h1 class="NavHead" ><strong>FRESTIVE </strong></h1>
    </div>
    <div class="col-5 text-center">
    </div>
    
</div>
    <img class="imgfix" src="assets/img/frestive/friends.png" />
        <div class="row">
    <?php
	$i = 0;
	foreach($debs as $deb){
		if(($i % 2) == 0){
			#left 2
			?>
          <div class="col-4 sideroad">
          <div class="row">
            	<div class="col-12 text-center">
                	<h2 class="boothHead"><?php echo $deb[0]; ?></h2>
                </div>
            	<div class="col-12 text-center">
                	<img class="imgshop" src="assets/img/frestive/shop.png" />
                </div>
          </div>
          </div>

            <div class="col-4 text-center road" >
            	<h1 class="roadMarking"><strong>|</strong></h1>
            </div>
            <?php
		}else{
			?>
          <div class="col-4 sideroad">
          <div class="row">
            	<div class="col-12 text-center">
                	<h2 class="boothHead"><?php echo $deb[0]; ?></h2>
                </div>
            	<div class="col-12 text-center">
                	<img class="imgshop" src="assets/img/frestive/shop.png" />
                </div>
          </div>
          </div>
          </div><div class="row">
            <?php
		}
	 ?>

	<?php 
/*			if(($i % 2) == 0){
			?>
            </div>
            <div class="row">
            <?php
		}
*/
	$i++;
	}
	?>
        </div>
</div>

</body>
</html>
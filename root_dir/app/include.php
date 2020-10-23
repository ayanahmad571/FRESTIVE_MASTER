<?php
function getHead($title){
	?>
        <title><?php echo $title; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Frestive Project">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="images/frestive_logo_notext.png" sizes="16x16" type="image/png">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="plugins/slick-1.8.0/slick.css">
    <link href="plugins/icon-font/styles.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">
    <style>
	@font-face {
    font-family: 'OpenSansCond';
    src: url('fonts/OpenSansCondensed-Bold.ttf');
}
	@font-face {
    font-family: 'OpenSansCondLight';
    src: url('fonts/OpenSansCondensed-Light.ttf');
}
      .boldOS {
        font-family: 'OpenSansCond' !important;
      }
	  body{
		  font-family : 'OpenSansCondLight';
	  }
    </style>


    <?php
}

function getEnd(){
	?>
    <script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/slick-1.8.0/slick.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>
    <?php
}


function getHeaderNav(){
	?>
    	<header class="header d-flex flex-row justify-content-end align-items-center trans_200">
		
		<!-- Logo -->
		<div class="logo mr-auto">
			<a href="index"><img style="width:55px"src="images/frestive_logo_notext_whitebg.png" alt=""></a>
		</div>

		<!-- Navigation -->
		<nav class="main_nav justify-self-end text-right">
			<ul>
            <?php
			$listTabs = array(
			"index","About","Services","Contact"
			);
			
			foreach($listTabs as $tab){
				$a = (basename($_SERVER['PHP_SELF']) == trim(strtolower($tab).".php")? "active" : "");
				echo '<li class="'.$a.'"><a href="'.strtolower($tab).'">'.($tab == "index" ? "Home" : $tab).'</a></li>';
			}
			
			?>
			</ul>
			
			<!-- Search -->
		</nav>

		<!-- Hamburger -->
		<div class="hamburger_container bez_1">
			<i class="fas fa-bars trans_200"></i>
		</div>
		
	</header>

	<!-- Menu -->

	<div class="menu_container">
		<div class="menu menu_mm text-right">
			<div class="menu_close"><i class="far fa-times-circle trans_200"></i></div>
			<ul class="menu_mm">
<?php

			foreach($listTabs as $tab){
				$a = (basename($_SERVER['PHP_SELF']) == trim(strtolower($tab).".php")? "active" : "");
				echo '<li class="menu_mm  '.$a.'"><a href="'.strtolower($tab).'">'.($tab == "index" ? "Home" : $tab).'</a></li>';
			}
			
			?>
			</ul>
		</div>
	</div>


    <?php
}

function getFooter(){
	?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-171851291-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-171851291-1');
</script>

	<footer class="footer">
		<div class="container">
			<div class="row">
            <div class="col-lg-1">
            </div>
				
				<div class="col-lg-4">

					<!-- Footer Intro -->
					<div class="footer_intro">

						<!-- Logo -->
						<div class="logo footer_logo">
							<a href="#">Fres<span>tive</span></a>
						</div>

						<p style="text-align:justify">Frestive aims to provide prospective students and Booth Owners with a near authentic Freshers fair experience.</p>
						
						<!-- Social -->
						<div class="footer_social">
							<ul>
								<li><a href="#"><i class="fab fa-pinterest"></i></a></li>
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fab fa-behance"></i></a></li>
								<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
							</ul>
						</div>
						
						<!-- Copyright -->
						<div class="footer_cr"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Template by <a href="http://aethnaega.com" target="_blank">Aethn Aega</a> and <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>

					</div>

				</div>
				

				<!-- Footer Menu -->
				<div class="col-lg-2">

					<div class="footer_col">
						<div class="footer_col_title">Menu</div>
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">About us</a></li>
							<li><a href="#">Services</a></li>
							<li><a href="#">Contact</a></li>
						</ul>
					</div>

				</div>

				<!-- Footer About -->
				<div class="col-lg-2">

					<div class="footer_col">
						<div class="footer_col_title">About us</div>
						<ul>
							<li><a href="#">The Team</a></li>
						</ul>
					</div>

				</div>

				<!-- Footer Community -->
				<div class="col-lg-2">

					<div class="footer_col">
						<div class="footer_col_title">Community</div>
						<ul>
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="#">Terms of Service</a></li>
						</ul>
					</div>

				</div>

			</div>

			<div class="row">
				<div class="col">
					<!-- Copyright -->
					<div class="footer_cr_2">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Template by <a href="http://aethnaega.com" target="_blank">Aethn Aega</a> and <a href="https://colorlib.com" target="_blank">Colorlib</a></div>
				</div>
			</div>
		</div>
	</footer>
    
    <?php
}
?>

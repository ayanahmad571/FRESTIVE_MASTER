<?php
require_once("include.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>


<title>Frestive - About</title>
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
<link rel="stylesheet" type="text/css" href="styles/about_styles.css">
<link rel="stylesheet" type="text/css" href="styles/about_responsive.css">
</head>
<body>

<div class="super_container">
	
	<!-- Header -->
    <?php
	getHeaderNav();
	?>

	<!-- Home -->

	<div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url(images/home_background.jpg)"></div>
		</div>
		
		<div class="home_title">
			<h2>About us</h2>
			<div class="next_section_scroll">
				<div class="next_section nav_links" data-scroll-to=".team">
					<i class="fas fa-chevron-down trans_200"></i>
					<i class="fas fa-chevron-down trans_200"></i>
				</div>
			</div>
		</div>
	
	</div>

	<!-- Team -->

	<div class="team">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-lg-center text-left team_title">
					<h1>Meet the team</h1>
					<p>We are a team of ambitious and hard working students, here to deliver you the content you are looking for. We won't abandon you after software delivery.  </p>
				</div>
			</div>
			<div class="row">
				
				<!-- Team Item -->
				<div class="col-xl-3 col-lg-4 offset-xl-1 team_col">
					<div class="team_container trans_200">
						<div class="team_member_image"><img src="images/team_1.jpg" alt=""></div>
						<div class="team_member_content">
							<div class="team_member_name">Ayan  <br> Ahmad</div>
							<div class="team_member_title">Co-Founder</div>
							<p>"Lifes too short to make mistakes"</p>
							<div class="team_member_link"><a href="https://www.linkedin.com/in/ayan-ahmad/"><h2><i class="fab fa-linkedin" aria-hidden="true"></i></h2></a></div>
						</div>
					</div>
				</div>
				
				<!-- Team Item -->
				<div class="col-xl-3 col-lg-4 offset-xl-1 team_col">
					<div class="team_container trans_200">
						<div class="team_member_image"><img src="images/team_2.jpg" alt=""></div>
						<div class="team_member_content">
							<div class="team_member_name">Kostas Baronos</div>
							<div class="team_member_title">Co-Founder</div>
							<p>"Lifes too short to make mistakes"</p>
							<div class="team_member_link"><a href="https://www.linkedin.com/in/konstantinos-baronos/"><h2><i class="fab fa-linkedin" aria-hidden="true"></i></h2></a></div>
						</div>
					</div>
				</div>
				
				<!-- Team Item -->
				<div class="col-xl-3 col-lg-4 offset-xl-1 team_col">
					<div class="team_container trans_200">
						<div class="team_member_image"><img src="images/team_3.jpg" alt=""></div>
						<div class="team_member_content">
							<div class="team_member_name">Nishaanth Elango</div>
							<div class="team_member_title">Co-Founder</div>
							<p>"Lifes too short to make mistakes"</p>
							<div class="team_member_link"><a href="https://www.linkedin.com/in/nishaanth-elango/"><h2><i class="fab fa-linkedin" aria-hidden="true"></i></h2></a></div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Clients -->
<?php /*
	<div class="clients">
		<!-- Clients Slider -->

		<div class="clients_slider_container">
			<div class="owl-carousel owl-theme clients_slider">

				<!-- Slider Item -->
				<div class="owl-item clients_item">
					<div class="client_item_background trans_200">
						<img src="images/client_1.png" alt="">
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item clients_item">
					<div class="client_item_background trans_200">
						<img src="images/client_2.png" alt="">
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item clients_item">
					<div class="client_item_background trans_200">
						<img src="images/client_3.png" alt="">
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item clients_item">
					<div class="client_item_background trans_200">
						<img src="images/client_4.png" alt="">
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item clients_item">
					<div class="client_item_background trans_200">
						<img src="images/client_5.png" alt="">
					</div>
				</div>

			</div>
		</div>
	</div>
*/ ?>
	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col text-lg-center text-left">
					<div class="newsletter_content">

						<!-- Newsletter Title -->
						<div class="newsletter_title">
							<h1>Are You Ready To Get Started?</h1>
							<span>Drop us a line today and we will be in touch to discuss your needs and recommend you one of our packages.</span>
						</div>
						
						<!-- Newsletter Form -->
						<div class="newsletter_form_container">
								<div class="input-group" >
									<a style="margin:auto" href="contact"><button  id="newsletter_form_submit" type="button" class="button newsletter_submit_button trans_200" >
										Contact
									</button></a>
								</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer -->

	<?php
	getFooter();
	?>

</div>

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
<script src="js/about_custom.js"></script>
</body>

</html>
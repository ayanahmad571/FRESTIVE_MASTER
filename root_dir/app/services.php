<?php
require_once("include.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
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

<title>Frestive - Contact</title>
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
<link rel="stylesheet" type="text/css" href="styles/services_styles.css">
<link rel="stylesheet" type="text/css" href="styles/services_responsive.css">
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
			<h2>Services</h2>
			<div class="next_section_scroll">
				<div class="next_section nav_links" data-scroll-to=".service_boxes">
					<i class="fas fa-chevron-down trans_200"></i>
					<i class="fas fa-chevron-down trans_200"></i>
				</div>
			</div>
		</div>
	
	</div>

	<!-- Service Boxes -->

	<div class="service_boxes">

		<div class="container">
			<div class="row">
				<div class="col-lg-4 service_col">

					<!-- Service Item -->
					<div class="service_item">
						<h2><a href="#">Virtual Discussions</a></h2>
						<p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit mattis effic iturut magna.</p>
					</div>

					<!-- Service Item -->
					<div class="service_item">
						<h2><a href="#">Virtual Conferences</a></h2>
						<p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit mattis effic iturut magna.</p>
					</div>

				</div>

				<div class="col-lg-4 service_col">

					<!-- Service Item -->
					<div class="service_item">
						<h2><a href="#">Meet people Virtually</a></h2>
						<p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit mattis effic iturut magna.</p>
					</div>

					<!-- Service Item -->
					<div class="service_item">
						<h2><a href="#">Virtual Booths</a></h2>
						<p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit mattis effic iturut magna.</p>
					</div>

				</div>

				<div class="col-lg-4 service_col">

					<!-- Service Item -->
					<div class="service_item">
						<h2><a href="#">Programmble Schedule</a></h2>
						<p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit mattis effic iturut magna.</p>
					</div>

					<!-- Service Item -->
					<div class="service_item">
						<h2><a href="#">Live Chat and Video</a></h2>
						<p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit mattis effic iturut magna.</p>
					</div>

				</div>
			</div>
		</div>

	</div>

	<!-- Device -->

	<div class="device">
		
		<div class="container">
			<div class="row">
				
				<div class="col-lg-6 order-lg-1 order-2">
					<div class="device_content">
						<h1>The three step frestive approach</h1>

						<ul class="device_items">
							<li class="device_item clearfix">
								<span>01.</span>
								<p>Pre - Freshers. Sign up and Create an account. Design a virtual booth that matches and enhances your brand</p>
							</li>
							<li class="device_item clearfix">
								<span>02.</span>
								<p>During the Fair. Be matched and found by students according to your programs/location, and their interests</p>
							</li>
							<li class="device_item clearfix">
								<span>03.</span>
								<p>Post - Freshers. Check accumulative statistics of students that have visited your booth.</p>
							</li>
						</ul>


					</div>
				</div>

				<div class="col-lg-6 order-lg-2 order-1">
					<div class="device_image">
						<div class="device_image_background"></div>
						<div class="device_image_container d-flex flex-column justify-content-end">
							<img src="images/device.png" alt="">
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>

	<!-- Call to action 2 -->

	<div class="cta_2">
		<!-- image by: https://unsplash.com/@tentides -->
		<div class="cta_2_background" style="background-image:url(images/cta_2.png)"></div>
		<div class="container">
			<div class="row">
				
				<div class="col-lg-9">
					<div class="cta_2_content">
						<h1>What are you waiting for?</h1>
						<span>Download our detailed proposal now to get started.</span>
					</div>
				</div>

				<div class="col-lg-3">
					<div class="cta_2_button_container">
						<div class="button cta_2_button">
							<a href='downloads/Frestive Proposal Master.pdf'>download</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Image Boxes -->

	<div class="image_boxes">
		
		<div class="container">
			<div class="row">
				
				<!-- Image Box -->
				<div class="col-lg-4 image_box_col">
					<div class="card trans_300">
						<img class="card-img-top" src="images/image_box_1.jpg" alt="https://unsplash.com/@heysupersimi">
						<div class="card-body">
							<h3 class="card-title">Customizable Booths</h3>
							<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vitae enim enim. Sed nec dignissim purus.</p>
						</div>
					</div>
				</div>

				<!-- Image Box -->
				<div class="col-lg-4 image_box_col">
					<div class="card trans_300">
						<img class="card-img-top" src="images/image_box_2.jpg" alt="https://unsplash.com/@gabrielssantiago">
						<div class="card-body">
							<h3 class="card-title">Share Information</h3>
							<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vitae enim enim. Sed nec dignissim purus.</p>
						</div>
					</div>
				</div>

				<!-- Image Box -->
				<div class="col-lg-4 image_box_col">
					<div class="card trans_300">
						<img class="card-img-top" src="images/image_box_3.jpg" alt="https://unsplash.com/@anthonydelanoix">
						<div class="card-body">
							<h3 class="card-title">Connect with Students</h3>
							<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vitae enim enim. Sed nec dignissim purus.</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

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
<script src="js/services_custom.js"></script>
</body>

</html>
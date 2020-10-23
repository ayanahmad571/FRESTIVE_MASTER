<?php
require_once("include.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
getHead("Frestive - Home");
?>
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
			<div class="home_background prlx" style="background-image:url(images/slider_background.jpg)"></div>
		</div>
		
		<!-- Hero Slider -->
		<div class="hero_slider_container">
			
			<!-- Slider -->
			<div class="owl-carousel owl-theme hero_slider">

				<!-- Slider Item -->
				<div class="owl-item hero_slider_item item_1 d-flex flex-column align-items-center justify-content-center">
					<span></span>
					<span></span>
					<span class="boldOS" style="font-size:6em">FRESTIVE</span>
					<span style="font-size:3em; padding-top:10px; padding-left:20vw; padding-right:20vw; text-align:center">Build your virtual presence with our bespoke event platforms</span>
				</div>

				<!-- Slider Item -->
				<div class="owl-item hero_slider_item item_1 d-flex flex-column align-items-center justify-content-center">
					<span></span>
					<span></span>
					<span style="font-size:6vw">For universities!</span>
					<span>Universities looking to host the Freshers Fair online</span>
				</div>

				<!-- Slider Item -->
				<div class="owl-item hero_slider_item item_1 d-flex flex-column align-items-center justify-content-center">
					<span></span>
					<span></span>
					<span style="font-size:6vw">Multi-purpose!</span>
					<span>We are here to tailor the experience to your needs</span>
				</div>

			</div>
			
			<!-- Hero Slider Navigation Left -->
			<div class="hero_slider_nav hero_slider_nav_left">
				<div class="hero_slider_prev d-flex flex-column align-items-center justify-content-center trans_200">
					<i class="fas fa-chevron-left trans_200"></i>
				</div>
			</div>

			<!-- Hero Slider Navigation Right -->
			<div class="hero_slider_nav hero_slider_nav_right">
				<div class="hero_slider_next d-flex flex-column align-items-center justify-content-center trans_200">
					<i class="fas fa-chevron-right trans_200"></i>
				</div>
			</div>

		</div>

		<div class="next_section_scroll">
			<div class="next_section nav_links" data-scroll-to=".icon_boxes">
				<i class="fas fa-chevron-down trans_200"></i>
				<i class="fas fa-chevron-down trans_200"></i>
			</div>
		</div>
			
	</div>

	<!-- Icon Boxes -->

	<div class="icon_boxes">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="icon_box_title">
						<h1>Freshers on the Cloud like never Before</h1>
					</div>
					<div class="button icon_box_button trans_200">
						<a href="#" class="trans_200">Contact Us</a>
					</div>
				</div>

				<div class="col-lg-4 icon_box_col">

					<!-- Icon Box Item -->
					<div class="icon_box_item">
						<h2>Great team</h2>
						<p>We as students understand the importance of Freshers Fair. We deliver an authentic experience of the fair to students’ homes.</p>
					</div>

					<!-- Icon Box Item -->
					<div class="icon_box_item">
						<h2>GDPR</h2>
						<p>We have strict data protection and compliance measures in place to make sure your data is safe. Sensitive information is stored in an encrypted format..</p>
					</div>

				</div>

				<div class="col-lg-4 icon_box_col">

					<!-- Icon Box Item -->
					<div class="icon_box_item">
						<h2>Customisation</h2>
						<p>We offer a wide range of customisation options on the platform. We cater to your needs, and will tailor to your needs to maximise your ROI.</p>
					</div>

					<!-- Icon Box Item -->
					<div class="icon_box_item">
						<h2>Help</h2>
						<p>Our helpful team is available throughout the week to ensure you are <strong>well</strong> taken care of.</p>
					</div>
					
				</div>
			</div>
		</div>
	</div>


	<!-- Services -->

	<div class="services">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title">
						<h1>Our Approach to Virtual Events</h1>
						<span>Highlights of our platform</span>
					</div>
				</div>
			</div>
		</div>

		<div class="h_slider_container services_slider_container">
			<div class="service_slider_outer">
				<!-- Services Slider -->
				<div class="owl-carousel owl-theme services_slider">
                <?php
				$tabHolder = array(
				array("Dashboard","&#xe066;","Meet friends, Grab a deal, Join Booths. A one stop shop for all freshers Objects."),
				array("Discussion Rooms","&#x021;","Booths may start a discussion thread which freshers may join on. They may share their views and hear out others (Moderated Chat)"),
				array("Plenary","&#xe01b;","Think of this as a live stage. The stage can be in use or not. Up to you how you want to use it."),
				array("Networking","&#xe009;","You have 5 minuted to chat with a student, after which we will connect you to a new student."),
				array("Booths","&#xe009;","A booth, but virtual. This is what a freshers would see when they choose to come on your page. Make it as captivating as possible!!")
				);
				
				foreach($tabHolder as $tab){
					?>
                    
                    
					<!-- Services Slider Item-->
					<div class="owl-item services_item">
						<div class="services_item_inner">
							<div class="service_item_content">
								<div class="service_item_title">
									<div class="service_item_icon">
										<div data-icon="<?php echo $tab[1] ?>" class="icon"></div>
									</div>
									<h2><?php echo $tab[0] ?></h2>
								</div>
								<p><?php echo $tab[2] ?></p>
							</div>
						</div>
					</div>
                    <?php
				}
				?>
					




				</div>
			
				<div class="services_slider_nav services_slider_nav_left"><i class="fas fa-chevron-left trans_200"></i></div>
				<div class="services_slider_nav services_slider_nav_right"><i class="fas fa-chevron-right trans_200"></i></div>

			</div>
		</div>
	</div>

	<!-- Features -->

	<div class="features">
		<div class="container">
			<div class="row">
				<div class="col text-center">

					<div class="section_title">
						<h1>Delivery Timeline</h1>
					</div>

				</div>
			</div>
			<div class="row features_row">

				<div class="col-md-4 text-lg-right features_col order-md-1 order-2">
					
					<!-- Features Item-->
					<div class="features_item">
						<h2>1. Demo</h2>
						<p>Team Frestive will walk you through the platform and answer any questions that you may come across.</p>
					</div>

					<!-- Features Item-->
					<div class="features_item">
						<h2>2. Documents</h2>
						<p>Signing the Software as a Service contract with our team to finalise discussions along with discussing platform changes if any.</p>
					</div>

					<!-- Features Item-->
					<div class="features_item">
						<h2>3. Payments</h2>
						<p>Deposit payment to be made within 7 days of signing the contract to facilitate platform development.</p>
					</div>

				</div>

				<div class="col-md-4 d-flex flex-column align-items-center order-md-2 order-1">
					<div class="features_image">
						<img style="width:100%" src="images/web_mockup.png" alt="">
					</div>
					<div class="button features_button trans_200">
						<a href="contact" class="trans_200">Contact</a>
					</div>
				</div>

				<div class="col-md-4 features_col order-md-3 order-3">
					
					<!-- Features Item-->
					<div class="features_item">
						<h2>4. Logins</h2>
						<p>We will be providing you with Demo Credentials for you to get comfortable with the product and inform us of changes (if any).</p>
					</div>

					<!-- Features Item-->
					<div class="features_item">
						<h2>5. Delivery within 1 week*</h2>
						<p>From the date of establishing changes to final delivery, we would require around 2-6 weeks *(subject to availability during busy periods) to deliver.</p>
					</div>

					<!-- Features Item-->
					<div class="features_item">
						<h2>6. Support</h2>
						<p>Team Frestive will be working closely with you before and after product delivery to ensure that all your needs are met.</p>
					</div>

					<div class="button features_button_2 trans_200">
						<a href="#" class="trans_200">discover more</a>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Call to action -->

	<div class="cta">
		
		<div class="container">
			<div class="row">
				<div class="col-lg-5 order-lg-1 order-2">
					<div class="cta_content">
						<h1>Why Us?</h1>
						<p style="text-align:justify">We believe the critical factors for delivering a successful project to you will include among other things, a strong core delivery team, knowledge and familiarity.<br> 
We aim to provide professional yet economically viable online event platforms. With us, you will be able to engage your attendees with an authentic and immersive virtual experience.</p>
					</div>
				</div>

				<div class="col-lg-6 offset-lg-1 order-lg-2 order-1">
					<div class="cta_image d-flex flex-column justify-content-end">
						<img src="images/shop.png" alt="Virtual Booth">
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Text Line -->

	<div class="text_line">
		<div class="container">
			<div class="row">

				<div class="col-lg-5 text-lg-right text-center">
					<div class="text_line_image">
						<img src="images/web_dev.png" alt="">
					</div>
				</div>

				<div class="col-lg-5 offset-lg-2">
					<div class="text_line_content">
						<h1>How was Frestive Founded?</h1>
						<p>Frestive was founded amidst the coronavirus pandemic by three entrepreneurs, who are eager to bring their fellow students together during these trying times. The solution is virtual event platform that produces an authentic experience of attending freshers fair from the safety of students' homes.</p>
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

<?php
getEnd();
?>
</body>

</html>
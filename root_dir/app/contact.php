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
<link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
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
			<div class="home_background prlx" style="background-image:url(images/blog_background.jpg)"></div>
		</div>
		
		<div class="home_title">
			<h2>Contact</h2>
			<div class="next_section_scroll">
				<div class="next_section nav_links" data-scroll-to=".contact">
					<i class="fas fa-chevron-down trans_200"></i>
					<i class="fas fa-chevron-down trans_200"></i>
				</div>
			</div>
		</div>
	
	</div>

	<!-- Contact -->

	<div class="contact">
		
		<div class="container">
			
			<!-- Google Map Container -->


			<div class="row contact_row">
<div class="col-lg-8">
					
					<!-- Reply -->

					<div class="reply">
						
						<div class="reply_title">Have a question for us? Drop it below and we will get back within a day (unless our intern misses your submission)</div>
						<div class="reply_form_container">
							
							<!-- Reply Form -->

							<form id="my-form"
  action="https://formspree.io/mwkrrzed"
  method="POST">
								<div>
                                <p id="my-form-status" style="color: green;font-size: 1.5em;"> </p>
                                <p id="my-form-status-error" style="color: green;font-size: 1.5em;"> </p>
                                </div>
                                <div>
<input name="name" id="reply_form_name" class="input_field reply_form_name" type="text" placeholder="Name" required="required" data-error="Name is required.">
<input name="email" id="reply_form_email" class="input_field reply_form_email" type="email" placeholder="E-mail" required="required" data-error="Valid email is required.">
<input name="subject" id="reply_form_subject" class="input_field reply_form_subject" type="text" placeholder="Subject" required="required" data-error="Subject is required.">
<textarea id="reply_form_message" class="text_field reply_form_message" name="message"  placeholder="Message" rows="4" required data-error="Please, write us a message."></textarea>
								</div>
								<div>
									<button id="reply_form_submit" type="submit" class="reply_submit_btn trans_300" value="Submit">
										send reply
									</button>
								</div>

							</form>

						</div>
					</div>

				</div>

				<div class="col-lg-4">
					
					<!-- Contact Info -->

					<div class="contact_info">

						<div class="contact_title">Contact info</div>
						
						<div class="contact_info_container">

							<div class="logo contact_logo">
								<a href="#">Fres<span>tive</span></a>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vitae enim enim. Sed nec dignissim purus.</p>

							<div class="address_container clearfix">
								<div class="contact_info_icon">i</div>
								<div class="contact_info_content">
									<ul>
										<li class="address">Mayfair, London, UK</li>
										<li class="phone">+971-55-952-3302</li>
										<li class="email">frestive@studentessentials.co</li>
									</ul>									
								</div>
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
<script src="plugins/colorbox/jquery.colorbox-min.js"></script>
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="js/CustomGoogleMapMarker.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/contact_custom.js"></script>

<script>
  window.addEventListener("DOMContentLoaded", function() {

    // get the form elements defined in your form HTML above
    
    var form = document.getElementById("my-form");
    var button = document.getElementById("reply_form_submit");
    var status = document.getElementById("my-form-status");
    var status_fail = document.getElementById("my-form-status-error");

    // Success and Error functions for after the form is submitted
    
    function success() {
      form.reset();
      button.style = "display: none ";
      status.status_fail = "";
      status.innerHTML = "Hang tight, The Frestive team will respond to your query ASAP.";
    }

    function error() {
      status.innerHTML = "";
      status.status_fail = "Oops! There was a problem.";
    }

    // handle the form submission event

    form.addEventListener("submit", function(ev) {
      ev.preventDefault();
      var data = new FormData(form);
      ajax(form.method, form.action, data, success, error);
    });
  });
  
  // helper function for sending an AJAX request

  function ajax(method, url, data, success, error) {
    var xhr = new XMLHttpRequest();
    xhr.open(method, url);
    xhr.setRequestHeader("Accept", "application/json");
    xhr.onreadystatechange = function() {
      if (xhr.readyState !== XMLHttpRequest.DONE) return;
      if (xhr.status === 200) {
        success(xhr.response, xhr.responseType);
      } else {
        error(xhr.status, xhr.response, xhr.responseType);
      }
    };
    xhr.send(data);
  }
</script>

</body>

</html>
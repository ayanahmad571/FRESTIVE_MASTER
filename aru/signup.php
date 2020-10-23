<?php
require_once("server_fundamentals/Settings.php");
require_once("server_fundamentals/CookieController.php");
sec_session_start();
if(isset($_SESSION[SESSION_CONTROLLER_NAME]) && is_numeric($_SESSION[SESSION_CONTROLLER_NAME])){
	header("Location: home");
	die();
	
}
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Virtual Freshers Fairs by <?php echo BRANDING_COMPANY_NAME ?> for <?php echo UNI_NAME ?> - Register</title>
  
  <!-- Favicon -->
  <link rel="icon" 
      type="image/png" 
      href="assets/img/frestive/frestive_short.png">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" >
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
</head>
<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="assets/img/FRESTIVE.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>
<style>
.successTick{
	color:green;
	font-size:10em;
	border-radius:0.4em;
}
</style>
              <div id="card-cont" class="card-body">
                <form id="loginForm" method="POST" action="server_fundamentals/RegisterController">
                <p>
                Note: Only <strong>@kcl.ac.uk</strong> emails are automatically approved, for emails from other domains, the Student Union will approve of the emails.
                </p>
                  	<div id="loginFail" class="mb-4" style="background-color:rgba(255,195,196,0.3); color:rgba(255,16,16,1.00); padding:10px; border-radius:8px;">
                    	
                    </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="frist_name">First Name</label>
                      <input id="frist_name" type="text" class="form-control" name="first_name" autofocus required>
                    </div>
                    <div class="form-group col-6">
                      <label for="last_name">Last Name</label>
                      <input id="last_name" type="text" class="form-control" name="last_name" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" required>
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" required>
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="password_confirm" required>
                    </div>
                  </div>

                  <div class="form-divider">
                    About You
                  </div>
                  <div style="display:none" class="row">
                    <div class="form-group col-12">
                      <label>User Type</label>
                      <select class="form-control selectric" name="user_type">
                        <option value="2">Student</option>
                        <option value="3">Virtual Booth Owner</option>
                      </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                      <label>Age</label>
                      <input type="number" class="form-control" required min="15" max="200" name="age">
                    </div>
                    <div class="form-group col-6">
                      <label>Gender</label>
                      <select class="form-control selectric" name="gender" required>
                        <option value="1" selected>Male</option>
                        <option value="2">Female</option>
                        <option value="3">Other</option>
                      </select>
                    </div>
              </div>

                  <div class="form-group">
                    <label for="intr">Interests</label>
                    <input id="intr" type="text" class="form-control" name="interests" required placeholder="Hockey, Basketball, Tech, IT ....">
                    <div class="invalid-feedback">
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input required type="checkbox" name="agree" class="custom-control-input" id="agree" value="1">
                      <label class="custom-control-label" for="agree">I agree with the <a target="_blank" href="terms-of-service">terms of service</a></label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              <div class="mt-3 mb-1 text-left">
                Already have an account? <a href="login">Sign In</a>
              </div>
            <div class="text-center mt-2 text-small">
              Powered by Student Essential and Aethn Aega, Made by Stisla.
              <div class="mt-2">
                <a href="#">Privacy Policy</a>
                <div class="bullet"></div>
                <a href="#">Terms of Service</a>
              </div>
            </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="assets/js/jquery.min.js" ></script>
  <script src="assets/js/bootstrap.min.js"></script>

  <!-- Page Specific JS File -->
<script>
$(document).ready(function (e) {

	$("#loginFail").hide();

    $('#loginForm').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: $(this).attr('action'),
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
				if(data.trim() == "ok"){
					$("#loginForm").fadeOut();
						$("#card-cont").html(
					"<div class='row'>" + 
						" <div class='text-center'>" + 
							"<h1 class='successTick'><i class='fa fa-check'></i></h1>" +
							"<h6>Please verify your email. After verification, the account will be sent to the <?php echo UNI_NAME_SU ?> Student Union for Approval.</h6>" +
							"<a href='login'><button class='btn btn-warning'>Go to Home Page..</button></a>" +					
						"</div>" +
					"</div>");
				}else{
					$("#loginFail").html(data);
					$("#loginFail").fadeIn();
					$('html,body').animate({
						scrollTop: $("#app").offset().top
					}, 'slow');
				}
            },
            error: function(data){
                alert("Contact Admin.");
            }
        });
    }));

});
    </script> 
</body>
</html>

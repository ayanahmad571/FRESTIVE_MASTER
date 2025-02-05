<?php

require_once("server_fundamentals/SessionHandler.php");
if(!isset($_GET['id'])){
	header('Location: societies');
	die();
}else{
	if(!ctype_alnum($_GET['id'])){
		header('Location: societies');
		die();
	}
}

$getSoc = mysqlSelect("SELECT * FROM `virtual_booths` where
vb_vbt_id = 1 and vb_valid =1 and vb_paid =1
and md5(concat('SALTINGSALTINGEHEIUNOIU*****siufniue',vb_id)) = '".$_GET['id']."'");

if(!is_array($getSoc)){
	header('Location: societies');
	die();
}
$pageSoc = $getSoc[0];
getHead($pageSoc['vb_name']." Virtual Booth");
?>


<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      
      <?php
	  	getTopBar();
	  	getNavbar($USER_ARRAY['type_mod_id']);
	  ?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Virtual Booths - <?php echo $pageSoc['vb_name'] ?></h1>
          </div>
          
<div class="row">
	<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
    	        <div align="center" class="card profile-widget mt-0 " style="padding:20px; ">
                	<div class="row">
                    	<div class=" col-md-8 offset-md-2 col-6 offset-3">
							<img class="img-fluid mt-4" style="margin:auto" src="<?php echo $pageSoc['vb_img_src'] ?>" />
                        </div>
                    </div>
                <h3 class="mt-4"><?php echo $pageSoc['vb_name'] ?></h3>
                <br>
            	<h6><?php echo $pageSoc['vb_tagline'] ?></h6>
                
                </div>
    </div>
	<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
    	        <div class="card profile-widget mt-0" >
                  <div class="card-header">
                    <h4>Membership Plans (Annual)</h4>
                  </div>
                  <div style="padding:30px">
                  <table class="table table-bordered table-md">
                	<?php if(!is_null($pageSoc['vb_plan_1'])){
						echo '<tr><td>'.$pageSoc['vb_plan_1'].'</td></tr>';
					}if(!is_null($pageSoc['vb_plan_2'])){
						echo '<tr><td>'.$pageSoc['vb_plan_2'].'</td></tr>';
					}if(!is_null($pageSoc['vb_plan_3'])){
						echo '<tr><td>'.$pageSoc['vb_plan_3'].'</td></tr>';
					}if(!is_null($pageSoc['vb_plan_4'])){
						echo '<tr><td>'.$pageSoc['vb_plan_4'].'</td></tr>';
					}
					
					?>
                      </table>
                      </div>
                </div>
    </div>


	<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
    	        <div class="card profile-widget mt-0" style="padding:20px">
                  <table class="table table-bordered table-md">
						<tr>
                        	<th colspan="1">Name</th>
                            <th colspan="2">Action</th>
                        </tr>
                        <tr>
                        	<td colspan="1">Mailing List</td>
                            <td colspan="2">
                            	<form>
                                	<input type="hidden" value="<?php echo md5("AAAAAJWFOIJFIOJWF", $pageSoc['vb_id']) ?>" name="mail_list"/>
                                    	<button  style="width:100%;box-shadow:none !important; border:none !important;" class="btn btn-lg btn-success">
                                        Join 
                                        </button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                        	<td colspan="1">Society</td>
                            <td colspan="2">
                            	<form>
                                	<input type="hidden" value="<?php echo md5("AAAAAJWFOIJFIOJWF", $pageSoc['vb_id']) ?>" name="soc_list"/>
                                    	<button  style="width:100%;box-shadow:none !important; border:none !important;" class="btn btn-lg btn-success">
                                        Join 
                                        </button>
                                </form>
                            </td>
                        </tr>
                  </table>
                </div>
    </div>

	<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
    	        <div class="card profile-widget mt-0">
                  <div class="card-header">
                    <h4>Connect with Us</h4>
                  </div>
                  	<div class="row" style="padding:20px">

                	<?php 
					if(!is_null($pageSoc['vb_facebook'])){
						echo '
						<div class="col-6 mb-3 text-center">
							<a href="'.$pageSoc['vb_facebook'].'"><button style="width:100%;box-shadow:none !important; border:none !important;background-color: #0066ff; " class="btn btn-info text-center">Facebook</button></a>
						</div>
						';
					}
					if(!is_null($pageSoc['vb_instagram'])){
						echo '
						<div class="col-6 mb-3 text-center">
							<a href="'.$pageSoc['vb_instagram'].'"><button style="width:100%;box-shadow:none !important; border:none !important;background-color: #ff6666; " class="btn btn-info text-center">Instagram</button></a>
						</div>
						';
					}
					if(!is_null($pageSoc['vb_twitter'])){
						echo '
						<div class="col-6 mb-3 text-center">
							<a href="'.$pageSoc['vb_twitter'].'"><button style="width:100%;box-shadow:none !important; border:none !important;" class="btn btn-info text-center">Twitter</button></a>
						</div>
						';
					}
					if(!is_null($pageSoc['vb_url'])){
						echo '
						<div class="col-6 mb-3 text-center">
							<a href="'.$pageSoc['vb_url'].'"><button style="width:100%;box-shadow:none !important; border:none !important;color: black" class="btn btn-warning text-center">Website</button></a>
						</div>
						';
					}
					if(!is_null($pageSoc['vb_youtube_live'])){
						echo '
						<div class="col-6 mb-3 text-center">
							<a href="'.$pageSoc['vb_youtube_live'].'"><button style="width:100%;box-shadow:none !important; border:none !important;background-color: #ff0000; " class="btn btn-info text-center">Youtube</button></a>
						</div>
						';
					}
					if(!is_null($pageSoc['vb_zoom_link'])){
						echo '
						<div class="col-6 mb-3 text-center">
							<a href="'.$pageSoc['vb_zoom_link'].'"><button style="width:100%;box-shadow:none !important; border:none !important;" class="btn btn-info text-center">Zoom</button></a>
						</div>
						';
					}
					?>
                    </div>
                </div>
    </div>
</div>
<div class="row">
    <div class="col-12 ">
        <div class="card">
          <div class="card-header">
            <h4>About the Society</h4>
          </div>
          <div class="card-body">
            <p class="profile-widget-description"><?php echo  $pageSoc['vb_desc'] ?></p>
          </div>
        </div>
    </div>
<?php 
if(!is_null($pageSoc['vb_youtube_live'])){
	$url = $pageSoc['vb_youtube_live'];
parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
  
  // Output: C4kxS1ksqtw
  ?>
<div class="col-12 col-lg-9">
    <div class="card">
        <div class="card-header">
            <h4>Youtube Live</h4>
        </div>
        
        <div class="card-body">
            <iframe style=" min-width:100%;" height="600px"src="https://www.youtube.com/embed/<?php echo $my_array_of_vars['v'];   ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        
        </div>
        
    </div>
</div>

<div class="col-12 col-lg-3">
    <div class="card">
        <div class="card-header">
	        <h4>Youtube Live Chat</h4>
        </div>
        
        <div class="card-body">
    	    <iframe style=" min-width:100%;" height="600px"src="https://www.youtube.com/live_chat?v=<?php echo $my_array_of_vars['v'];   ?>&amp;embed_domain=<?php echo $_SERVER['HTTP_HOST'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>

</div>

  
  <?php
}
?>

</div>

           
        </section>
        
        
      </div><!-- Main Content  -->  
      
      <?php
	  getFooter(); 
	  ?>
      
    </div><!-- Main Wrapper  -->
  </div><!-- App -->
<?php

getScripts();
?>
</body>
</html>

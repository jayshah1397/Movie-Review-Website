<?php
ini_set('max_execution_time', 90);
session_start();



$response=0;
		if($response==0)
		{
			$url="https://api.themoviedb.org/3/tv/popular?api_key=90484bf0e699fbef034e8e0bfe5dbddd&language=en-US&page=1";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			// Set so curl_exec returns the result instead of outputting it.
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// Get the response and close the channel.
			$response = curl_exec($ch);
			$jsonresponse = json_decode($response, true);

			//print_r($jsonresponse);
			curl_close($ch);
		}	
		$responseTv=0;
		if($responseTv==0)
		{
			$urlTv="https://api.themoviedb.org/3/discover/tv?api_key=90484bf0e699fbef034e8e0bfe5dbddd&language=en-US&page=1";
			$chTv = curl_init();
			curl_setopt($chTv, CURLOPT_URL, $urlTv);
			// Set so curl_exec returns the result instead of outputting it.
			curl_setopt($chTv, CURLOPT_RETURNTRANSFER, true);
			// Get the response and close the channel.
			$responseTv = curl_exec($chTv);
			$jsonresponseTv = json_decode($responseTv, true);

			//print_r($jsonresponseTv);
			curl_close($chTv);
		}	
		
			
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>One Movies an Entertainment Category Flat Bootstrap Responsive Website Template | TV- Series :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="One Movies Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/single.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/contactstyle.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/faqstyle.css" type="text/css" media="all" />
<link href="css/medile.css" rel='stylesheet' type='text/css' />
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font-awesome.min.css" />
<!-- //font-awesome icons -->
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="all">
<script src="js/owl.carousel.js"></script>
<script>
	$(document).ready(function() { 
		$("#owl-demo").owlCarousel({
	 
		  autoPlay: 3000, //Set AutoPlay to 3 seconds
	 
		  items : 5,
		  itemsDesktop : [640,5],
		  itemsDesktopSmall : [414,4]
	 
		});
	 
	}); 
</script>
  <script src="https://www.w3schools.com/lib/w3.js"></script> 
</head>
	
<body>
	<div w3-include-html="navbar.php">
	<h1>While_Loading</h1>
</div>


	<div class="faq">
<!-- general -->
	<div class="general_agileits_genres">
		<h4 class="latest-text w3_latest_text">Featured Tv Shows :</h4>
		<div class="container">
            <div class="agileits-single-top">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li class="active">TV - Series</li>
				</ol>
			</div>
		</div>
		<div class="container">
			<div class="w3_agile_featured_movies">
							<?php
								foreach ($jsonresponseTv["results"] as $r ) {


										   	if($r['poster_path']==null||$r['poster_path']=='')
									{
										$src = "images/notFound.jpg" ;										
									}
									else
									{
										$src = "http://image.tmdb.org/t/p/w1280".$r["poster_path"];
									}

			echo  "	<div class=\"col-md-2 w3l-movie-gride-agile\" style=\"height:300px\">		

									<a href=\"single.php?t=tv&id=".$r["id"]."\" class=\"hvr-shutter-out-horizontal\"><img src=\"".$src."\"class=\"img-responsive\" alt=\" \" title=\"album-name\" class=\"img-responsive\"style=\"height:250px !important\"/>
									<div class=\"w3l-action-icon\"><i class=\"fa fa-play-circle\" aria-hidden=\"true\"></i></div>
								</a>
									<div class=\"mid-1 agileits_w3layouts_mid_1_home\">
										<div class=\"w3l-movie-text\">
											<h6><a href=\"single.php?t=tv&id=".$r["id"]."\">".$r['original_name']."</a></h6>							
										</div>
										<div class=\"mid-2 agile_mid_2_home\">
											<p>".$r['first_air_date']."</p>
									
								
										 <div class=\"clearfix\"></div>
										</div>
									</div>
						
		
							<div class=\"ribben\">
								<p>NEW</p>
							</div>
						</div>
					";
				}
				?>		</div>

						</div>	

			
	</div>
</div>
<!--body wrapper start-->
	<div class="review-slider">
		 <h4 class="latest-text">TV - Series Reviews</h4>
			   <div class="container">
				<div class="w3_agile_banner_bottom_grid">
					<div id="owl-demo" class="owl-carousel owl-theme">
						<?php
								foreach ($jsonresponse["results"] as $r ) {


										   	if($r['poster_path']==null||$r['poster_path']=='')
									{
										$src = "images/notFound.jpg" ;										
									}
									else
									{
										$src = "http://image.tmdb.org/t/p/w1280".$r["poster_path"];
									}
			echo  "	<div class=\"item\">
						<div class=\"w3l-movie-gride-agile w3l-movie-gride-agile1\">
							

									<a href=\"single.php?t=tv&id=".$r["id"]."\" class=\"hvr-shutter-out-horizontal\"><img src=\"".$src."\"alt=\" \" title=\"album-name\" class=\"img-responsive\"/>
									<div class=\"w3l-action-icon\"><i class=\"fa fa-play-circle\" aria-hidden=\"true\"></i></div>
								</a>
									<div class=\"mid-1 agileits_w3layouts_mid_1_home\">
										<div class=\"w3l-movie-text\">
											<h6><a href=\"single.php?t=tv&id=".$r["id"]."\">".$r['original_name']."</a></h6>							
										</div>
										<div class=\"mid-2 agile_mid_2_home\">
											<p>".$r['first_air_date']."</p>
									
								
										 <div class=\"clearfix\"></div>
									</div>
							</div>
						
		
							<div class=\"ribben\">
								<p>NEW</p>
							</div>
						</div>
					</div>";
				}
				?>
						
						</div>
					</div>
				</div>
		<!--body wrapper end-->
	</div>	
<!-- //general -->
	</div>
	</div>
<!-- footer -->
	<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="w3ls_footer_grid">
				<div class="col-md-6 w3ls_footer_grid_left">
					<div class="w3ls_footer_grid_left1">
						<h2>Subscribe to us</h2>
						<div class="w3ls_footer_grid_left1_pos">
							<form action="./php/subscribe.php" method="post">
								<input type="email" name="email" placeholder="Your email..." >
								<input type="submit" value="Send">
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-6 w3ls_footer_grid_right">
					<a href="index.html"><h2>One<span>Movies</span></h2></a>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-5 w3ls_footer_grid1_left">
				<p>&copy; 2017 One Movies. All rights reserved | Design by <a href="">BDJ</a></p>
			</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //footer -->
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- //Bootstrap Core JavaScript -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
	<script>
w3.includeHTML();

function test() {
		
		$('#modal-header').html('Sign-Up');
		
		  // Switches the Icon
		  $('#iconPencil').toggleClass('fa-pencil');
		  // Switches the forms  
		  $('.form').animate({
			height: "toggle",
			'padding-top': 'toggle',
			'padding-bottom': 'toggle',
			opacity: "toggle"
		  }, "slow");
	}
</script>
<?php
	
	echo "<script type='text/javascript'>
if(".$_SESSION['sFlag']."==1)
{
	alert(\"Thank You For Subscribing\");
}
else if(".$_SESSION['sFlag']."==2)
{
	alert(\"You have already Subscribed\");
}

</script>";
$_SESSION['sFlag']=0;
	
 ?>
<!-- //here ends scrolling icon -->
</body>
</html>
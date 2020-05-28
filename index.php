
<?php
ini_set('max_execution_time', 90);
 session_start(); 
 if(!isset($_SESSION['sFlag']))
 {
 	$_SESSION['sFlag']=0;
 }


//http://image.tmdb.org/t/p/mVr0UiqyltcfqxbAUcLl9zWL8ah.jpg
		$response=0;
		if($response==0)
		{
			$url="http://api.themoviedb.org/3/movie/upcoming?api_key=90484bf0e699fbef034e8e0bfe5dbddd";
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
		$responseCarousel=0;
		if ($responseCarousel==0) {
				$urlCarousel="https://api.themoviedb.org/3/movie/now_playing?api_key=90484bf0e699fbef034e8e0bfe5dbddd&language=en-US&page=1";
				$chCarousel = curl_init();
				curl_setopt($chCarousel, CURLOPT_URL, $urlCarousel);
				curl_setopt($chCarousel, CURLOPT_RETURNTRANSFER, true);
				$responseCarousel = curl_exec($chCarousel);
			$jsonresponseCarousel = json_decode($responseCarousel, true);

			//print_r($jsonresponseCarousel);
			curl_close($chCarousel);
		}
		$responseHome=0;
		if($responseHome==0)
		{
			$urlHome="https://api.themoviedb.org/3/movie/popular?api_key=90484bf0e699fbef034e8e0bfe5dbddd&language=en-US&page=1";
			$chHome = curl_init();
			curl_setopt($chHome, CURLOPT_URL, $urlHome);
			// Set so curl_exec returns the result instead of outputting it.
			curl_setopt($chHome, CURLOPT_RETURNTRANSFER, true);
			// Get the response and close the channel.
			$responseHome = curl_exec($chHome);
			$jsonresponseHome = json_decode($responseHome, true);

			//print_r($jsonresponseHome);
			curl_close($chHome);
		}	
		$responseRating=0;
		if($responseRating==0)
		{
			$urlRating="https://api.themoviedb.org/3/movie/top_rated?api_key=90484bf0e699fbef034e8e0bfe5dbddd&language=en-US&page=1";
			$chRating = curl_init();
			curl_setopt($chRating, CURLOPT_URL, $urlRating);
			// Set so curl_exec returns the result instead of outputting it.
			curl_setopt($chRating, CURLOPT_RETURNTRANSFER, true);
			// Get the response and close the channel.
			$responseRating = curl_exec($chRating);
			$jsonresponseRating = json_decode($responseRating, true);

			//print_r($jsonresponseRating);
			curl_close($chRating);
		}	
		$responseImdb=0;
		if($responseImdb==0)
		{
			$urlImdb="https://api.themoviedb.org/3/discover/movie?api_key=90484bf0e699fbef034e8e0bfe5dbddd&certification_country=US&certification=R&sort_by=revenue.desc";
			$chImdb = curl_init();
			curl_setopt($chImdb, CURLOPT_URL, $urlImdb);
			// Set so curl_exec returns the result instead of outputting it.
			curl_setopt($chImdb, CURLOPT_RETURNTRANSFER, true);
			// Get the response and close the channel.
			$responseImdb = curl_exec($chImdb);
			$jsonresponseImdb = json_decode($responseImdb, true);

			//print_r($jsonresponseImdb);
			curl_close($chImdb);
		}	


	
// $_SESSION['Username']=null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>One Movies an Entertainment Portal | Home </title>
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
<link rel="stylesheet" href="css/contactstyle.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/faqstyle.css" type="text/css" media="all" />
<link href="css/single.css" rel='stylesheet' type='text/css' />
<link href="css/medile.css" rel='stylesheet' type='text/css' />
<!-- banner-slider -->
<link href="css/jquery.slidey.min.css" rel="stylesheet">
<!-- //banner-slider -->
<!-- pop-up -->
<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<!-- //pop-up -->
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font-awesome.min.css" />
<!-- //font-awesome icons -->
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- banner-bottom-plugin -->
<link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="all">
<script src="js/owl.carousel.js"></script>
<script>
	$(document).ready(function() { 
		$("#owl-demo").owlCarousel({
	 
		  autoPlay: 3000, //Set AutoPlay to 3 seconds
	 
		  items : 5,
		  itemsDesktop : [640,4],
		  itemsDesktopSmall : [414,3]
	 
		});
	 
	}); 
</script> 
<!-- //banner-bottom-plugin -->
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
<script src="https://www.w3schools.com/lib/w3.js"></script>

</head>
	
<body>

<div w3-include-html="navbar.php">
	<div class="loader">
		Loading (^_-)
	</div>

</div>



<!-- banner -->
	<div id="slidey" style="display:none;">
		<ul>
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
					echo "<li ><div style=\"height:300px\"><img src=\"".$src."\" alt=\" \" style=\"height:250px !important\"><p class='title'>".$r["title"]."</p><p class='description'>".$r[overview]."</p></div></li>";
				}
			?>
		</ul>   	
    </div>
    <script src="js/jquery.slidey.js"></script>
    <script src="js/jquery.dotdotdot.min.js"></script>
	   <script type="text/javascript">
			$("#slidey").slidey({
				interval: 8000,
				listCount: 5,
				autoplay: false,
				showList: true
			});
			$(".slidey-list-description").dotdotdot();
		</script>
<!-- //banner -->
<!-- banner-bottom -->
	<div class="banner-bottom">
		<div class="container">
			<div class="w3_agile_banner_bottom_grid">
				<div id="owl-demo" class="owl-carousel owl-theme">
					<?php
								foreach ($jsonresponseCarousel["results"] as $r ) {
			echo  "	<div class=\"item\">
						<div class=\"w3l-movie-gride-agile w3l-movie-gride-agile1\" style=\"height:300px\">
							

									<a href=\"single.php?t=movie&id=".$r["id"]."\" class=\"hvr-shutter-out-horizontal\"><img src=\"http://image.tmdb.org/t/p/w1280".$r["poster_path"]."\"alt=\" \" title=\"album-name\" class=\"img-responsive\"style=\"height:300px !important\"/>
									<div class=\"w3l-action-icon\"><i class=\"fa fa-play-circle\" aria-hidden=\"true\"></i></div>
								</a>
									<div class=\"mid-1 agileits_w3layouts_mid_1_home\">
										<div class=\"w3l-movie-text\">
											<h6><strong><a href=\"single.php?t=movie&id=".$r["id"]."\">".$r['title']."</a></strong></h6>							
										</div>
										<div class=\"mid-2 agile_mid_2_home\">
											<centre><p>".$r['release_date']."</p></centre>
									
								
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
	</div>
<!-- //banner-bottom -->

<!-- general -->
	<div class="general">
		<h4 class="latest-text w3_latest_text">Top Viewed Movies</h4>
		<div class="container">
			<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
				<ul id="myTab" class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Featured</a></li>
					
					<li role="presentation"><a href="#rating" id="rating-tab" role="tab" data-toggle="tab" aria-controls="rating" aria-expanded="true">Top Rating</a></li>
					<li role="presentation"><a href="#imdb" role="tab" id="imdb-tab" data-toggle="tab" aria-controls="imdb" aria-expanded="false">Top Grossing </a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
						<div class="w3_agile_featured_movies">
							<?php
								foreach ($jsonresponseHome["results"] as $r ) {
			echo  "	<div class=\"col-md-2 w3l-movie-gride-agile\" style=\"height:300px\">		

									<a href=\"single.php?t=movie&id=".$r["id"]."\" class=\"hvr-shutter-out-horizontal\"><img src=\"http://image.tmdb.org/t/p/w1280".$r["poster_path"]."\"class=\"img-responsive\" alt=\" \" title=\"album-name\" class=\"img-responsive\"style=\"height:250px !important\"/>
									<div class=\"w3l-action-icon\"><i class=\"fa fa-play-circle\" aria-hidden=\"true\"></i></div>
								</a>
									<div class=\"mid-1 agileits_w3layouts_mid_1_home\">
										<div class=\"w3l-movie-text\">
											<h6><a href=\"single.php?t=movie&id=".$r["id"]."\">".$r['title']."</a></h6>							
										</div>
										<div class=\"mid-2 agile_mid_2_home\">
											<p>".$r['release_date']."</p>
									
								
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







						
				<div role="tabpanel" class="tab-pane fade" id="rating" aria-labelledby="rating-tab">
						<div class="w3_agile_featured_movies">
							<?php
								foreach ($jsonresponseRating["results"] as $r ) {

										   	if($r['poster_path']==null||$r['poster_path']=='')
									{
										$src = "images/notFound.jpg" ;										
									}
									else
									{
										$src = "http://image.tmdb.org/t/p/w1280".$r["poster_path"];
									}

			echo  "	<div class=\"col-md-2 w3l-movie-gride-agile\" style=\"height:300px\">		

									<a href=\"single.php?t=movie&id=".$r["id"]."\" class=\"hvr-shutter-out-horizontal\"><img src=\"".$src."\"class=\"img-responsive\" alt=\" \" title=\"album-name\" class=\"img-responsive\"style=\"height:250px !important\"/>
									<div class=\"w3l-action-icon\"><i class=\"fa fa-play-circle\" aria-hidden=\"true\"></i></div>
								</a>
									<div class=\"mid-1 agileits_w3layouts_mid_1_home\">
										<div class=\"w3l-movie-text\">
											<h6><a href=\"single.php?t=movie&id=".$r["id"]."\">".$r['title']."</a></h6>							
										</div>
										<div class=\"mid-2 agile_mid_2_home\">
											<p>".$r['release_date']."</p>
									
								
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



				<div role="tabpanel" class="tab-pane fade" id="imdb" aria-labelledby="imdb-tab">
						<div class="w3_agile_featured_movies">
							<?php
								foreach ($jsonresponseImdb["results"] as $r ) {


										   	if($r['poster_path']==null||$r['poster_path']=='')
									{
										$src = "images/notFound.jpg" ;										
									}
									else
									{
										$src = "http://image.tmdb.org/t/p/w1280".$r["poster_path"];
									}

			echo  "	<div class=\"col-md-2 w3l-movie-gride-agile\" style=\"height:300px\">		

									<a href=\"single.php?t=movie&id=".$r["id"]."\" class=\"hvr-shutter-out-horizontal\"><img src=\"".$src."\"class=\"img-responsive\" alt=\" \" title=\"album-name\" class=\"img-responsive\"style=\"height:250px !important\"/>
									<div class=\"w3l-action-icon\"><i class=\"fa fa-play-circle\" aria-hidden=\"true\"></i></div>
								</a>
									<div class=\"mid-1 agileits_w3layouts_mid_1_home\">
										<div class=\"w3l-movie-text\">
											<h6><a href=\"single.php?t=movie&id=".$r["id"]."\">".$r['title']."</a></h6>							
										</div>
										<div class=\"mid-2 agile_mid_2_home\">
											<p>".$r['release_date']."</p>
									
								
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
		</div>
	</div>
<!-- //general -->
<!-- Latest-tv-series -->
	
	<!-- pop-up-box -->  
		<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<!--//pop-up-box -->
	<div id="small-dialog" class="mfp-hide">
		<iframe src="https://player.vimeo.com/video/164819130?title=0&byline=0"></iframe>
	</div>
	<div id="small-dialog1" class="mfp-hide">
		<iframe src="https://player.vimeo.com/video/148284736"></iframe>
	</div>
	<div id="small-dialog2" class="mfp-hide">
		<iframe src="https://player.vimeo.com/video/165197924?color=ffffff&title=0&byline=0&portrait=0"></iframe>
	</div>
	<script>
		$(document).ready(function() {
		$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});
																		
		});
	</script>
<!-- //Latest-tv-series -->
<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="w3ls_footer_grid">
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
					<a href="index.php"><h2>One<span>Movies</span></h2></a>
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
	var flag = 0;
function test() {
			if(flag==0)
				{
					$('#modal-header').html('Sign-Up <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
					flag=1;
					$('.tooltip').hide();
				}	
			else
			{
				$('#modal-header').html('Sign-In <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>');	
				flag=0;
				$('.tooltip').show();
			}
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
<!-- //here ends scrolling icon -->

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
</body>
</html>
									<!-- <div class="block-stars">
											<ul class="w3l-ratings">
												<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
											</ul>
										</div> -->

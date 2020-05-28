<?php 
session_start();
ini_set('max_execution_time', 90);


$Genre=$_GET['genre'];
$PageNo=$_GET['pgno'];
$Type=$_GET['type'];
$response=0;
		if($response==0)
		{
			
			$url="https://api.themoviedb.org/3/discover/movie?api_key=90484bf0e699fbef034e8e0bfe5dbddd&with_genres=".$Genre."&page=".$PageNo;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			// Set so curl_exec returns the result instead of outputting it.
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// Get the response and close the channel.
			$response = curl_exec($ch);
				//echo $response;
			$jsonresponse = json_decode($response, true);
			//print_r($jsonresponse);
			curl_close($ch);
		}	 ?>
<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>One Movies an Entertainment Portal | Genre :: </title>
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
<link href="css/medile.css" rel='stylesheet' type='text/css' />
<link href="css/single.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/contactstyle.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/faqstyle.css" type="text/css" media="all" />
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font-awesome.min.css" />
<!-- //font-awesome icons -->
<!-- news-css -->
<link rel="stylesheet" href="news-css/news.css" type="text/css" media="all" />
<!-- //news-css -->
<!-- list-css -->
<link rel="stylesheet" href="list-css/list.css" type="text/css" media="all" />
<!-- //list-css -->
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


<!-- /w3l-medile-movies-grids -->
	<div class="general-agileits-w3l">
		<div class="w3l-medile-movies-grids">

				<!-- /movie-browse-agile -->
				
				      <div class="movie-browse-agile">
					     <!--/browse-agile-w3ls -->
						<div class="browse-agile-w3ls general-w3ls">
								<div class="tittle-head">
								<<?php  echo "<h4 class=\"latest-text\"> <i>Genre :- ".$Type. "</i></h4>  ";  ?>
									<div class="container">
										<div class="agileits-single-top">
											<ol class="breadcrumb">
											  <li><a href="index.php">Home</a></li>
											  <li class="active">Genres</li>
											</ol>
										</div>
									</div>
								</div>
								     <div class="container">
						
								     	<?php
								     	$count=0;
								foreach ($jsonresponse["results"] as $r ) {
									if ($count>=18) {
										break;
									}
									
									if($r['poster_path']==null||$r['poster_path']=='')
									{
										$src = "images/notFound.jpg" ;										
									}
									else
									{
										$src = "http://image.tmdb.org/t/p/w1280".$r["poster_path"];
									}
			echo  "	<div class=\"browse-inner\">
						  <div class=\"col-md-2 w3l-movie-gride-agile\" style=\"height:300px\">
							

									<a href=\"single.php?t=movie&id=".$r["id"]."\" class=\"hvr-shutter-out-horizontal\"><img src=\"".$src."\" alt=\" \" title=\"album-name\" class=\"img-responsive\" style=\"height:250px !important\"/>
									<div class=\"w3l-action-icon\"><i class=\"fa fa-play-circle\" aria-hidden=\"true\"></i></div>
								</a>
									<div class=\"mid-1\">
										<div class=\"w3l-movie-text\">
											<h6><strong><a href=\"single.php?t=movie&id=".$r["id"]."\">".$r['title']."</a></strong></h6>							
										</div>
										<div class=\"mid-2 \">
											<centre><p>".$r['release_date']."</p></centre>
									
								
										 <div class=\"clearfix\"></div>
									</div>
							</div>
						
		
							<div class=\"ribben\">
								<p>NEW</p>
							</div>
						</div>
					</div>";
				$count++;
				}
				?>
											
									
								   
						</div>
				<!--//browse-agile-w3ls -->
						<div class="blog-pagenat-wthree">
							<ul>
								<?php 
								echo"
								<li><a class=\"frist\" href=\"genres.php?genre=".$Genre."&type=".$Type."&pgno=".($PageNo-1)."\">Prev</a></li>
								<li><a href=\"genres.php?genre=".$Genre."&type=".$Type."&pgno=".$PageNo."\">".($PageNo)."</a></li>
								<li><a href=\"genres.php?genre=".$Genre."&type=".$Type."&pgno=".($PageNo+1)."\">".($PageNo+1)."</a></li>
								<li><a href=\"genres.php?genre=".$Genre."&type=".$Type."&pgno=".($PageNo+2)."\">".($PageNo+2)."</a></li>
								<li><a href=\"genres.php?genre=".$Genre."&type=".$Type."&pgno=".($PageNo+3)."\">".($PageNo+3)."</a></li>
								<li><a href=\"genres.php?genre=".$Genre."&type=".$Type."&pgno=".($PageNo+4)."\">".($PageNo+4)."</a></li>
								<li><a class=\"last\" href=\"genres.php?genre=".$Genre."&type=".$Type."&pgno=".($PageNo+1)."\">Next</a></li> "; ?>
							</ul>
						</div>
					</div>
				    <!-- //movie-browse-agile -->
				   <!--body wrapper start-->
				<!--body wrapper start-->
				
	<!-- //comedy-w3l-agileits -->
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
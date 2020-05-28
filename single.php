<?php
ini_set('max_execution_time', 90);
session_start();
$Id=$_GET['id'];
$T=$_GET['t'];
//
{
	include './php/connect.php';
	if ($T=="movie") {
		$qry1="SELECT *
				FROM commenttrail T
					INNER JOIN user U
				on T.UserId=U.UserId	
				
			WHERE T.movieId = ".$Id."
		
			ORDER BY commentTime DESC ";
			
	$stmt1 = $conn->query($qry1);	
	//$comments = $stmt1->fetch_assoc();
	$comments = mysqli_fetch_all($stmt1,MYSQLI_ASSOC);

	 
	} else {

		$qry1="SELECT *
				FROM commenttrail T
				INNER JOIN user U
				on T.UserId=U.UserId				
			WHERE T.tvId = ".$Id." 
		
			ORDER BY commentTime DESC ";
			
	$stmt1 = $conn->query($qry1);	
$comments = mysqli_fetch_all($stmt1,MYSQLI_ASSOC);
	

	
	}
	//print_r($comments);
	
	
}
	

$response=0;
		if($response==0)
		{
			
			$url="http://api.themoviedb.org/3/".$T."/".$Id."?api_key=90484bf0e699fbef034e8e0bfe5dbddd";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			// Set so curl_exec returns the result instead of outputting it.
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// Get the response and close the channel.
			$response = curl_exec($ch);
			//	echo $response;
			$jsonresponse = json_decode($response, true);
			//print_r($jsonresponse);
			curl_close($ch);
		}	
$responseYT=0;
		if($responseYT==0)
		{
			
			$urlYT="http://api.themoviedb.org/3/".$T."/".$Id."/videos?api_key=90484bf0e699fbef034e8e0bfe5dbddd";
			$chYT = curl_init();
			curl_setopt($chYT, CURLOPT_URL, $urlYT);
			// Set so curl_exec returns the result instead of outputting it.
			curl_setopt($chYT, CURLOPT_RETURNTRANSFER, true);
			// Get the response and close the channel.
			$responseYT = curl_exec($chYT);
				//echo $responseYT;
			$jsonresponseYT = json_decode($responseYT, true);
			//print_r($jsonresponseYT);
			curl_close($chYT);
			
			if(count($jsonresponseYT['results'])!=0)
			{
				$YT_ID=$jsonresponseYT['results']['0']['key'];
			}
	

			
			//echo $YT_ID;

		}	
		$responseHome=0;
if($responseHome==0)
		{
			$urlHome="https://api.themoviedb.org/3/movie/now_playing?api_key=90484bf0e699fbef034e8e0bfe5dbddd&language=en-US&page=1";
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

		



 ?>
<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>One Movies an Entertainment Category Flat Bootstrap Responsive Website Template | Single :: w3layouts</title>
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
<!-- news-css -->
<link rel="stylesheet" href="news-css/news.css" type="text/css" media="all" />
<!-- //news-css -->
<!-- list-css -->
<link rel="stylesheet" href="list-css/list.css" type="text/css" media="all" />
<!-- //list-css -->
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font-awesome.min.css" />
<!-- //font-awesome icons -->
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script src="https://www.w3schools.com/lib/w3.js"></script>


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
<!-- <script src="js/simplePlayer.js"></script>
<script>
	$("document").ready(function() {
		$("#video").simplePlayer();
	});
</script> -->
<div w3-include-html="navbar.php"></div>
</head>
	
<body>



<!-- single -->
<div class="single-page-agile-main">
<div class="container">
		<!-- /w3l-medile-movies-grids -->
			<div class="agileits-single-top">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li class="active">Single</li>
				</ol>
			</div>
			<div class="single-page-agile-info">
                   <!-- /movie-browse-agile -->
                           <div class="show-top-grids-w3lagile">
				<div class="col-sm-8 single-left">
					<div class="song">
						<div class="song-info">
							<em><h3 style="font-size: 35px !important"><?php
							if($T=="movie"){
							 echo $jsonresponse['title']; 
							}
							else if($T=="tv"){
							 echo $jsonresponse['original_name'];
						}
						?>
						</h3>	</em>
						
					</div>
						<div class="video-grid-single-page-agileits">
							<div id="video"> 
								<?php if(isset($YT_ID)) 
								{
								echo "<iframe width=\"100%\" height=\"480px\"
									 src=\"https://www.youtube.com/embed/".$YT_ID."?controls=1\"> 
								</iframe>";
							}
							else{
								if($jsonresponse['backdrop_path']==null||$jsonresponse['backdrop_path']=='')
									{
										$src = "images/error.png" ;										
									}
									else
									{
										$src = "http://image.tmdb.org/t/p/w1280".$jsonresponse["backdrop_path"];
							
									}
								
							 echo "	<img src=\"".$src."\" alt=\" \" title=\"album-name\" class=\"img-responsive\" style=\"height:60% !important\"/>";
							} 
							?>
							</div>
						</div>
					</div>
					<div class="all-comments">
						<em><h3 style="font-family: 'Roboto Condensed', sans-serif !important;font-size: 30px !important;color: #9E9E9E"> Description :</h3></em>
						<div class="all-comments">

						<h3 style="font-size: 18px !important;" ><i><?php echo $jsonresponse['overview']; ?></i></h3>
						</div>
					

					<div class="all-comments">
						<style type="text/css">
							h3{display: inline;}
							em{padding-left: 20px;}
						</style>
						<em><h3 style="font-family: 'Roboto Condensed', sans-serif !important;font-size: 30px !important;color: #9E9E9E" >
							<?php if($T=="movie")
					{
						echo "Release Date :</h3></em>
					<h3><i>". $jsonresponse['release_date']."</i></h3> ";
					}
					else {echo "First Air Date :</h3></em>
					<h3><i>". $jsonresponse['first_air_date']."</i></h3> ";
					}
				?>


					</div>
					<div class="all-comments">
						<style type="text/css">
							h3{display: inline;}
						</style>
						<em><h3 style="font-family: 'Roboto Condensed', sans-serif !important;font-size: 30px !important;color: #9E9E9E" >Average Votes :</h3></em>	<h3><i><?php echo $jsonresponse['vote_average']; ?></i></h3>
						<?php
							if($T=="movie"){
					echo "<em><h3 style=\"font-family: 'Roboto Condensed', sans-serif !important;font-size: 30px !important;color: #9E9E9E\" >Runtime :</h3></em>	<h3><i>". $jsonresponse['runtime']." minutes</i></h3>"; 
					}	?>
					</div>
					<div class="all-comments">
						<style type="text/css">
							h3{display: inline; padding-left: 10px}
							em{padding-left: 20px;}
						</style>
						<em><h3 style="font-family: 'Roboto Condensed', sans-serif !important;font-size: 30px !important;color: #9E9E9E" >Genre :</h3></em>
							<?php 
							$Count=count($jsonresponse['genres']);
							foreach ($jsonresponse['genres'] as $gkey=>$g) {
								if ($gkey>2) {
									break;
								}
								if($gkey<2&&$gkey<($Count-1)){
							 	echo "<h3><i>".$g['name'].",</i></h3>";
							 }
							 else if ($gkey=2||$gkey=($Count-1)) {
							 	echo "<h3><i>".$g['name'].".</i></h3>";
							 }
							 } 
							?>  

					</div>
				</div>
					

					<div class="all-comments">
						<div class="all-comments-info">
							<a href="#"><em><h3 style="font-family: 'Roboto Condensed', sans-serif !important;font-size: 30px !important">Add Comment <(^_-)></h3></em></a>
							<div class="agile-info-wthree-box">
								<form action="./php/comment.php?<?php echo "t=".$T."&id=".$Id."\""; ?> method="post">
									<textarea placeholder="Message" required="" name="Description" style="font-size: 15px"></textarea>
									<input type="submit" value="SEND" 
									<?php if (!isset($_SESSION["UserId"])) {
										echo "disabled";
									} ?>
									>
									<div class="clearfix"> </div>
								</form>
							</div>
						</div>
						<div class="media-grids">
							<?php
							//foreach ($comments['CommentTrailId'] as $key => $com) {
								
							
							for($i = 0; $i < mysqli_num_rows($stmt1); $i++)
							{
								echo "
								<div class=\"media\">
								<h5 style=\"font-size:22pt\"><i class=\"glyphicon glyphicon-hand-right\">&nbsp</i>".$comments[$i]['Username']."</h5>
								<div class=\"media-body\">
									<p style=\"font-size:15pt\">".$comments[$i]['CommentDesc']."</p>
									<span> ".$comments[$i]['commentTime']." </span>
								</div>
							</div>";
							}
							
							?>
							
						</div>
					</div>
				</div>
				<div class="col-md-4 single-right">
					<h3>Up Next</h3>
					<div class="single-grid-right">
						<?php 
						foreach ($jsonresponseHome["results"] as $rkey => $r) {
							
							if($rkey>7)
							{
								break;
							}
						if($r['poster_path']==null||$r['poster_path']=='')
									{
										$src = "images/notFound.jpg" ;										
									}
									else
									{	
										$src = "http://image.tmdb.org/t/p/w780".$r["poster_path"];
									}
						echo 
						"<div class=\"single-right-grids\">

							<div class=\"col-md-4 single-right-grid-left\">
								<a href=\"single.php?t=movie&id=".$r["id"]."\" style=\"height:20px !important\"><img src=\"".$src."\" alt=\"\" /></a>
							</div>
							<div class=\"col-md-8 single-right-grid-right\">
								<a href=\"single.php?t=movie&id=".$r["id"]."\" class=\"title\">".$r['title']."</a>

								<p class=\"date\">".$r['release_date']." </p>
								
								<p class=\"views\">".round($r['popularity']*1000)." views</p>
								
							</div>
							
							<div class=\"clearfix\"> 
							</div>
						

					</div>";
				}
					?>
					<style type="text/css">
						p{padding-top: 10px;}
					</style>
				</div>
				

				
				<div class="clearfix"> </div>
			</div>
				<!-- //movie-browse-agile -->
				<!--body wrapper start-->
			
		<!--body wrapper end-->
						
							 
				</div>
				<!-- //w3l-latest-movies-grids -->
			</div>	
		</div>
	<!-- //w3l-medile-movies-grids -->
	
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
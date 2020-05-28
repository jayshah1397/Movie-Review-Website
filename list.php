<?php 
session_start();
//print_r($_SESSION);
ini_set('max_execution_time', 90);

	$Search=$_GET['Search'];
	$PageNo=$_GET['pgno'];
	 $Search1 = strtolower($Search);
    //Make alphanumeric (removes all other characters)
    $Search1 = preg_replace("/[^a-z0-9_\s-]/", "", $Search1);
    //Clean up multiple dashes or whitespaces
    $Search1 = preg_replace("/[\s-]+/", " ", $Search1);
    //Convert whitespaces and underscore to dash
    $Search1 = preg_replace("/[\s_]/", "+", $Search1);




	$response=0;
		if($response==0)
		{
			$url="https://api.themoviedb.org/3/search/movie?api_key=90484bf0e699fbef034e8e0bfe5dbddd&page=".$PageNo."&query=".$Search1;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			// Set so curl_exec returns the result instead of outputting it.
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// Get the response and close the channel.
			$response = curl_exec($ch);
			$jsonresponse = json_decode($response, true);

			//print_r($jsonresponse);
			curl_close($ch);
			$total_results=$jsonresponse['total_results'];
			$total_pages=$jsonresponse['total_pages'];
			if ($PageNo<$total_pages) {

				$resultpp=20;
			}else if($PageNo==$total_pages){
				$resultpp=$total_results%20;
			}else{
				$resultpp=0;
			}
			$SrNo=($PageNo-1)*20;
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
<title>One Movies an Entertainment Category Flat Bootstrap Responsive Website Template | List :: w3layouts</title>
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
<link rel="stylesheet" href="css/faqstyle.css" type="text/css" media="all" />
<link href="css/medile.css" rel='stylesheet' type='text/css' />
<link href="css/single.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/contactstyle.css" type="text/css" media="all" />
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
<!-- tables -->
<link rel="stylesheet" type="text/css" href="list-css/table-style.css" />
<link rel="stylesheet" type="text/css" href="list-css/basictable.css" />
<script type="text/javascript" src="list-js/jquery.basictable.min.js"></script>
 
  <script src="https://www.w3schools.com/lib/w3.js"></script>
<!-- //tables -->
</head>
	
<body>
	<div w3-include-html="navbar.php">
	<h1>While_Loading</h1>
</div>



<!-- faq-banner -->
	<div class="faq">
		<h4 class="latest-text w3_faq_latest_text w3_latest_text">Movies List</h4>
			<div class="container">
				<div class="agileits-news-top">
					<ol class="breadcrumb">
					  <li><a href="index.php">Home</a></li>
					  <li class="active">List</li>
					</ol>
				</div>
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
						
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">
										<h4>Search Results : <span><?php echo $resultpp; ?></span></h4>
									</div>
									<table id="table-breakpoint">
										<thead>
										  <tr>
											<th>No.</th>
											<th>Movie Name</th>
											<th>Year</th>
											<th>Language</th>
											<th>Vote Count</th>
											<th>Rating</th>
											<th>Popularity</th>
										  </tr>
										</thead>
										<tbody>
										   <?php 
								 if($PageNo<=$jsonresponse['total_pages']){

										   foreach ($jsonresponse["results"] as $key=>$r )
										   {

										   	if($r['poster_path']==null||$r['poster_path']=='')
									{
										$src = "images/notFound.jpg" ;										
									}
									else
									{
										$src = "http://image.tmdb.org/t/p/w92".$r["poster_path"];
									}
										    echo "
										    <tr>
											<td>".($SrNo+$key+1)."</td>
											<td class=\"w3-list-img\"><a href=\"single.php?t=movie&id=".$r["id"]."\"><img src=\"".$src."\" alt=\"\" /> <span>".$r['title']."</span></a></td>
											<td>".$r['release_date']."</td>
											<td>".$r['original_language']."</td>
											<td class=\"w3-list-info\">".$r['vote_count']."</td>
											<td class=\"w3-list-info\">".$r['vote_average']."</td>
											<td>".($r['popularity']*100)."</td>
										  </tr>

										  "; 
										}
									}	
									else{
										echo "There are no Results on page : ".$PageNo;
									}
										   ?>
										 
										</tbody>
									</table>

										<div class="blog-pagenat-wthree">
							<ul>
								<?php 

								echo"
								<li><a class=\"frist\" href=\"list.php?Search=".$Search."&pgno=".($PageNo-1)."\">Prev</a></li>";
								if($PageNo<=($jsonresponse['total_pages'])){
										echo "<li><a href=\"list.php?Search=".$Search."&pgno=".$PageNo."\">".($PageNo)."</a></li>";
									}
									if($PageNo+1<=($jsonresponse['total_pages'])){
										echo "<li><a href=\"list.php?Search=".$Search."&pgno=".($PageNo+1)."\">".($PageNo+1)."</a></li>";
									}
									if($PageNo+2<=($jsonresponse['total_pages'])){
										echo "<li><a href=\"list.php?Search=".$Search."&pgno=".($PageNo+2)."\">".($PageNo+2)."</a></li>";
									}
									if($PageNo+3<=($jsonresponse['total_pages'])){
										echo "<li><a href=\"list.php?Search=".$Search."&pgno=".($PageNo+3)."\">".($PageNo+3)."</a></li>";
									}
									if($PageNo+4<=($jsonresponse['total_pages'])){
										echo "<li><a href=\"list.php?Search=".$Search."&pgno=".($PageNo+4)."\">".($PageNo+4)."</a></li>";
									}
									if($PageNo+5<($jsonresponse['total_pages'])){
									echo "<li><a class=\"last\" href=\"list.php?Search=".$Search."&pgno=".($PageNo+1)."\">Next</a></li> ";
								}
									 ?>
							</ul>
						</div>

								</div>
							</div>
							</div>
						</div>
					</div>
				</div>
<!-- //faq-banner -->
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
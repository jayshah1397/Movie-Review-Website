<?php session_start(); 
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


// $_SESSION['Username']=null;

?>
<!-- header -->
	<link href="https://maxcdc.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	<script src="https://maxcdc.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<div class="header">
		<div class="container">
			<div class="w3layouts_logo">
				<a href="index.php"><h1>One<span>Movies</span></h1></a>
			</div>
			<div class="w3_search">
				<form action="list.php" method="get">
					<input type="text" name="Search" placeholder="Search" required="">
					<input type="hidden" name="pgno" value="1">
					<input type="submit" value="Go">
					
				</form>
			</div>
			<div>
				
			</div>
			<div class="w3l_sign_in_register">
				<ul>
					
					<li style="font-family: Algerian;font-size: 12pt;" id="profileName">
					<em>
						<?php 
							echo "Hello ";
						if(!isset($_SESSION['Username']))
							echo "Guest <(^_^)>";
						else
							echo $_SESSION['Username'];
					 	?>
					 	
					</em>
					</li>
					<li>
					<?php

						if (!isset($_SESSION['Username'])) 
							echo "<a href=\"#\" data-toggle=\"modal\" data-target=\"#myModal\">Login</a>";
						else
							echo "<a href=\"./php/register.php?logout=true\" >Logout</a>";
					?>
					</li>
					
					
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- bootstrap-pop-up -->
	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" id="modal-header">
					Sign-In 
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
				<section>
					<div class="modal-body">
						<div class="w3_login_module">
							<div class="module form-module">
							  <div class="toggle" id="toggle" onclick="test()" >
							  	<i class="fa fa-times fa-pencil" id="iconPencil"></i>
								<div class="tooltip">Sign-Up</div>
							  </div>
							  <div class="form">
								<h3>Login to your account</h3>
								<form action="./php/register.php" method="post" >
								  <input type="text" id="loginName" name="Username" placeholder="Username" required="">
								  <input type="password" id="loginPass" name="Password" placeholder="Password" required="">
								  <input type="hidden" id="loginPass" name="Flag" value="0" >
								  <input type="submit" value="Login">
								</form>
							  </div>
							  <div class="form">
								<h3><?php echo "Create an account" ?></h3>
								<form action="./php/register.php" method="post">
								  <input type="text" id="regName" name="Username" placeholder="Username" required="">
								  <input type="password" id="regPas" name="Password" placeholder="Password" required="">
								  <input type="email" id="regEm" name="Email" placeholder="Email Address" required="">
  								  <input type="hidden" id="loginPass" name="Flag" value="1" >
								  <input type="submit" value="Register">
								</form>
							  </div>
							 
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
	
<!-- //bootstrap-pop-up -->
<!-- nav -->
	<div class="movies_nav">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav>
						<ul class="nav navbar-nav">
							<li class="active"><a href="index.php">Home</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Genres <b class="caret"></b></a>
								<ul class="dropdown-menu multi-column columns-3">
									<li>
									<div class="col-sm-4">
										<ul class="multi-column-dropdown">
											<li><a href="genres.php?genre=28&type=Action&pgno=1">Action</a></li>
											<li><a href="genres.php?genre=37&type=Western&pgno=1">Western</a></li>
											<li><a href="genres.php?genre=80&type=Crime&pgno=1">Crime</a></li>
											<li><a href="genres.php?genre=10751&type=Family&pgno=1">Family</a></li>
											<li><a href="genres.php?genre=27&type=Horror&pgno=1">Horror</a></li>
											<li><a href="genres.php?genre=10749&type=Romance&pgno=1">Romance</a></li>
											
										</ul>
									</div>
									<div class="col-sm-4">
										<ul class="multi-column-dropdown">
											<li><a href="genres.php?genre=12&type=Adventure&pgno=1">Adventure</a></li>
											<li><a href="genres.php?genre=35&type=Comedy&pgno=1">Comedy</a></li>
											<li><a href="genres.php?genre=99&type=Documentary&pgno=1">Documentary</a></li>
											<li><a href="genres.php?genre=14&type=Fantasy&pgno=1">Fantasy</a></li>
											<li><a href="genres.php?genre=9648&type=Mystery&pgno=1">Mystery</a></li>
											<li><a href="genres.php?genre=53&type=Thriller&pgno=1">Thriller</a></li>
										</ul>
									</div>
									<div class="col-sm-4">
										<ul class="multi-column-dropdown">
											<li><a href="genres.php?genre=16&type=Animation&pgno=1">Animation</a></li>
											<li><a href="genres.php?genre=878&type=Science Fiction&pgno=1">Science Fiction</a></li>
											<li><a href="genres.php?genre=19&type=Drama&pgno=1">Drama</a></li>
											<li><a href="genres.php?genre=36&type=History&pgno=1">History</a></li>
											<li><a href="genres.php?genre=10402&type=Musical&pgno=1">Musical</a></li>
											<li><a href="genres.php?genre=10752&type=War&pgno=1">War</a></li>
										</ul>
									</div>
									<div class="clearfix"></div>
									</li>
								</ul>
							</li>
							<li><a href="series.php">tv - series</a></li>
							
						</ul>
					</nav>
				</div>
			</nav>	
		</div>
	</div>

<!-- //nav -->
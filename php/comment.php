<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include './connect.php';

{

		$Description = $_POST['Description'];
		$T = $_GET["t"];
		if ($T=="movie") 
		{
			$Id=$_GET["id"];
			$qry1="SELECT *
				FROM commenttrail T
				
			WHERE T.movieId = ".$Id."
		
			ORDER BY commentTime DESC LIMIT 1 ";
			
			$stmt1 = $conn->query($qry1);

			$parentComment = $stmt1->fetch_assoc();	
			print_r( $parentComment);
			if (!mysqli_num_rows($stmt1)) {
				$parentId = 0;
			}
			else
			{
				$parentId = $parentComment["CommentTrailId"];
			}
		} 
		else {
			$Id = $_GET["id"];
			$qry1="SELECT *
				FROM commenttrail T
				
			WHERE T.tvId = ".$Id."
		
			ORDER BY commentTime DESC LIMIT 1";
			
			$stmt1 = $conn->query($qry1);

			$parentComment = $stmt1->fetch_assoc();	
			
			if (mysqli_num_rows($stmt1)!=0) {
				$parentId = 0;
			}
			else
			{
				$parentId = $parentComment["CommentTrailId"];
			}

		}

		if ($T=="movie") {

			$qry1="INSERT into commenttrail( UserId, ParentComment, CommentDesc, movieId)
				VALUES('".$_SESSION['UserId']."','".$parentId."','".$Description."','".$Id."')";
			
			$stmt1 = $conn->query($qry1);
		} else {
			$qry1="INSERT into commenttrail( UserId, ParentComment, CommentDesc, tvId)
				VALUES('".$_SESSION['UserId']."','".$parentId."','".$Description."','".$Id."')";
			
			$stmt1 = $conn->query($qry1);
		}
		header("location:../single.php?t=".$T."&id=".$Id);
	}
		
		
		
?>
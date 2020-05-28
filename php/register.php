<?php

	 error_reporting(E_ALL);
	 ini_set('display_errors', 1);
	 include './connect.php';

    session_start();

	$response = array();
	$response1 = array();
	
	

	if($_GET["logout"])
	{
		session_destroy();
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}

	if(isset($_POST['Username']) && isset($_POST['Password']) && isset($_POST['Flag']))//0 = Login,1= register
	{
		$Username=$_POST['Username'];
		$Password=$_POST['Password'];
		$Email=$_POST['Email'];
		$Flag=$_POST['Flag'];

		if($Flag == 0)
		{
			$sql = "SELECT *
					FROM user 
					WHERE Username = '".$Username."'";
			
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				
				if ($row["Password"]== $Password) 
				{
				//echoing JSON response
				header('Content-Type: application/json');
				echo json_encode(array(
										'success'=>1,
										'UserDetails' => $row
									   ));
				$_SESSION["UserId"]=$row["UserId"];
				$_SESSION["Username"]=$row["Username"];
				
				
				//print_r($_SESSION);
				header('Location: '.$_SERVER['HTTP_REFERER']);
				die;

				exit();
				} 
				else {
				$response["success"] = 0;
				$response["message"] = "Invalid Password";
				// echoing JSON response
				header('Content-Type: application/json');
				echo json_encode($response);
				exit();
				}
				
			} 
			else {
				$response["success"] = 0;
				$response["message"] = "Invalid Username";
				// echoing JSON response
				header('Content-Type: application/json');
				echo json_encode($response);
				exit();
			}
			
		}


		else if($Flag == 1)
		{
			$sql = "SELECT *
					FROM user 
					WHERE Username = '".$Username."'";
			
			$result = $conn->query($sql);

			if ($result->num_rows == 0) 
			{
				
				$sql = "INSERT INTO user(Username,Password,EmailId)
						VALUES('".$Username."','".$Password."','".$Email."')";
			
				$result = $conn->query($sql);
				$sql = "SELECT *
					FROM user 
					WHERE Username = '".$Username."'";
			
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();

				
				header('Content-Type: application/json');
				echo json_encode(array(
										'success'=>1,
										'message' => "User registered",
										'user_details'=>$row
									   ));
				
				$_SESSION["UserId"]=$row["UserId"];
				$_SESSION["Username"]=$row["Username"];
				
				//print_r($_SESSION);
				header('Location: '.$_SERVER['HTTP_REFERER']);
				die;

				exit();
			}		
			else
			{

				$response["success"] = 0;
				$response["message"] = "Username Already Exists";
				// echoing JSON response
				header('Content-Type: application/json');
				echo json_encode($response);
				exit();
			}
			
		}
	}
	else
	{
		$response["success"] = 0;
		$response["message"] = "Invalid Input Provided";
		// echoing JSON response
		header('Content-Type: application/json');
		echo json_encode($response);
		exit();
	}


?>
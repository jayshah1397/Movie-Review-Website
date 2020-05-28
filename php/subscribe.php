<?php
	session_start();
	 error_reporting(E_ALL);
	 ini_set('display_errors', 1);
	 include './connect.php';
	 $EmailId=$_POST['email'];
	 $sql = "SELECT *
					FROM subscription 
					WHERE emailId = '".$EmailId."'";

	$result = $conn->query($sql);

			if ($result->num_rows == 0) {
				$sql = "INSERT INTO subscription(emailID)
						VALUES('".$EmailId."')";
					$result = $conn->query($sql);
					header('Content-Type: application/json');
				// echo json_encode(array(
				// 						'success'=>1,
				// 						'message' => "User Subscribed",
				// 						'user_details'=>$row
				// 					   ));

				$_SESSION['sFlag']='1';
					header('Location: '.$_SERVER['HTTP_REFERER']);
die;

				exit();
					}
				else
			{

				$response["success"] = 0;
				$response["message"] = "You Have Already Subscribed";
				// echoing JSON response
				header('Content-Type: application/json');
				$_SESSION['sFlag']='2';
				//echo json_encode($response);
				header('Location: '.$_SERVER['HTTP_REFERER']);
die;
				exit();
			}
					
?>
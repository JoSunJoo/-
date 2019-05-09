<?php
	$conn = mysqli_connect("localhost", "whtjswn1029", "s971029", "whtjswn");

	if (!isset($_POST['user_name'])){ echo"user_name"; exit();}	
	if (!isset($_POST['select_date'])) exit();	
	if (!isset($_POST['start_time'])) exit();	
	if (!isset($_POST['last_time'])) exit();	
	if (!isset($_POST['size'])) exit();	
	
	$room_number = $_SESSION['room_no'];
	
	$size = mysqli_real_escape_string($conn, $_POST['size_size']);
	
	for($i=0; $i<$size; $i++){
		
		$userName = mysqli_real_escape_string($conn, $_POST['user_name']);
		$selectDate = mysqli_real_escape_string($conn, $_POST['select_date']);
		$startTime = mysqli_real_escape_string($conn, $_POST['start_time']);
		$lastTime = mysqli_real_escape_string($conn, $_POST['last_time']);

		
		$sql = "INSERT INTO schedule VALUES(null, '$room_number', '$userName', '$selectDate', '$startTime', '$lastTime')"
		$result = mysqli_query($conn, $sql);
			
	}
	$success = array();
	$success['state'] = "success!!";

	echo json_encode($success);
?>

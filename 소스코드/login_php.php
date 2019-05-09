<?php
	$conn = mysqli_connect("localhost", "whtjswn1029", "s971029", "whtjswn");
	
	if (!isset($_POST['room_name'])) exit();
	if (!isset($_POST['password'])) exit();
	
	$loginResult = array();
	$loginResult['state'] = false;
	
	$roomName = mysqli_real_escape_string($conn, $_POST['room_name']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	
	$sql = "SELECT * FROM login WHERE `room_name` = '$roomName'";
	$result = mysqli_query($conn, $sql);
	while ($row=mysqli_fetch_assoc($result)) {
		if($row[password] == $password){
			$loginResult['state']=true;
			$loginResult['context']="로그인에 성공했습니다!";
			
			$_SESSION['room_no'] = $row['no'];
			break;
		}
	}

	if(!$loginResult['state'])
		$loginResult['context']="아이디 혹은 비밀번호가 일치하지 않습니다!";
	
	echo json_encode($loginResult);
	
?>	
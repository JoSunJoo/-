
<?php
	$conn=mysqli_connect("localhost", "whtjswn1029", "s971029", "whtjswn");

	$first_day = mysqli_real_escape_string($conn, $_POST['first_date']);
	$final_day = mysqli_real_escape_string($conn, $_POST['final_date']);		
	$minPerson = mysqli_real_escape_string($conn, $_POST['min_person']);
	$minTime = mysqli_real_escape_string($conn, $_POST['min_time']);
	$roomName = mysqli_real_escape_string($conn, $_POST['room_name']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	
	if(isset($_POST['room_name'])){
		$sql = "select room_name, password from login";
		$result = mysqli_query($conn, $sql);
		
		$num = 0;
		$cnt=mysqli_num_fields($result);
		$check=0;
		
		do{
			$row = mysqli_fetch_assoc($result);
			if($row[room_name] == $roomName && $row[password] == $password){
				$check = $check + 1;
			}
			$num++;	
		}while($num<=$cnt);
		
		if($check == 0){

			$sql="insert into login values (null, '$roomName', '$password', '$minPerson', '$minTime', '$first_day', '$final_day')";
			$result= mysqli_query($conn, $sql);
			echo mysqli_error($conn);
			echo "<meta http-equiv='refresh' content='0; url=page_3.php'>";
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=page2_1.php'>";
			echo "아이디와 비밀번호가 중복됩니다!";
		}
	}
?>


<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="description" content="방을 만드는 페이지입니다!">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>create_room_page</title>
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
		

		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<link rel="stylesheet" href="./css/style.css">

		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		
		<link href="./css/datepicker.min.css" rel="stylesheet" type="text/css">
        <script src="./js/datepicker.min.js"></script>

        <!-- Include English language -->
        <script src="./js/datepicker.en.js"></script>
		
	
	</head>
	
	<body>
		<div id="main-frame">
			<div class="top-design">
					<img src="./sub_logo.png" style="width: 70vw; height: 12vh;">
			</div>
		
			<div style="padding-bottom: 50px">		</div>
			
			<div style="text-align: center;">
			
			<div id="datepicker" class="center-table" data-language='en'></div>
				<div style="padding-bottom: 37px">		</div>
		
				<form action="page2_1.php" class="center" method="POST">
		
					시작일: <input type="text" class="beatiful-btn datepicker-here" style="color: #7f7f7f;" name="first_date" data-language='en'>
					<div style="padding-bottom: 8px"></div>
					종료일: <input type="text" class="beatiful-btn datepicker-here" style="color: #7f7f7f;" name="final_date" data-language='en'>		
			
					<div style="padding-bottom: 37px">		</div>
				
				
			
					방 명 : <input type="text" class="beatiful-btn" name="room_name">
					<div style="padding-bottom: 8px"></div>
					 P W : <input type="password" class="beatiful-btn" name="password">
					
					<div style="padding-bottom: 30px"></div>
					
					최소 인원 : <input type="text" style="text-align: left; font-size: 13px;" class="beatiful-btn" name="min_person" placeholder="  숫자만 입력하세요">
					<div style="padding-bottom: 30px"></div>
					 최소 시간 : <input type="text" style="text-align: left; font-size: 13px;" class="beatiful-btn" name="min_time" placeholder="  숫자만 입력하세요">
					
					<div style="padding-bottom: 50px"></div>
					<button type="submit"  class="click button_design btn btn-lg" style="background-color: #fed7a1; color: white;">링크복사 & 등록</button>
				</form>
				
			</div>	
			<div style="padding-bottom: 80px;"></div>
		</div>
		

		
		
		<script>
			$(function(){
				$(window).resize();
				
				// Initialization
				$('#my-element').datepicker({
					autoClose: true
				})

			});
			
			$(window).resize(function(){
				$("#main-frame").css("margin-top", "calc(30vh - " + $("#main-frame").height() / 2 + "px - 1vh)");
			
			});
			
			$(window).resize( function() {
				$( "#datepicker" ).datepicker();
			} );


		</script>
	</body>	
	
</html>
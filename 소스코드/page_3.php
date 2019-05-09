
<?php
	$conn = mysqli_connect("localhost", "whtjswn1029", "s971029", "whtjswn");

	$room_number = $_SESSION['room_no'];
		
	if(isset($_POST['user_name'])){
		$userName = mysqli_real_escape_string($conn, $_POST['user_name']);
		$selectDate = mysqli_real_escape_string($conn, $_POST['select_date']);
		$startTime = mysqli_real_escape_string($conn, $_POST['start_time']);
		$lastTime = mysqli_real_escape_string($conn, $_POST['last_time']);

		echo "1 :$userName<br>";
		echo "2: $selectDate<br>";
		echo "3: $startTime<br>";
		echo "4: $lastTime<br>";
		
		$sql = "INSERT INTO schedule VALUES(null, '$room_number', '$userName', '$selectDate', '$startTime', '$lastTime')";
		$result = mysqli_query($conn, $sql);
		echo "<meta http-equiv='refresh' content='0; url=page_3.php'>";
	}
?>


<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="description" content="방을 만드는 페이지입니다!">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>create_room_page</title>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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

			<button class="w3-button w3-xlarge w3-right" onclick="openRightMenu()">&#9776;</button>
			<div class="w3_sidebar w3-bar-block w3-card w3-animate-right" style="display:none; right:0; z-index: 6;" id="rightMenu">
				<button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">&#9776;</button>
				<div style="padding-bottom: 14vh">		</div>
		
				<div class="center-table banner-design" >
					 <legend>등록 현황</legend>
				</div>
				
				<div style="padding-bottom: 18vh">		</div>
							
				<div class="center-table banner-design">
					 <legend>참여 인원</legend>
				</div>
				<div style="padding-bottom: 18vh">		</div>	

			</div>

			<img src="./sub_logo.png" style="width: 70vw; height: 12vh;">
			</div>
				
			<div style="padding-bottom: 50px">		</div>
		
			<div style="text-align: center;">
			
				<div id="datepicker" class="center-table" data-language='en'></div>
				<div style="padding-bottom: 45px">		</div>
				
				<form action="page_3.php" method="POST">
					<div style="text-align: center	">
						이름: <input type="text" class="beatiful-btn" style="color: #7f7f7f;" name="user_name">
					</div>
					
					<div style="padding-bottom: 60px">		</div>

					<div class="div_design">	
						<div style="text-align: left; ">
							날짜: <input type="text" class="beatiful-btn datepicker-here" style="color: #7f7f7f; background-color: #d9d9d9;" name="select_date" data-language='en'>
						</div><br>	
						
						<input type="time" name="start_time"> ~ <input type="time" name="last_time">
						<br><br>
						
						<div style="text-align: center; "> 	
							<div id=DetailDiv> </div>
							<input type="button" value="시간 추가하기" class="create_time" onclick="detailPrc()">
						</div>
						
						<div style="padding-bottom: 10px">		</div>
						<input type="submit" class="button_design_date" value="일자별 등록">
			
					</div>
					
				</form>
				
				<div style="padding-bottom: 20px">		</div>
				<a href="result.php" class="click button_design btn btn-lg" style="background-color: #fed7a1; color: white;">등록</a>
				
			</div>
			
			
			<div style="padding-bottom: 80px;"></div>
		</div>
		
		<script>
			$(function(){
				$(window).resize();
			});
			
			$(window).resize(function(){
				$("#main-frame").css("margin-top", "calc(30vh - " + $("#main-frame").height() / 2 + "px - 1vh)");
			});
			
			$(window).resize( function() {
				$( "#datepicker" ).datepicker();
			} );

			

			function detailPrc() {	
				msg = "<input type=time name=start_time> ~ <input type=time name=last_time><br><br>";	
				DetailDiv.innerHTML += msg;	
			}

			function openRightMenu() {
			  document.getElementById("rightMenu").style.display = "block";
			}

			function closeRightMenu() {
			  document.getElementById("rightMenu").style.display = "none";
			}

		</script>
	</body>	
</html>
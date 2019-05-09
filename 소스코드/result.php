
<?php

	$conn = mysqli_connect("localhost", "whtjswn1029", "s971029", "whtjswn");
	$sql = "SELECT first_day, final_day FROM login WHERE no=1";
	$result = mysqli_query($conn, $sql);
	
	$row = mysqli_fetch_assoc($result);
	
	
	$time = array();
	
	$day = $row[first_day];
	$i=0;
	echo "day : $day<br>";
	$day = strtotime("$day +1 days");
	echo "day : $day<br>";
	
	$sql = "SELECT start_time, last_time, date FROM schedule WHERE (room_num = 1)&&(date = day)";
	$result = mysqli_query($conn, $sql);
	$timeData = mysqli_fetch_assoc($result);
	$t = $timeData[start_time];
	echo "plus : $t<br>";
	$t = strtotime("$t +1 hours");
	echo "plus : $t<br>";
	
	


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
		
	
	</head>
	
	<body>
	
	<div id="main-frame">
		<div class="result-top-design" style="padding-top: 10%; padding-bottom: 4%;"	>
				<h4 style="font-size: 1.3rem; color: #fff;">일정 등록하느라 고생 많았어요!<br><br>
				뒷일은 저에게 맡기고!<br>뭐하고 놀지 고민하세요!<br></h4>
		</div>
	
		<div style="padding-bottom: 50px">		</div>
		<div class="div_design" style="text-align: center; height: 84vh;" >
			<h5 style="font-size: 1.5rem; color: #302c2c; font-weight: bold"><br>실시간 일정 순위</h5>
			<div style="padding-bottom: 50px">		</div>

			<div class="center-table" style="background-color: #efefef;">
				<div class="result-box-design"> 1.   1/22&nbsp&nbsp(월)
					<div class="result-time-design">
						시간  :  16시~04시
					</div>
				</div>
			</div>
			<div style="padding-bottom: 50px">		</div>
			
			<div class="center-table" style="background-color: #efefef;">
				<div class="result-box-design"> 2.   1/24&nbsp&nbsp(수)
					<div class="result-time-design">
						시간  :  16시~04시
					</div>
				</div>
			</div>
			<div style="padding-bottom: 50px">		</div>
			
			<div class="center-table" style="background-color: #efefef;">	
				<div class="result-box-design"> 3.   1/23&nbsp&nbsp(화)
					<div class="result-time-design">
						시간  :  16시~04시
					</div>
				</div>
			</div>
		</div>		

		<div style="padding-bottom: 40px">		</div>
		<div style="display: inline-block; width: 8px"></div>
		
		<input type="button" onclick = "location.href = '#' " class="click button_design btn btn-lg result-button-design" value="등록">		
		<input type="button" onclick = "location.href = 'page2_1.php' " class="click button_design btn btn-lg result-button-design" value="기간연장">				
		<div style="padding-bottom: 40px">		</div>
	</div>
		

	
	<script>
		$(function(){
			$(window).resize();
		});
		
		$(window).resize(function(){
			$("#main-frame").css("margin-top", "calc(50vh - " + $("#main-frame").height() / 2 + "px - 10vh)");
			$("#login-btn").css("height", $(".login_style").height() + "px");
		});

	</script>
	
	</body>
</html>
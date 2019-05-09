
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="description" content="로그인 페이지입니다!">
		<title>Login page</title>
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<link rel="stylesheet" href="./css/style.css">
		
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	
	</head>
	
	<body>
		<div id="main-frame" class="login text-center">
			<div style="padding-bottom: 10px; padding-top: 50px">		</div>
			<img src="./main_logo.png" width="450px" height="440px">
		
			<div class=" login-input " style="box-sizing: content-box;">
				<input type="text"  class="form-control login_page beautiful_textbox" name="room_name" id="room_name" placeholder="방 이름">
			</div>

			<div style="padding-bottom: 80px;"></div>

			<div class="form-group login-input"style="box-sizing: content-box;">
				<input type="password" class="form-control login_page beautiful_textbox" name="password" id="password" placeholder="비밀번호">
			</div>
			
			<div style="padding-bottom: 60px;"></div>
			
			<button style="font-size: 2.1rem; padding-top: 2.0rem; padding-bottom: 2.0rem;" class="btn login_button_design btn-lg btn-block click" onclick="login()">등록</button>
			
			
			<div style="padding-bottom: 40px;"></div>
			
			<div style="text-align: center;">
				<a href="page2_1.php" style="font-size: 1.9rem; color: #a6a6a6;" class="login_create_room">방 새로 만들기</a>
			</div>
			<div style="padding-bottom: 60px;"></div>
		
		</div>
		
		
		<script>
			$(function(){
				$(window).resize();
				loginInit();
			});
			
			$(window).resize(function(){
				$("#main-frame").css("margin-top", "calc(50vh - " + $("#main-frame").height() / 2 + "px - 1vh)");
			});
			
			function loginInit() {
				$("#room_name, #password").keyup(function(e){
					if (e.keyCode == 13) login();
				});
				
			}
			
			function login() {
				var roomName = $("#room_name").val();
				var password = $("#password").val();
				
				$.ajax({
					url: "login_php.php",
					type: "POST",
					data: {
						room_name: roomName,
						password: password
					},
					
					success:function(jsonData) {
						var decodeData = JSON.parse(jsonData);
						
						alert(decodeData['context']);
						if (decodeData['state']) {
							location.href = "page_3.php";
						}z
					}
					
					
				});
				
			}
		</script>
	</body>
</html>
<?php 
	session_start();
		if(isset($_SESSION['username'])) {
			header('Location: ' . 'info.php');
	}else{

?>

 
<!DOCTYPE html>
<html>
	<head>
	<title>Krish Works</title>
	    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="login.css">
		<script src="jquery-v3.6.js"></script>

		<script src="https://www.gstatic.com/firebasejs/ui/4.8.1/firebase-ui-auth.js"></script>
		<link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/4.8.1/firebase-ui-auth.css" />
<script>
	$(document).ready(function(){
		
		$("#sign_up").click(function(){
			var username = $("#sign_up_username").val();
			var email = $("#sign_up_email").val();
			var pwd = $("#sign_up_pswd").val();
			
			
			if (username.length == 0)  {
				alert('username is empty');
			}
			else if(email.length == 0)
			{
				alert('email is empty');
			}
			else if(pwd.length <= 6)
			{
				alert('Password should be at least 6 characters');
			}
			else{
				
			
			var url ="https://www.googleapis.com/identitytoolkit/v3/relyingparty/signupNewUser?key=AIzaSyClTCMDlrEg2X18KhfIL4R_QqbFpQUQc5Y";
			var data = "displayName="+username+"&email="+email+"&password="+pwd;
			
			
			$.ajax({
				url:url, 
				type:"POST",
				data:data,
				dataType:"json",
				success: function(result){
					
					var data = "username="+result.displayName; //"username="+username;
					
					$.ajax({
								url:"dashboard.php", 
								type:"POST",
								data:data,
								//dataType:"json",
								crossDomain: true,
								success: function(result){
								
									window.location.href = "info.php";
								}
								
							});
					
				},
				error: function(result){
					alert("Email ID Already Exits please try again");
					var username = $("#sign_up_username").val("");
					var email = $("#sign_up_email").val("");
					var pwd = $("#sign_up_pswd").val("");	
				}
			});
			}
			
			
			
		});
		//login validation
		$("#log_in").click(function(){
			
			var email = $("#log_in_email").val();
			var pwd = $("#log_in_password").val();
			
			var url ="https://www.googleapis.com/identitytoolkit/v3/relyingparty/verifyPassword?key=AIzaSyClTCMDlrEg2X18KhfIL4R_QqbFpQUQc5Y";
			
			var data = "email="+email+"&password="+pwd;
			
			
			$.ajax({
				url:url, 
				type:"POST",
				data:data,
				dataType:"json",
				success: function(result){
					
					
					var data = "username="+result.displayName;
					
					$.ajax({
								url:"dashboard.php", 
								type:"POST",
								data:data,
								//dataType:"json",
								crossDomain: true,
								success: function(result){
								
									window.location.href = "info.php";
								}
								
							});
					
				},
				error: function(result){
					alert("Invalid Login Credentials");	
				}
			});
			
		});
		
		
	});

</script>
	</head>
	<body>
		<div class="login_box">
			<div class="first_row">
				<div class="left_box">
					<h2> Sign Up </h2>
					<form action="">
						<input type="text" placeholder="User Name" class="form_control" id="sign_up_username" required>
						<input type="email" placeholder="Email"  class="form_control" id="sign_up_email" required>
						<input type="password" placeholder="Password" class="form_control" id="sign_up_pswd" required>
						<input type="button" value="Submit" class="button" id="sign_up">
					</form>
				</div>
				
			</div>
			<div class="second_row">
			
				<div class="right_box">
					<h2> Sign In </h2>
					<form action="" method="post">
						<input type="email" placeholder="Email"  class="form_control" id="log_in_email" required>
						<input type="password" placeholder="Password" class="form_control" id="log_in_password" required>
						<input type="button" value="Login" class="button" id="log_in">
						<a href="forget_pass.php"  class="link" id='forget_pass'>Forget Password ?</a>
					</form>
				</div>
				
			</div>
		</div>
	
	</body>
	
</html> 
	<?php } ?>
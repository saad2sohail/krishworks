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
		
				$("#send").click(function(){
					var email = $("#forget_email").val();
					var url   = "https://identitytoolkit.googleapis.com/v1/accounts:sendOobCode?key=AIzaSyClTCMDlrEg2X18KhfIL4R_QqbFpQUQc5Y";
					var data = "req_type="+"PASSWORD_RESET"+"&email="+email;
					$.ajax({
						url:url, 
						type:"POST",
						data:data,
						//dataType:"json",
						crossDomain: true,
						success: function(result){
							alert("Email has been sent successfully");	
							window.location.href = "index.php";
						},
						error: function(error){
							alert("Please Enter Valid Email Address");
						}	
								
					});
				});
				
			});
		</script>
	</head>
	<body>
		<div class="login_box" style="text-align:center;">
			<p >Enter your Register Email Address</p>
			<input type="email" placeholder="Email Adress"  class="form_control" id="forget_email" required>
			<button class="button" id="send">Send</button>
			<button class="button cancel" id="cancel"><a href="index.php">Cancel</a></button>
		</div>	
	</body>
	
</html> 
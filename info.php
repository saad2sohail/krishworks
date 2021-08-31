<?php 
	session_start();
		if(isset($_SESSION['username'])) {
			
	

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
		
				$("#log_out").click(function(){
					var val = 1;
					var data = "log_out="+val;
					$.ajax({
						url:"dashboard.php", 
						type:"POST",
						data:data,
						//dataType:"json",
						crossDomain: true,
						success: function(result){
								
							window.location.href = "index.php";
						}
								
					});
				});
			});
		</script>
	</head>
	<body>
		<div class="login_box">
			<span class="info"> profile name
				<h3>
				<?php
					session_start();
					echo $_SESSION['username'];
				?></h3>
			</span>
			<button class="button" id="log_out">Logout</button>
		</div>	
	</body>
	<?php 
		}else{
			header('Location: ' . 'index.php');
		}
	?>
</html> 
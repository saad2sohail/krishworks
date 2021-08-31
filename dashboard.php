<?php 
	
	session_start();
	
	
	if(isset($_POST['username'])) {
		
		$_SESSION['username'] = $_POST['username'];
		
		
	}else if(isset($_POST['log_out'])){
		session_destroy();
		header("location: index.php");
	}else{
		echo $_SESSION['error'];
	}
	

 ?>
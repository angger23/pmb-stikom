<?php 
	if(isset($_POST['log']) && isset($_POST['username']) && isset($_POST['password'])){

		// filter inputan username
		$_SESSION['user'] = $_POST['username'];
		$_SESSION['user'] = stripslashes($_SESSION['user']);
		$_SESSION['user'] = mysqli_real_escape_string($conn,$_SESSION['user']);

		// filter inputan password
		$_SESSION['pass'] = $_POST['password'];
		$_SESSION['passq'] = mysqli_real_escape_string($conn,stripslashes($_SESSION['pass']));
		$_SESSION['pass'] = stripslashes($_SESSION['pass']);
		$_SESSION['pass'] = mysqli_real_escape_string($conn,$_SESSION['pass']);
		$_SESSION['pass'] = password_hash($_SESSION['pass'], PASSWORD_DEFAULT);
	}

	if(isset($_GET['logout'])){
		session_destroy();
		header('Location:?p=login');
	}
 ?>

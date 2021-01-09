<?php 
error_reporting(E_ALL & ~E_NOTICE);

	session_start();
	include 'conn.php';
	include 'database.php';
	include 'login/login_set.php';
	include 'login/login_cek.php';


	$get_events = $db->semua($conn,'jadwal_all');
	echo json_encode($get_events);

?>
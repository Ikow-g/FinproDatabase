<?php  
	session_start();

	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db_name = 'db_inventaris';

	$connect = mysqli_connect($host, $user, $pass, $db_name);

	if (!$connect) {
		die('Connection failed'. mysqli_connect_error());
	}
?>
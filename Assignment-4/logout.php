<?php
	include 'connect.php';
	session_start();
	echo"Goodbye".$_SESSION['name'];
	session_destroy();
	$conn=NULL;
	header('Location: http://localhost/example/index.html');
?>
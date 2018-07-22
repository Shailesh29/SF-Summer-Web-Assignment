<!DOCTYPE html>
<html>
<?php
	include 'connect.php';
	session_start();
	$_SESSION['username']=$_POST['username'];
	$_SESSION['password']=$_POST['password'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$id=$conn->prepare("SELECT name,password,type
    FROM userinfo
    WHERE username='$username'
    ");
	$id->execute();
	$result=$id->fetch();
	$_SESSION['name']=$result['name'];
	$_SESSION['type']=$result['type'];
	if($result[1]==$password && $result[2]=='user'){
		header('Location: http://localhost/example/user.php');
	}
	elseif ($result[1]==$password && $result[2]=='admin'){
		header('Location: http://localhost/example/admin.php');
	}
	else
	{
		session_destroy();
		$conn=NULL;
		header('Location: http://localhost/example/error.php');
	}
?>

</html>
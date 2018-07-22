<?php
	include 'connect.php';
	$name=$_POST['name'];
    $username=$_POST['username'];
    $password=$_POST['password'];
   	$type=$_POST['type'];
    	$sql="INSERT INTO userinfo(name,username,password,type)
    	VALUES('$name','$username','$password','$type')
    	";
    	$conn->exec($sql);
    if($type=='user')
    {
    	$sql=("CREATE TABLE $username(
    		ID int NOT NULL,
    		book_name VARCHAR(30) NOT NULL
    	)");
    	$conn->exec($sql);
    }
    header('Location:http://localhost/example/index.html');
?>
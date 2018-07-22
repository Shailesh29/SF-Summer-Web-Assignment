<?php
	include 'connect.php';
	$name=$_POST['inp'];
	$s=$conn->prepare("SELECT username From userinfo");
	$s->execute();
	$s->setFetchMode(PDO::FETCH_ASSOC);
	$a=0;
	while ($row = $s->fetch()) {
	if($name==$row['username']){
		$a=1;
		echo "Username already exists";
	}
	}
	if($a!=1)
		echo "Good username";
?>

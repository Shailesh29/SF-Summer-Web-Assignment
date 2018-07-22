<?php
	$name=$_POST['pass'];
	if(strlen(''.$name)<6)
		echo "Weak password";
	else if(strlen(''.$name)>10)
		echo "Too long Password";
	else
		echo "Good Password";
?>

<?php
include 'connection.php';


$username=mysqli_real_escape_string($con, $_POST['username']);
$password=mysqli_real_escape_string($con, $_POST['password']);
$email=mysqli_real_escape_string($con, $_POST['email']);
$repeatPassword=mysqli_real_escape_string($con, $_POST['repratPassword']);
$repeatEmail=mysqli_real_escape_string($con, $_POST['repeatEmail']);

if(strcmp($password, $repeatPassword)!=0)
{
	if(strcmp($email, $repeatEmail)==0)
	{
		$query="INSERT INTO login(username, password, email) VALUES ('$username', '$password', '$email')";
		if(!mysqli_query($con, $query))
		{
			header("Location: home1.php?msg=2");//error
		}
		else
		{
			header("Location: home1.php?msg=1");//success
		}	
	}
	else
	{
		header("Location: home1.php?msg=3");//email not good
	}
}
else
{
	header("Location: home1.php?msg=3");//password not good
}



?>
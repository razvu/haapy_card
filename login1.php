<!DOCTYPE html>
<?php

session_start();

include 'connection.php';
	

	if(isset($_POST["username"]) and isset($_POST["password"]))
	{
		
		$myusername=mysqli_real_escape_string($con,$_POST["username"]);
		$mypassword=mysqli_real_escape_string($con,$_POST["password"]);
		$sql="SELECT * from login WHERE username='$myusername' AND password='$mypassword'";
		$res=mysqli_query($con,$sql);
		if(mysqli_num_rows($res)==1)
		{
			
	$query=$con->query("SELECT admin FROM login WHERE username='$myusername'");
	$array =array();

	if (mysqli_num_rows($query))
	{
		$rows=mysqli_fetch_array($query);
		$admin=(($rows['admin']));
		if($admin)
		{ 
			$_SESSION['admin']=true;
			header("refresh:0;url=systemManegerInterface.php");
			exit();
		}
		else
		{
			$_SESSION['u-name'] = $myusername;
			$_SESSION['permission']=true;
		}
	}

		
		}
		else
		{

			header("Location: home1.php?msg=4");

		}

	}
	
	mysqli_close($con);
?>

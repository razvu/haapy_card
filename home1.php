<!DOCTYPE html>
<?php 
session_start();
if(isset($_SESSION['posix_errno()mission']) && !empty($_SESSION['permission']))
{
	header("Location: pages.php?");
}
else if(isset($_SESSION['admin']) && !empty($_SESSION['admin']))
{
header("refresh:0;url=systemManegerInterface.php");
			exit();
}
?>
<html dir="rtl">
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css\home.css">
	<title>HAPPY CARD</title>
	<script >
	function checkuser(val)
	{
		$.ajax({
			type:"POST",
			url:"checkusername.php",
			data:'username='+val,
			success:function(data){
				$("#messag").html(data);
			}
		});
	}
	
	function checkemail(val)
	{
		$.ajax({
			type:"POST",
			url:"checkemail.php",
			data:'email='+val,
			success:function(data){
				$("#emailmessag").html(data);
			}
		});
	}
	</script>
</head>
<body>
<img id="logo" src="logo.png">
<div id="login">	
<form method="POST" action="pages.php">
<h2>התחברות</h2>
<label>שם משתמש: </label>
<input type="text" name="username" placeholder="username" required autofocus >
<label> סיסמא: </label>
<input type="password" name="password" placeholder="password" required>
<input type="submit" name="submit" value="התחבר" ><br>
</form>
</div>
<div id="index">
<form method="POST" action="register.php">
<h2>הרשמה</h2>
<label>שם משתמש: </label>
<input type="text" name="username" placeholder="username" onkeyup="checkuser(this.value)" required><br>
<div id="messag"></div>
<label>סיסמא: </label>
<input type="password" name="password" placeholder="password" required><br>
<label>הזן סיסמא שנית: </label>
<input type="password" name="repeatPassword" placeholder="password" required><br>
<label> אימייל: </label>
<input type="text" name="email" placeholder="email" onkeyup="checkemail(this.value)" required><br>
<div id="emailmessag"></div>
<label>הזן אימייל שנית: </label>
<input type="text" name="repeatEmail" placeholder="email" required><br>
<input type="submit" name="submit" value="הרשם" ><br><br><br><br><br><br>
</form>
</div>
<div id="preview">
<p id="description"> אתר זה מרכז ברכות לסוגי אירועים שונים לשימושכם האישי . <br> ההרשמה לאתר היא בחינם !</p>
</div>
<?php
	if(isset($_GET['msg']))
	{
		$message= $_GET['msg'];
		if($message==1)
		{
			echo "<script type='text/javascript'>alert('נרשמת בהצלחה');</script>";
			header("refresh:2; url=home1.php");
		}
		if($message==2)
		{
			echo "<script type='text/javascript'>alert('ההרשמה נכשלה');</script>";
			header("refresh:2; url=home1.php");
		}
		if($message==3)
		{
			echo "<script type='text/javascript'>alert('אימייל או סיסמא לא תואמים	');</script>";
			header("refresh:2; url=home1.php");
		}
		if($message==4)
		{
			echo "<script type='text/javascript'>alert('שם משתמש או סיסמא שגויים	');</script>";
			header("refresh:2; url=home1.php");
		}

	}

	

?>

</body>
</html>
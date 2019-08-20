<?php
	session_start();
	if($_SESSION['flogin']==0)
	{
		echo '<meta http-equiv="refresh" content="0; URL=loggedout.php">';
	}
	$_SESSION['added']=1;
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		button
		{
			font-size: 17;
			background-color: pink;
		}
		button:hover
		{
			background-color: blue;
		}
		p
		{
			font-size: 75px;
			color: blue;
			margin-top: 130px;
		}
	</style>
	<link rel="icon" href="win.JPG">
	<title>ADDED</title>
</head>
<body style="background-image: url('race.JPG');">
	<a href="faculty.php"><button>HOME</button></a>
	<a href="flogout.php" id="log"><button>LOGOUT</button></a>
	<center>
		<p>QUESTION ADDED SUCCESFULLY</p>
	</center>
</body>
</html>
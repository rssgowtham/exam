<?php
	session_start();
	if($_SESSION['hlogin']==0)
	{
		echo '<meta http-equiv="refresh" content="0; URL=loggedout.php">';
	}
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
			margin-top: 300px;
		}
	</style>
	<link rel="icon" href="win.JPG">
	<title>REMOVED</title>
</head>
<body style="background-image: url('race.JPG');">
	<a href="hod.php"><button>HOME</button></a>
	<a href="hlogout.php" id="log"><button>LOGOUT</button></a>
	<center>
		<p>FACULTY REMOVED SUCCESFULLY</p>
	</center>
</body>
</html>
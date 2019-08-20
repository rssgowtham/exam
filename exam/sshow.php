<?php
session_start();
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
	<title>MARKS</title>
</head>
<body style="background-image: url('race.JPG');">
	<a href="student.php"><button>HOME</button></a>
	<a href="slogout.php" id="log"><button>LOGOUT</button></a>
	<center>
		<?php
	if($_SESSION['slogin']==0)
	{
		echo '<meta http-equiv="refresh" content="0; URL=loggedout.php">';
	}
	echo "<p style=\"font-size:50\"> YOUR MARKS  =  ".$_SESSION['marks']."</p>";
?>
	</center>
</body>
</html>
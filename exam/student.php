<?php
	session_start();
	if($_SESSION['slogin']==0)
	{
		echo '<meta http-equiv="refresh" content="0; URL=loggedout.php">';
	}
?>
<html>
	<head>
		<style type="text/css">
			#test
			{
				margin-top: 50;
			}
			#marks
			{
				margin-left: 70;
				margin-top: 50;
			}
			button
			{
				font-size: 17;
				width:150;
				height:150;
				background-color: pink;
			}
			button:hover
			{
				background-color: blue;
			}
		</style>
		<link rel="icon" href="win.JPG">
		<title>STUDENT</title>
	</head>
	<body style="background-image: url('race.JPG');">
		<a href="slogout.php" id="log"><button>LOGOUT</button></a>
		<center>
			<a href="test.php"><button id="test">TAKE<br/>EXAM</button>
			<a href="smarks.php"><button id="marks">MARKS</button></a>
		</center>
	</body>
</html>
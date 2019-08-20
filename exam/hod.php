<?php
    session_start();
    $temp=$_SESSION['hlogin'];
	if($temp==0)
	{
		echo '<meta http-equiv="refresh" content="0; URL=loggedout.php">';
	}
?>
<html>
	<head>
		<style type="text/css">
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
			#home,#log
			{
				width: auto;
				height:auto;
			}
		</style>
		<link rel="icon" href="win.JPG">
		<title>HOD</title>
	</head>
	<body style="background-image: url('race.JPG');">
		<a href="hlogout.php" id="log"><button>LOGOUT</button></a>
		<center> 
				<a href="hmarks.php"><button id="marks">MARKS</button></a>
				<br/>
				<a href="addfaculty.php"><button id="addfac">ADD<br/>FACULTY</button></a>
				<a href="removefaculty.php"><button id="remfac">REMOVE<br/>FACULTY</button>
				<br/>
				<a href="starttest.php"><button id="start">START<br/>TEST</button></a>
				<a href="stoptest.php"><button id="stop">STOP<br/>TEST</button>
		</center>
	</body>
</html>
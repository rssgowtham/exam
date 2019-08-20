<?php
	session_start();
	if($_SESSION['admin']==0)
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
		</style>
		<link rel="icon" href="win.JPG">
		<title>FACULTY</title>
	</head>
	<body style="background-image: url('race.JPG');">
		<a href="flogout.php" id="log"><button>LOGOUT</button></a>
		<center>
			<table>
			<tr>
				<td>
				<a href="fmarks.php"><button id="marks">MARKS</button></a>
				</td>
				<td>
				<a href="clear.php"><button id="clear">CLEAR<br/>QUESTIONS</button></a>
				</td>
			</tr>
			<tr>
				<td>
				<a href="addstudent.php"><button id="addst">ADD<br/>STUDENT</button></a>
				</td>
				<td>
				<a href="removestudent.php"><button id="remst">REMOVE<br/>STUDENT</button></a>
				</td>
			</tr>
			<tr>
				<td>
				<a href="addquestion.php"><button id="addq">ADD<br/>QUESTION</button></a>
				</td>
				<td>
				<a href="removequestion.php"><button id="remq">REMOVE<br/>QUESTION</button></a>
				</td>
			</tr>
		</table>
		</center>
	</body>
</html>
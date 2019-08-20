<?php
	session_start();
	if($_SESSION['hlogin']==0)
	{
		echo '<meta http-equiv="refresh" content="0; URL=loggedout.php">';
	}
	else
	{
		$connection=mysqli_connect("localhost", "id7922903_root", "password", "id7922903_exam");
		mysqli_query($connection,"UPDATE `students` SET `taken`=1");
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
			margin-top: 130px;
		}
	</style>
	<link rel="icon" href="win.JPG">
	<title>TEST STOP</title>
</head>
<body style="background-image: url('race.JPG');">
	<a href="hod.php" id="home"><button>HOME</button></a>
	<a href="hlogout.php" id="log"><button>LOGOUT</button></a>
	<center>
	<?php
	echo "<p style=font-size:50> TEST STOPPED</p>";
    ?>
	</center>
</body>
</html>
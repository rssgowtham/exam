<?php
	session_start();
	if($_SESSION['flogin']==0)
	{
		echo '<meta http-equiv="refresh" content="0; URL=loggedout.php">';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="win.JPG">
	<title>REMOVE STUDENT</title>
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
		div
		{
			margin-top: 300px;
			background-color: lightgrey;
			width:400px;
			height: auto;
		}
		p
		{
			font-size: 20px;
		}
		#submit,#reset
		{
			margin-left: 50px;
			font-size: 20px;
		}
		#submit:hover,#reset:hover
		{
			background-color: white;
		}
	</style>
</head>
<body style="background-image: url('race.JPG');">
	<a href="faculty.php"><button>HOME</button></a>
	<a href="flogout.php" id="log"><button>LOGOUT</button></a>
	<center>
		<div >
			<br/><br/>
			<?php
	if(isset($_REQUEST['submited']))
	{
		$stid=$_REQUEST['stid'];
		if($stid!='')
		{
			$connection=mysqli_connect("localhost", "id7922903_root", "password", "id7922903_exam");
			$query=mysqli_query($connection,"SELECT `id` FROM `students` WHERE `id`='$stid'");
			if(mysqli_num_rows($query)>0)
			{
				mysqli_query($connection,"DELETE FROM `students` WHERE `id`='$stid'");
				echo '<meta http-equiv="refresh" content="0; URL=stremoved.php">';
			}
			else
			{
				echo "STUDENT DOESN'T EXIST";
			}
		}
		else
		{
			echo "ENTER STUDENT ID";
		}
	}
?>
		<form action="removestudent.php" method="POST">
			<table>
				<tr>
					<td>
						<p>STUDENT ID&ensp;&ensp;</p>
					</td>
					<td>
						<input type="text" name="stid">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" id="submit" name="submited" value="submit">
					</td>
					<td>
						<input type="reset" id="reset" name="reset" value="reset">
					</td>
				</tr>
			</table>
		</form>
		</div>
	</center>
</body>
</html>
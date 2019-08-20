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
	<title>ADD STUDENT</title>
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
			margin-top: 200px;
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
		<div>
			<br/><br/>
			<?php
	if(isset($_REQUEST['submited']))
	{
		$stid=$_REQUEST['stid'];
		$username=$_REQUEST['uname'];
		$passwd=$_REQUEST['pwd'];
		$cpwd=$_REQUEST['cpwd'];
		if($stid!='' and $username!='' and $passwd!='' and $cpwd!='')
		{
			if($passwd!=$cpwd)
			{
				echo "PASSWORD NOT MATCHED";
			}
			else
			{
				$connection=mysqli_connect("localhost", "id7922903_root", "password", "id7922903_exam");
				$query=mysqli_query($connection,"SELECT `id` FROM `students` WHERE `id`='$stid' or `username`='$username'");
				if(mysqli_num_rows($query)==0)
				{
					mysqli_query($connection,"INSERT INTO `students`(`id`, `username`, `password`, `marks`, `taken`, `DateAndTime`) VALUES ('$stid', '$username', '$passwd',0, 0, NOW())");
					echo '<meta http-equiv="refresh" content="0; URL=stadded.php">';
				}
				else
				{
					echo "STUDENT ALREADY EXISTS";
				}
			}
		}
		else
		{
			if($stid=='')
					{
						echo nl2br("ENTER STUDENT ID\n");
					}
					if($username=='')
					{
						echo nl2br("ENTER USERNAME\n");
					}
					if($passwd=='')
					{
						echo nl2br("ENTER PASSWORD\n");
					}
					if($cpwd=='')
					{
						echo nl2br("ENTER CONFIRM PASSWORD\n");
					}
		}
	}
?>
		<form action="addstudent.php" method="POST">
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
						<p>USERNAME</p>
					</td>
					<td>
						<input type="text" name="uname">
					</td>
				</tr>
				<tr>
					<td>
						<p>PASSWORD</p>
					</td>
					<td>
						<input type="password" name="pwd">
					</td>
				</tr>
				<tr>
					<td>
						<p>CONFIRM<br/>PASSWORD</p>
					</td>
					<td>
						<input type="password" name="cpwd">
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
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
	<link rel="icon" href="win.JPG">
	<title>ADD FACULTY</title>
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
	<a href="hod.php"><button>HOME</button></a>
	<a href="hlogout.php" id="log"><button>LOGOUT</button></a>
	<center>
		<div >
			<br/><br/>
			<?php
	if(isset($_REQUEST['submited']))
	{
		$facid=$_REQUEST['facid'];
		$username=$_REQUEST['uname'];
		$passwd=$_REQUEST['pwd'];
		$cpwd=$_REQUEST['cpwd'];
		if($facid!='' and $username!='' and $passwd!='' and $cpwd!='')
		{
			if($passwd!=$cpwd)
			{
				echo "PASSWORD NOT MATCHED";
			}
			else
			{
				$connection=mysqli_connect("localhost", "id7922903_root", "password", "id7922903_exam");
				$query=mysqli_query($connection,"SELECT `facid` FROM `faculty` WHERE `facid`='$facid' or `username`='$username'");
				if(mysqli_num_rows($query)==0)
				{
					mysqli_query($connection,"INSERT INTO `faculty`(`facid`, `username`, `password`, `DateAndTime`) VALUES ('$facid', '$username', '$passwd', NOW())");
					echo '<meta http-equiv="refresh" content="0; URL=facadded.php">';
				}
				else
				{
					echo "FACULTY ALREADY EXISTS";
				}
			}
		}
		else
		{
			if($facid=='')
			{
				echo nl2br("ENTER FACULTY ID\n");
			}
			if ($username=='') 
			{
				echo nl2br("ENTER USERNAME\n");
			}
			if ($passwd=='') 
			{
				echo nl2br("ENTER PASSWORD\n");
			}
			if ($cpwd=='') 
			{
				echo nl2br("ENTER CONFIRM PASSWORD\n");
			}
		}
	}
?>
		<form action="addfaculty.php" method="POST">
			<table>
				<tr>
					<td>
						<p>FACULTY ID&ensp;&ensp;</p>
					</td>
					<td>
						<input type="text" name="facid">
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
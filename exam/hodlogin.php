<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="win.JPG">
	<title>HOD LOGIN</title>
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
	<a href="index.php"><button>MAIN PAGE</button></a>
	<center>
		<div >
			<?php
	$_SESSION['hlogin']=0;
	if(isset($_REQUEST['submited']))
	{
		$username=$_REQUEST['uname'];
		$passwd=$_REQUEST['pwd'];
		if($username!='' and $passwd!='')
		{
				$connection=mysqli_connect("localhost", "id7922903_root", "password", "id7922903_exam");
				$query=mysqli_query($connection,"SELECT `id` FROM `hod` WHERE `username`='$username' and `password`='$passwd'");
				if(mysqli_num_rows($query)>0)
				{
					$_SESSION['hlogin']=1;
					echo '<meta http-equiv="refresh" content="0; URL=hod.php">';
				}
				else
				{
					echo "INVALID DETAILS";
				}
		}
		else
		{
			if($username!='')
			{
				echo "ENTER PASSWORD";
			}
			elseif ($passwd!='') {
				echo "ENTER USERNAME";
			}
			else
			{
				echo nl2br("ENTER USERNAME\n\n");
				echo "ENTER PASSWORD";
			}
		}
	}
?>
		<form action="hodlogin.php" method="POST">
			<table>
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
					<td>
						<input type="submit" id="submit" name="submited" value="login">
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
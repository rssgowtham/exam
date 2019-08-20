<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="win.JPG">
	<title>ANSWER</title>
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
			margin-top: 150px;
			background-color: lightgrey;
			width:600px;
			height: auto;
		}
		p
		{
			font-size: 20px;
		}
		#submit
		{
			margin-left: 250px;
			font-size: 20px;
		}
		#reset
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
	<a href="hod.php" id="home"><button>HOME</button></a>
	<a href="hlogout.php" id="log"><button>LOGOUT</button></a>
	<center>
		<div >
			<br/><br/>
			<?php
	if($_SESSION['added']==1)
	{
		echo '<meta http-equiv="refresh" content="0; URL=qadded.php">';
	}
	if($_SESSION['flogin']==0)
	{
		echo '<meta http-equiv="refresh" content="0; URL=loggedout.php">';
	}
	else
	{
	if(isset($_REQUEST['submited']))
	{
		$_SESSION['ans']=$_REQUEST['ans'];
		$qno=$_SESSION['qno'];
		$q=$_SESSION['q'];
		$opt1=$_SESSION['opt1'];
		$opt2=$_SESSION['opt2'];
		$opt3=$_SESSION['opt3'];
		$opt4=$_SESSION['opt4'];
		$ans=$_SESSION['ans'];
		$connection=mysqli_connect("localhost", "id7922903_root", "password", "id7922903_exam");
		mysqli_query($connection,"INSERT INTO `questions`(`qno`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`) VALUES ($qno,'$q','$opt1','$opt2','$opt3','$opt4',$ans)");
		echo '<meta http-equiv="refresh" content="0; URL=qadded.php">';
	}
	}
?>
		<form action="ans.php" method="POST">
			<table>
				<tr>
					<td>
						<p>CORRECT<br/>OPTION&ensp;&ensp;</p>
					</td>
					<td>
						<select name="ans">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<input type="reset" id="reset" name="reset" value="RESET">
					</td>
					<td>
						<input type="submit" id="submit" name="submited" value="NEXT">
					</td>
				</tr>
			</table>
		</form>
		</div>
	</center>
</body>
</html>

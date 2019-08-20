<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="win.JPG">
	<title>OPTION 1</title>
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
	<a href="faculty.php" id="home"><button>HOME</button></a>
	<a href="flogout.php" id="log"><button>LOGOUT</button></a>
	<center>
		<div>
			<br/><br/>
			<?php
	if($_SESSION['added']==1)
	{
		echo '<meta http-equiv="refresh" content="0; URL=qadded.php">';
	}
	else
	{
	if($_SESSION['flogin']==0)
	{
		echo '<meta http-equiv="refresh" content="0; URL=loggedout.php">';
	}
	if(isset($_REQUEST['submited']))
	{
		$opt=$_REQUEST['option'];
		if($opt!='')
		{
			$_SESSION['opt1']=$opt;
			echo '<meta http-equiv="refresh" content="0; URL=opt2.php">';
		}
		else
		{
			echo "FILL THE OPTION";
		}
	}
	}
?>
		<form action="opt1.php" method="POST">
			<table>
				<tr>
					<td>
						<p>OPTION 1&ensp;&ensp;</p>
					</td>
					<td>
						<textarea name="option" rows="20" cols="50"></textarea>
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
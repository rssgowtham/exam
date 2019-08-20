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
	<title>REMOVE QUESTION</title>
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
		$qid=$_REQUEST['qid'];
		if($qid!='')
		{
			$connection=mysqli_connect("localhost", "id7922903_root", "password", "id7922903_exam");
			$query=mysqli_query($connection,"SELECT `qno` FROM `questions` WHERE `qno`='$qid'");
			if(mysqli_num_rows($query)>0)
			{
				mysqli_query($connection,"DELETE FROM `questions` WHERE `qno`=$qid");
				echo '<meta http-equiv="refresh" content="0; URL=qremoved.php">';
			}
			else
			{
				echo "QUESTION DOESN'T EXIST";
			}
		}
		else
		{
			echo "ENTER QUESTION NUMBER";
		}
	}
?>
		<form action="removequestion.php" method="POST">
			<table>
				<tr>
					<td>
						<p>QUESTION<br/>NUMBER&ensp;&ensp;</p>
					</td>
					<td>
						<input type="text" name="qid">
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
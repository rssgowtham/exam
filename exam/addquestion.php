<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="win.JPG">
	<title>QUESTION</title>
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
			margin-top: 100px;
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
	<a href="faculty.php"><button>HOME</button></a>
	<a href="flogout.php" id="log"><button>LOGOUT</button></a>
	<center>
		<div >
			<br/><br/>
			<?php
	$_SESSION['added']=0;
	if($_SESSION['flogin']==0)
	{
		echo '<meta http-equiv="refresh" content="0; URL=loggedout.php">';
	}
	if(isset($_REQUEST['submited']))
	{
		$qno=$_REQUEST['qno'];
		$q=$_REQUEST['question'];
		if($qno!='' and $q!='')
		{
			$connection=mysqli_connect("localhost", "id7922903_root","password", "id7922903_exam");
			$query=mysqli_query($connection,"SELECT `qno` FROM `questions` WHERE `qno`='$qno'");
			if(mysqli_num_rows($query)!=0)
			{
				echo "question number already exist";
			}
			else
			{
				$_SESSION['qno']=$qno;
				$_SESSION['q']=$q;
				echo '<meta http-equiv="refresh" content="0; URL=opt1.php">';
			}
		}
		else
		{
			if($qno=='')
			{
				echo nl2br("ENTER QUESTION NUMBER\n\n");
			}
			if($q=='')
			{
				echo nl2br("ENTER QUESTION\n");
			}
		}
	}
?>
		<form action="addquestion.php" method="POST">
			<table>
				<tr>
					<td>
						<p>	QUESTION <br/>NUMBER&ensp;&ensp;</p>
					</td>
					<td>
						<input type="text" name="qno">
					</td>
				</tr>
				<tr>
					<td>
						<p>	QUESTION&ensp;&ensp;</p>
					</td>
					<td>
						<textarea name="question" rows="20" cols="50"></textarea>
					</td>
				</tr>
				<tr>
					<td>
						<input type="reset" id="reset" name="reset" value="reset">
					</td>
					<td>
						<input type="submit" id="submit" name="submited" value="next">
					</td>
				</tr>
			</table>
		</form>
		</div>
	</center>
</body>
</html>
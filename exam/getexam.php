<?php
	session_start();
	if($_SESSION['slogin']==0)
	{
		echo '<meta http-equiv="refresh" content="0; URL=loggedout.php">';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
		history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
	</script>
	<link rel="icon" href="win.JPG">
	<title>EXAM</title>
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
			margin-top: 130px;
			background-color: lightgrey;
			width:400px;
			height: auto;
		}
		text
		{
			font-size: 40px;
		}
		#next,#reset
		{
			margin-right: 20px;
			font-size: 20px;
		}
		#next:hover,#reset:hover
		{
			background-color: white;
		}
	</style>
</head>
<body style="background-image: url('race.JPG');">
	<center>
		<div >
			<br/><br/>
	<?php
	if(isset($_REQUEST['next']))
	{
		$connection=mysqli_connect("localhost", "id7922903_root", "password", "id7922903_exam");
		$count=$_SESSION['count'];
		if($_SESSION['number']<=$count)
		{
			$pq=$_SESSION['pq'];
			$query=mysqli_query($connection,"SELECT `answer` FROM `questions` where `qno`='$pq'");
			$data=mysqli_fetch_array($query);
			$ans=$data['answer'];
			$user=$_SESSION['sid'];
			$query1=mysqli_query($connection,"SELECT `marks` FROM `students` where `username`='$user'");
			$data1=mysqli_fetch_array($query1);
			$marks=$data1['marks'];
			if(!array_key_exists('opt', $_REQUEST))
			{
				echo "ENTER AN OPTION";
			}
			else
			{
				if($_REQUEST['opt']==$ans)
				{
					$marks=$marks+1;
					mysqli_query($connection,"UPDATE `students` SET `marks`='$marks' WHERE `username`='$user'");
				}
				$num=$_SESSION['number'];
				$num=$num+1;
				$_SESSION['number']=$num;
			}
		}
		if($_SESSION['number']>$count)
		{
			$_SESSION['number']=1;
			mysqli_query($connection,"UPDATE `students` SET `taken`=1 WHERE `username`='$user'");
			echo '<meta http-equiv="refresh" content="0; URL=testdone.php">';
		}
	}
?>
		<form action="getexam.php" method="POST">
			<table>
				<tr>
					<td>
						<?php
							$n=$_SESSION['number'];
							$_SESSION['pq']=$_SESSION["qno"][$n];
							echo "<text>".$_SESSION["pq"].". </text>";
							echo "<text>".$_SESSION["q"][$n]."</text>";
						?>
					</td>
				</tr>
				<tr>
					<td>
						<input type="radio" name="opt" value="1">
						<?php
							$n=$_SESSION['number'];
							echo "<text>".$_SESSION["opt1"][$n]."</text>";
						?>
					</td>
				</tr>

				<tr>
					<td>
						<input type="radio" name="opt" value="2">
						<?php
							$n=$_SESSION['number'];
							echo "<text>".$_SESSION["opt2"][$n]."</text>";
						?>
					</td>
				</tr>
				<tr>
					<td>
						<input type="radio" name="opt" value="3">
						<?php
							$n=$_SESSION['number'];
							echo "<text>".$_SESSION["opt3"][$n]."</text>";
						?>
					</td>
				</tr>
				<tr>
					<td>
						<input type="radio" name="opt" value="4">
						<?php
							$n=$_SESSION['number'];
							echo "<text>".$_SESSION["opt4"][$n]."</text>";
						?>
					</td>
				</tr>
				<tr>
					<td>
						<input type="reset" id="reset" name="reset" value="RESET">
						<input type="submit" id="next" name="next" value="NEXT">
					</td>
				</tr>
			</table>
		</form>
		</div>
	</center>
</body>
</html>
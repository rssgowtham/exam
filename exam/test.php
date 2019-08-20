<?php
	session_start();
	if($_SESSION['slogin']==0)
	{
		echo '<meta http-equiv="refresh" content="0; URL=loggedout.php">';
	}
	$_SESSION['number']=1;
	$connection=mysqli_connect("localhost", "id7922903_root", "password", "id7922903_exam");
	$i=1;
	$user=$_SESSION['sid'];
	$query=mysqli_query($connection,"SELECT `taken` FROM `students` where `username`='$user'");
	$data=mysqli_fetch_array($query);
	$taken=$data['taken'];
	if($taken==1)
	{
		echo '<meta http-equiv="refresh" content="0; URL=testdone.php">';
	}
	else
	{
	$query=mysqli_query($connection,"SELECT count(*) FROM `questions`");
	$data=mysqli_fetch_array($query);
	$count=$data['count(*)'];
	$_SESSION['count']=$count;
	$query=mysqli_query($connection,"SELECT * FROM `questions`");
	while($data=mysqli_fetch_array($query))
	{
		$qno[$i]=$data['qno'];
		$q[$i] =$data['question'];
		$opt1[$i]=$data['opt1'];
		$opt2[$i]=$data['opt2'];
		$opt3[$i]=$data['opt3'];
		$opt4[$i]=$data['opt4'];
		$ans[$i]=$data['answer'];
		$i=$i+1;
	}
	$_SESSION["qno"]=$qno;
	$_SESSION["q"]=$q;
	$_SESSION["opt1"]=$opt1;
	$_SESSION["opt2"]=$opt2;
	$_SESSION["opt3"]=$opt3;
	$_SESSION["opt4"]=$opt4;
	$_SESSION["ans"]=$ans;
	echo '<meta http-equiv="refresh" content="0; URL=getexam.php">';
	}
?>
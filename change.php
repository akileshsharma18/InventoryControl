<?php	
session_start();
include("config.php"); //connect to db

mysqli_select_db($db_cn,"$dbname")or die("cannot select DB"); //Selecting db
	date_default_timezone_set('Asia/Kolkata');
	$date=date('d-m-Y H:i:s a');
	//$date=(string)$date;
	
	$pass=$_POST['pass1'];
	$cpass=$_POST['cpass1'];
	if(isset($_POST['pass1']) && isset($_POST['cpass1']))
	{
	if($pass==$cpass)
	{
		$tbn=$_SESSION['t'];
		$uname=$_SESSION['uname1'];
		$com_name=$_SESSION['com_name'];
		$pass=md5($pass);
		
		$result2=mysqli_query($db_cn, "update $com_name.'_'.$tbn set last_mod='$date', password='$pass' where username='$uname'");
				if($result2)
						header("Location:signin.php");
				else
						header("Location:reset.php");
	}
	else
		header("location:reset.php");
	}
	else
		header("location:reset.php");

	?>
<?php
session_start();
include("config.php"); //connect to db
mysqli_select_db($db_cn,"$dbname")or die("cannot select DB"); //Selecting db
	date_default_timezone_set('Asia/Kolkata');
	$date=date('Y-m-d');

		$uid=$_SESSION["username"];
	    $tbn1=$_SESSION["design"];
		$tbn1=strtolower($tbn1);
		//$cname=$_SESSION["cname"];
		$feed=$_POST['feedback'];
		//$loc=$_SESSION["ci"];
		$com_name=$_SESSION['com_name'];
		$empid=$_SESSION['empid'];
		$com_name=strtolower($com_name);
		$f=$com_name.'_feedback';
			if($tbn1=='company_admin')
			{
				$result=mysqli_query($db_cn , "UPDATE com_list SET `feedback`='$feed' WHERE `com_name`='$com_name'");
				if($result)
					// Store feedback in files.
					header("Location:comsetting.php");
			}				
			else if($tbn1=='shop_admin')
			{
				//$loc=$_SESSION['location'];
				echo $empid;
				$result=mysqli_query($db_cn , "INSERT INTO `$f` (`feed_id`, `from_empid`, `to`, `date`, `feedback`) 
				VALUES (NULL,'$empid','Company_Admin','$date','$feed')");
				
				if($result)
					header("Location:shopadminsetting.php");
			}			
			else if($tbn1=='shop_keeper')
			{
				//$loc=$_SESSION['location'];
				$result=mysqli_query($db_cn , "INSERT INTO `$f` ( `feed_id`,`from_empid`, `to`, `date`, `feedback`) 
				VALUES (NULL,'$empid','Shop_Admin','$date','$feed')");
				if($result)
					header("Location:keeperusersetting.php");
			}			
			else
				//header("Location:settingorg.php");

?>
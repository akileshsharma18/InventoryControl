<?php 
session_start();
include("config.php");

	date_default_timezone_set('Asia/Kolkata');
	$date=date('d-m-Y H:i:s a');
	//$date=(string)$date;
if(isset($_COOKIE['cid']) || isset($_SESSION['username'])) 
{
	if(isset($_COOKIE['cid']))
	{
		$tb=$_COOKIE['tbn'];
		$ci=$_COOKIE['cid'];
		$name=$_COOKIE['name'];
		$uname=$_COOKIE['uname'];
		$empid=$_COOKIE['empid'];
		$design=$_COOKIE['design'];
		$com_name=$_COOKIE['com_name'];
		
		$user=mysqli_query($db_cn, "select * from $tb where cooid ='$ci'");
		$count1=mysqli_num_rows($user); 
		if($count1==1)
		{
			while($row = mysqli_fetch_array($user)) 
			{
				$name1=$row["name"];
				//$img=$row["imgpath"];
				$count=$row["count"];
				$empid=$row["empid"];
				$com_name=$row["com_name"];
			}
			$count++;
			mysqli_query($db_cn, "UPDATE $tb SET count='$count', lldt='$date' WHERE username='$uname' and empid='$empid'");
			$design=mysqli_query($db_cn, "select design from $com_name.'_employee' where empid IN (Select empid from $tb where empid='$empid' )");
			$_SESSION["name"] = $name1;
			$_SESSION["tbn"]= $tb;
			$_SESSION["username"]= $uname;
			$_SESSION["design"]= $design;
			
			if($design=='shop_admin'){
				header("location:shopadminuser.php");
			}
			elseif($tb=='company_admin'){
				header("location:Adminuser.php");
			}
			elseif($design=='shop_keeper'){
				header("location:shopkeeperuser.php");
			}
		}
	}
	elseif(isset($_SESSION['username']))
	{
		$uid=$_SESSION["username"];
		//$name=$_SESSION["name"];
		$tbn1=$_SESSION["tbn"];
		$design=$_SESSION["design"];
		$com_name=$_SESSION["com_name"];
		
			
			if($design=='shop_admin'){
				header("location:shopadminuser.php");
			}
			elseif($tbn1=='company_admin'){
				header("location:Adminuser.php");
			}
			elseif($design=='shop_keeper'){
				header("location:shopkeeperuser.php");
			}	
		}
	}
	

	

else
	header("location:MainPage.php");
?>	

<?php
session_start();
include("config.php"); //connect to db
mysqli_select_db($db_cn,"$dbname")or die("cannot select DB"); //Selecting db
	date_default_timezone_set('Asia/Kolkata');
	$date=date('Y-m-d');

$num=$_POST['no'];
$cat=$_POST['cat'];
$mode=$_POST['mode'];

$uname=$_SESSION["username"];
$city1=$_SESSION["shop_id"];//from city
$com_name=$_SESSION["com_name"];
$to=$_POST['city'];//to city
$tbn1=$_SESSION["tbn"];
$mode=$_POST['mode'];

$z=$com_name."_shop_keeper";
$result1=mysqli_query($db_cn, "SELECT * FROM `$z` where `shop_id`='$city1'");
                $count=mysqli_num_rows($result1); 
				if($count==1)
                {
					while($row = mysqli_fetch_array($result1)) 
					{
						$keep_id=$row["keep_id"];
						$empid1=$row["empid"];
					}
				}


				$y=$com_name."_map";
$result2=mysqli_query($db_cn, "SELECT * FROM `$y` where `city`='$to'");
                $count=mysqli_num_rows($result2); 
				if($count==1)
                {
					while($row = mysqli_fetch_array($result2)) 
					{
						$toshopid=$row["shop_id"];
					}
				}


								$w=$com_name."_map";
$result1=mysqli_query($db_cn, "SELECT * FROM `$w` where `shop_id`='$city1'");
                $count=mysqli_num_rows($result1); 
				if($count==1)
                {
					while($row = mysqli_fetch_array($result1)) 
					{
						$from=$row["city"];
					}
				}


								$x=$com_name."_shop_admin";
$result1=mysqli_query($db_cn, "SELECT * FROM `$x` where `shop_id`='$city1'");
                $count=mysqli_num_rows($result1); 
				if($count==1)
                {
					while($row = mysqli_fetch_array($result1)) 
					{
						$empid2=$row["empid"];
					}
				}


if($tbn1=='shop_keeper')		
{
		
		$com_name=$_SESSION["com_name"];
		$a=$com_name."_category";
		

				$result1=mysqli_query($db_cn, "SELECT * FROM `$a` where `shop_id`='$city1' and name='$cat'");
                $count=mysqli_num_rows($result1); 
				if($count==1)
                {
					while($row = mysqli_fetch_array($result1)) 
					{
						$no=$row["noofpro"];
					}
				}
if($no>=$num)
{	
$s=$no-($num);
$result1 = mysqli_query($db_cn,"UPDATE `$a` SET `noofpro`='$s' where `name`='$cat' and shop_id='$city1'");

				$result3=mysqli_query($db_cn, "SELECT * FROM `$a` where `shop_id`='$toshopid' and name='$cat'");
                $count=mysqli_num_rows($result3); 
				if($count==1)
                {
					while($row = mysqli_fetch_array($result3)) 
					{
						$no1=$row["noofpro"];
					}
				}
$t=$no1+($num);
$result1 = mysqli_query($db_cn,"UPDATE `$a` SET `noofpro`='$t' where `name`='$cat' and shop_id='$toshopid'");
if($result1)
{
				$t=$com_name.'_shop_admin';
				$result4=mysqli_query($db_cn, "SELECT username FROM $t ");
                $count=mysqli_num_rows($result4); 
				if($count==1)
                {
					while($row = mysqli_fetch_array($result4)) 
					{
						$sa=$row["username"];
					}
				}
				$g=$com_name."_history";
	$result3 = mysqli_query($db_cn,"INSERT INTO $g VALUES (NULL,'$empid2','$empid1','$cat','$from','$to',$num,'$mode','$date')");
	if($result3)
		header("Location: shopkeeperuser.php");
}
}
else
	header("Location: shopkeeperuser.php");


}
?>
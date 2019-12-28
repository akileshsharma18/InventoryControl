<?php
session_start();
include("config.php"); //connect to db
mysqli_select_db($db_cn,"$dbname")or die("cannot select DB"); //Selecting db

$num=$_POST['num1'];
$cat=$_POST['comname'];
$rack=$_POST['rack'];
$shelf=$_POST['shelf'];
$room=$_POST['room'];

$uname=$_SESSION["username"];
//$city=$_SESSION["ci"];
$shopid=$_SESSION["shop_id"];
$com_name=$_SESSION["com_name"];
$city=mysqli_query($db_cn, "SELECT city FROM $com_name.'_map' where `shop_id`='$shopid' and category='$cat'");
//$tbn1=$_SESSION["tbn"];
if($com_name.'shop_keeper')		
{
	
		//$cname=$_SESSION["cname"];
		$a=$com_name."_category";

				$result5=mysqli_query($db_cn, "SELECT * FROM $a where `shop_id`='$shopid' and name='$cat'");
                $count=mysqli_num_rows($result5); 
				if($count==1)
                {
					while($row = mysqli_fetch_array($result5)) 
					{
						$no=$row["noofpro"];	
					}
					$s=$num+$no;
$result1 = mysqli_query($db_cn,"UPDATE `$a` SET `noofpro`='$s',`shelf_no`='$shelf', `rack_no`='$rack', `room_no`='$room' where `name`='$cat' and shop_id='$shopid'");
if($result1)
	header("Location: shopkeeperuser.php");
else
	header("Location: shopkeeperuser.php");
				}



}
?>
<?php
session_start();
include("config.php"); //connect to db
mysqli_select_db($db_cn,"$dbname")or die("cannot select DB"); //Selecting db

$num=$_POST['num'];
$cat=$_POST['comname'];

$uname=$_SESSION["username"];
$shopid=$_SESSION["shop_id"];
$tbn1=$_SESSION["tbn"];
if($tbn1=='shop_keeper')		
{
		
		$cname=$_SESSION["com_name"];
		$a=$cname."_category";

				$result1=mysqli_query($db_cn, "SELECT * FROM `$a` where `shop_id`='$shopid' and name='$cat'");
                $count=mysqli_num_rows($result1); 
				if($count==1)
                {
					while($row = mysqli_fetch_array($result1)) 
					{
						$no=$row["noofpro"];
					}
					if($num<=$no)
					{
					$s=$no-$num;
					$result1 = mysqli_query($db_cn,"UPDATE `$a` SET `noofpro`='$s' where `name`='$cat' and shop_id='$shopid'");
					if($result1)
					{
					
					header("Location: shopkeeperuser.php");
					}
					else
					{
						header("Location: shopkeeperuser.php");
					}
					}
					else
							header("Location: shopkeeperuser.php");
				
				}
				else
							header("Location: shopkeeperuser.php");
}
?>
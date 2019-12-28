<?php
session_start();
include("config.php"); //connect to db
mysqli_select_db($db_cn,"$dbname")or die("cannot select DB"); //Selecting db
//$cn=$_SESSION["cname"];	
	$com_name=$_SESSION["com_name"];
$tbn1=$_SESSION["tbn"];
if (isset($_GET['id']))
{		
if($tbn1=='company_admin')		
{
$id = $_GET['id'];
$com_name=$_SESSION["com_name"];
$shopid=$_SESSION["shop_id"];
$sa=$com_name.'_shop_admin';
$result = mysqli_query($db_cn,"UPDATE `$sa` SET `approval`='1' where `username`='$id'");

					$selectSQL1 = "SELECT * FROM .$com_name.`_shop_admin` where username='$id'";
					$selectRes1 = mysqli_query( $db_cn, $selectSQL1 ); 
					while($row = mysqli_fetch_array($selectRes1)) 
					{
						$city=$row['city'];
					}
					
		$a=$com_name."_category";
		$selectSQL = "SELECT Distinct name, alert FROM `$a`";
		$selectRes = mysqli_query( $db_cn, $selectSQL ); 
					while($row = mysqli_fetch_array($selectRes)) 
					{
						
						$cat=$row['name'];
						$alert=$row['alert'];
						$res1=mysqli_query($db_cn, "Select * from $a where shop_id='$shopid' and name='$cat'");
						$count=mysqli_num_rows($res1); 
						if($count<1)
						{
						$string="INSERT INTO `$a` (`name`, `noofpro`, `shop_id`, `alert`,'shelf_no','rack_no','room_no') 
							VALUES ('$cat', 0, '$shopid', '$alert',NULL,NULL,NULL)";
						$res=mysqli_query($db_cn, $string);		
						}	
					}
					if($selectRes) 
						header("Location:Adminuser.php");
}				



if($tbn1=='shop_admin')		
{
$id1 = $_GET['id'];
$sk=$com_name.'_shop_keeper';
$result1 = mysqli_query($db_cn,"UPDATE `$sk`  SET `approval`='1' where `username`='$id1'");
	
if($result1)
	header("Location: shopadminuser.php");
else
	header("Location: shopadminuser.php");
}

}
?>
<?php
session_start();
include("config.php"); //connect to db
mysqli_select_db($db_cn,"$dbname")or die("cannot select DB"); //Selecting db

		$uid=$_SESSION["username"];
	    $tbn1=$_SESSION["tbn"];
		
		$cname=$_SESSION["com_name"];
		$a=$cname."_category";
		$c=$cname."_shop_admin";
		$cat=$_POST['name'];
		$alert=$_POST['no'];
		
		$selectSQL1 = "SELECT shop_id FROM $c ";
		$selectRes1 = mysqli_query( $db_cn,$selectSQL1 ); 
		while( $row = mysqli_fetch_assoc( $selectRes1 ) )
		{
			$shop=$row['shop_id'];
		$string="INSERT INTO `$a`(`name`, `noofpro`, `shop_id`, `alert`, `shelf_no`, `rack_no`, `room_no`) 
							VALUES ('$cat', 0, '$shop', '$alert', NULL, NULL, NULL)";
		$res=mysqli_query($db_cn, $string);		
		}	
			if($res) 
				header("Location:Adminuser.php");
			else
				header("Location:Adminuser.php");
?>		
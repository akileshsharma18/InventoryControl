<?php
session_start();
include("config.php"); //connect to db
mysqli_select_db($db_cn,"$dbname")or die("cannot select DB"); //Selecting db

		$uid=$_SESSION["username"];
	    $tbn1=$_SESSION["tbn"];
		$cname=$_SESSION["com_name"];
		$a=$cname."_category";
		$b=$_POST['cat'];
		
		$selectSQL = "Delete From $a Where name = '$b'";
		$selectRes = mysqli_query( $db_cn, $selectSQL ); 

		if($selectRes)
			header("Location:Adminuser.php");
?>		
<?php
 include("config.php");
session_start();
		
   mysqli_select_db($db_cn,"$dbname")or die("cannot select DB");
		$uid=$_SESSION["username"];
	    $tbn1=$_SESSION["tbn"];
		$cname=$_SESSION["com_name"];
		$sk=$cname.'_shop_keeper';
		$sa=$cname.'_shop_admin';
	if(move_uploaded_file($_FILES["file"]["tmp_name"],"Logo/".$_FILES["file"]["name"]))
	{
	$img = $_FILES['file']['name'];
	if($img==''){
		$img1 = "Logo/default-company-logo.jpg";
		$result=mysqli_query($db_cn , "UPDATE $tbn1 SET imgpath='$img1' WHERE username='$uid'");	
		if($result)
		{
			$result1=mysqli_query($db_cn , "UPDATE $sa SET imgpath='$img1'");
			$result2=mysqli_query($db_cn , "UPDATE $sk SET imgpath='$img1'");
		}
	}
	else{
		$img2 = "Logo/".$img;	
		$result=mysqli_query($db_cn , "UPDATE $tbn1 SET imgpath='$img2' WHERE username='$uid'");
		if($result)
		{
			$result1=mysqli_query($db_cn , "UPDATE $sa SET imgpath='$img2' ");
			$result2=mysqli_query($db_cn , "UPDATE $sk SET imgpath='$img2'");
		}
	}
	
	if($result1 == 1 && $result2 == 1){
	if($_SESSION["tbn"]=="company_admin"){
		header("Location:comsetting.php");
	}
	else{
		header("Location:Adminuser.php");
	}
	}	
	}

?>
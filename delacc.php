<?php
include("config.php");
session_start();

   mysqli_select_db($db_cn,"$dbname")or die("cannot select DB");
   		$uid=$_SESSION["username"];
	    $tbn1=$_SESSION["design"];
		$tbn1=strtolower($tbn1);
		$cname=$_SESSION["com_name"];

		
		if($tbn1=="company_admin")
		{
			$tbn2=$cname."_shop_admin";
			mysqli_query($db_cn, "Delete From $tbn2");
			$tbn2=$cname."_shop_keeper";
			mysqli_query($db_cn, "Delete From $tbn2");
			$tbn2=$cname."_feedback";
			mysqli_query($db_cn, "Delete From $tbn2");
			$tbn2=$cname."_history";
			mysqli_query($db_cn, "Delete From $tbn2");
			$tbn2=$cname."_category";
			mysqli_query($db_cn, "Delete From $tbn2");
			$tbn2=$cname."_map";
			mysqli_query($db_cn, "Delete From $tbn2");
			$tbn2=$cname."_money_transaction";
			mysqli_query($db_cn, "Delete From $tbn2");
			$tbn2=$cname."_employee";
			mysqli_query($db_cn, "Delete From $tbn2");

			mysqli_query($db_cn, "Delete * From `com_list` Where com_name ='$cname'");
			mysqli_query($db_cn, "Delete * From `company_admin` Where com_name='$cname' AND username='$uid'");

		$tbn2=$cname."_category";
		mysqli_query($db_cn, "Drop Table $tbn2");
		$tbn2=$cname."_shop_admin";
		mysqli_query($db_cn, "Drop Table $tbn2");
		$tbn2=$cname."_shop_keeper";
		mysqli_query($db_cn, "Drop Table $tbn2");
		$tbn2=$cname."_feedback";
		mysqli_query($db_cn, "Drop Table $tbn2");
		$tbn2=$cname."_history";
		mysqli_query($db_cn, "Drop Table $tbn2");
		$tbn2=$cname."_map";
		mysqli_query($db_cn, "Drop Table $tbn2");
		$tbn2=$cname."_money_transaction";
		mysqli_query($db_cn, "Drop Table $tbn2");
		$tbn2=$cname."_employee";
		mysqli_query($db_cn, "Drop Table $tbn2");
		
		
		
		           header("location:logout.php"); 
		}
		
		elseif($tbn1==$cname."_shop_admin")
		{
				$c2=$cname.'_shop_keeper';
				$c3=$cname.'_feedback';
				$c4=$cname.'_shop_admin';
				$result1=mysqli_query($db_cn, "SELECT * FROM $c4 where `username`='$uid'");
                $count=mysqli_num_rows($result1); 
				if($count>=1)
                {
					while($row = mysqli_fetch_array($result)) 
					{
						$shop=$row["shop_id"];
						$empid=$row["empid"];
						$shopid=$row["shop_id"];
					}
				}
		//mysqli_query($db_cn, "Delete From $cname.'_history' where and shop_admin='$uid'");	
		mysqli_query($db_cn, "Delete * From $c2 where shop_id='$shop'");
		mysqli_query($db_cn, "Delete * From $c3 where to='CompanyAdmin' and from_empid='$empid'");
		$a=$cname."_category";
		mysqli_query($db_cn, "Delete * From $a where shop_id='$shop'");
		header("location:logout.php");
		}

		elseif($tbn1==$cname."shop_keeper")
		{
		        $c=$cname.'_shop_keeper';
				$c1=$cname.'_feedback';
				$result1=mysqli_query($db_cn, "SELECT * FROM $c where `username`='$uid'");
                $count=mysqli_num_rows($result1); 
				if($count>=1)
                {
					while($row = mysqli_fetch_array($result)) 
					{
						//$city=$row["city"];
						$empid=$row["empid"];
						$shopid=$row["shop_id"];
					}
				}
				   mysqli_query($db_cn, "Delete * From $c1 where com_name='$cname' and to='ShopAdmin' and from_empid='$empid'");
				   header("location:logout.php");

		}				   

			
?>
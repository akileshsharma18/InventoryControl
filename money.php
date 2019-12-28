<?php
session_start();
include("config.php"); //connect to db
mysqli_select_db($db_cn,"$dbname")or die("cannot select DB"); //Selecting db

	date_default_timezone_set('Asia/Kolkata');
	$date=date('Y-m-d');

				$uname=$_SESSION["username"];
				$com_name=$_SESSION["com_name"];
				$design=$_SESSION["design"];
				$empid1=$_SESSION["empid"];

$from=$_POST['fromacc'];
$to=$_POST['toacc'];
$amount=$_POST['amount'];
$empid=$_POST['empid'];

				$e=$com_name.'_employee';
				$mt=$com_name.'_money_transaction';

				$sql="SELECT * FROM $e WHERE empid='$empid'";
				$result=mysqli_query($db_cn, $sql);
				$count=mysqli_num_rows($result);
				if($count==1)
				{
						while($row = mysqli_fetch_array($result)) 
						{
							$bal=$row["balance"];
						}
					
				
				$sql1="SELECT * FROM $e WHERE empid='$empid1'";
				$result1=mysqli_query($db_cn, $sql1);
				$count1=mysqli_num_rows($result1);
					if($count==1)
					{
						while($row1 = mysqli_fetch_array($result1)) 
						{
							$bal2=$row1["balance"];
						}
					$bal3=$bal2-$amount;
						if($bal3 != 0)
						{
							mysqli_query($db_cn, "UPDATE $e SET balance=$bal3 WHERE empid='$empid1'");

							$bal1=$bal+$amount;
							mysqli_query($db_cn, "UPDATE $e SET balance=$bal1 WHERE empid='$empid'");
						}
							
						else
						{
							if($design=="shop_admin")
								header("location:shopadminuser.php");
							elseif($design=="company_admin")
								header("location:Adminuser.php");
							elseif($design=="shop_keeper")
								header("location:shopkeeperuser.php");
						}

					}
				}

				$sql2="INSERT INTO $mt VALUES(NULL,'$empid1','$empid',$amount,'$date','$from','$to')";
				$result2=mysqli_query($db_cn, $sql2);
				if(isset($result2))
				{
					if($design=="shop_admin")
						header("location:shopadminuser.php");
					elseif($design=="company_admin")
						header("location:Adminuser.php");
					elseif($design=="shop_keeper")
						header("location:shopkeeperuser.php");
				}	
				else
				{
					if($design=="shop_admin")
						header("location:shopadminuser.php");
					elseif($design=="company_admin")
						header("location:Adminuser.php");
					elseif($design=="shop_keeper")
						header("location:shopkeeperuser.php");
				}
?>
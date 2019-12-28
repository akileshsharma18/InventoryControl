<?php
session_start();
include("config.php"); //connect to db
mysqli_select_db($db_cn,"$dbname")or die("cannot select DB"); //Selecting db
				$com_name=$_SESSION["com_name"];
				$design=$_SESSION["design"];
				$empid1=$_SESSION["empid"];

$amount=$_POST['amount'];

				$e=$com_name.'_employee';
				
				$sql="SELECT * FROM $e WHERE empid='$empid1'";
				$result=mysqli_query($db_cn, $sql);
				$count=mysqli_num_rows($result);
				if($count==1)
				{
						while($row = mysqli_fetch_array($result)) 
						{
							$bal=$row["balance"];
						}
						$bal1=$bal+$amount;
						mysqli_query($db_cn, "UPDATE $e SET balance=$bal1 WHERE empid='$empid1'");

						if($design=="shop_admin")
							header("location:shopadminuser.php");
						elseif($design=="company_admin")
							header("location:Adminuser.php");
						elseif($design=="shop_keeper")
							header("location:shopkeeperuser.php");

				}
?>
<?php 
session_start();
include("config.php"); //connect to db

	date_default_timezone_set('Asia/Kolkata');
	$date=date('Y-m-d');
	//$date=(string)$date;

mysqli_select_db($db_cn,"$dbname")or die("cannot select DB"); //Selecting db

$username=$_POST['uname'];
$password=$_POST['pass'];
$cpassword=$_POST['cpass'];
$empid=$_POST['empid'];
$phono=$_POST['perpho'];
$shopadd=$_POST['sadd'];
$add=$_POST['peradd'];
$city=$_POST['city'];
$altemail=$_POST['altemail'];
$com_name=$_POST['comname'];
$que=$_POST['que'];
$ans=$_POST['ans'];
$fname=$_POST['fname'];

$gen=$_POST['gen'];
$age=$_POST['age'];
$salary=$_POST['salary'];
$exp=$_POST['exp'];
$special=$_POST['special'];
$lat=$_POST['lat'];
$lng=$_POST['lng'];

				$result=mysqli_query($db_cn, "select * from `company_admin` where com_name='$com_name'");
                $count=mysqli_num_rows($result); 
				if($count==1)
                {
					while($row = mysqli_fetch_array($result)) 
					{
						$img=$row["imgpath"];
					}
				}
				else
					$img="Logo/default-company-logo.jpg";

if($password==$cpassword)
{
					//$password=md5($password);
					$sa=$com_name.'_shop_admin';
					$m=$com_name.'_map';
					$e=$com_name.'_employee';
					$result=mysqli_query($db_cn, "select * from $sa where username='$username'");
					$count=mysqli_num_rows($result);
					
						if($count==1)
						{
							header("location:shopsignup.php");
							
						}
						else
						{
							
							$q_string2="INSERT INTO $sa
							VALUES (NULL, '$empid', '$username', '$password', 0, '$img', NULL, NULL, '$date', NULL, '$que', '$ans', 0)";
							$res1=mysqli_query($db_cn, $q_string2);

							$q_string3="INSERT INTO $e 
							VALUES ('$empid', '$gen', '$age', '$fname', '$date', 'Shop_Admin', $salary, $phono, '$altemail', '$add', $exp, '$special', '$com_name', 0)";
							$res2=mysqli_query($db_cn, $q_string3);

							
					$selectSQL5 = "SELECT shop_id FROM $sa Where empid='$empid'";
					$selectRes5 = mysqli_query( $db_cn, $selectSQL5 ); 
					while($row1 = mysqli_fetch_array($selectRes5)) 
					{
						$shop_id=$row1['shop_id'];
					}
							
							
							$q_string4="INSERT INTO $m 
							VALUES ($lat, $lng, '$shopadd', '$city', '$shop_id', 'NULL', 'S')";
							$res1=mysqli_query($db_cn, $q_string4);




		$a=$com_name."_category";

		$selectSQL = "SELECT *, Distinct name FROM `$a`";
		$selectRes = mysqli_query( $db_cn,$selectSQL ); 
		if($selectRes!=NULL)
		{
					while($row = mysqli_fetch_array($selectRes)) 
					{
						$cat=$row['name'];
						$alert=$row['alert'];
						$string="INSERT INTO `$a` (`name`, `noofpro`, `shop_id`, `alert`, `shelf_no`, `rack_no`, `room_no`) 
							VALUES ('$cat', 0, '$shop_id', '$alert', NULL, NULL, NULL)";
						$res=mysqli_query($db_cn, $string);		
					}	
					
		}
						header("Location:signin.php");
						
					} 

						}

else{
	header("location:shopsignup.php");
}
?>
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
$city=$_POST['city'];
$altemail=$_POST['altemail'];
$com_name=$_POST['comname'];
$que=$_POST['que'];
$ans=$_POST['ans'];
$fname=$_POST['fname'];
$add=$_POST['address'];
$phono=$_POST['perpho'];

$gen=$_POST['gen'];
$age=$_POST['age'];
$salary=$_POST['salary'];
$exp=$_POST['exp'];
$special=$_POST['special'];


				$sa=$com_name.'_shop_admin';

				$result=mysqli_query($db_cn, "select * from $sa Where shop_id IN(Select shop_id from $m where city = '$city') ");
                $count=mysqli_num_rows($result); 
				if($count==1)
                {
					while($row = mysqli_fetch_array($result)) 
					{
						$img=$row["imgpath"];
						$shop_id=$row["shop_id"];
					}
				}
				else
					$img="Logo/default-company-logo.jpg";

if($password==$cpassword)
{
					
					$sa=$com_name.'_shop_admin';
					$m=$com_name.'_map';
					$e=$com_name.'_employee';
					$sk=$com_name.'_shop_keeper';
					//$password=md5($password);
					$result=mysqli_query($db_cn, "select * from $sk where username='$username' or empid='$empid'");
					$count=mysqli_num_rows($result);
						if($count==1)
						{
							header("location:shopkeppersignup.php");
							
						}
						else
						{
							
							
					$selectSQL6 = "SELECT shop_id FROM $m Where city='$city'";
					$selectRes6 = mysqli_query( $db_cn, $selectSQL6 ); 
					while($row2 = mysqli_fetch_array($selectRes6)) 
					{
						$shop_id=$row2['shop_id'];
					}

							$q_string2="INSERT INTO $sk
							VALUES (NULL, '$shop_id', '$empid', '$username', '$password', 0, '$img', NULL, NULL, '$date', NULL, '$que', '$ans', 0)";
							$res=mysqli_query($db_cn, $q_string2);

							$q_string3="INSERT INTO $e 
							VALUES ('$empid', '$gen', '$age', '$fname', '$date', 'Shop_Admin', $salary, $phono, '$altemail', '$add', $exp, '$special', '$com_name', 0)";
							$res1=mysqli_query($db_cn, $q_string3);

							if(isset($res) && isset($res1))
									header("location:signin.php");
						} 

}

else{
	header("location:shopkeepersignup.php");
}

?>
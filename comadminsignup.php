<?php 
session_start();
include("config.php"); //connect to db

	date_default_timezone_set('Asia/Kolkata');
	$date=date('Y-m-d');
	//$date=(string)$date;

mysqli_select_db($db_cn,"$dbname")or die("cannot select DB"); //Selecting db

$username=$_POST['username'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$orgtype=$_POST['otype'];
$empid=$_POST['empid'];
$phono=$_POST['ophone'];
$comadd=$_POST['cadd'];
$url=$_POST['url'];
$altemail=$_POST['altemail'];
$com_name=$_POST['oname'];
$com_name=strtolower($com_name);
$que=$_POST['question'];
$ans=$_POST['answer'];
$fname=$_POST['fname'];
$gen=$_POST['gen'];
$age=$_POST['age'];
//$doj=$_POST['doj'];
$design="Company Admin";
$salary=$_POST['salary'];
$phoneno=$_POST['perphono'];
$add=$_POST['peradd'];
$exper=$_POST['exper'];
$special=$_POST['special'];

$lat=$_POST['lat'];
$lng=$_POST['lng'];
$city=$_POST['city'];

if($password==$cpassword)
{
					//$password=md5($password);
					$result=mysqli_query($db_cn, "select * from company_admin where username='$username'");
					$count=mysqli_num_rows($result);
						if($count==1)
						{
							header("location:comsignup.php");
						}
						else
						{
							
							$e=$com_name.'_employee';
							$sa=$com_name.'_shop_admin';
							$sk=$com_name.'_shop_keeper';
							$c=$com_name.'_category';
							$mt=$com_name.'_money_transaction';
							$h=$com_name.'_history';
							$f=$com_name.'_feedback';
							$m=$com_name.'_map';

							$q_string5="INSERT INTO `company_admin` VALUES ( '$com_name', '$username', '$password', 0, 'Logo/default-company-logo.jpg', NULL, NULL, '$orgtype','$empid', $phono,'$comadd', '$url', '$date','$altemail', NULL, '$que', '$ans','$fname',NULL )";
							$res=mysqli_query($db_cn, $q_string5);
							
							$q_string3="INSERT INTO `com_list` VALUES ('$com_name','$fname','$date','$orgtype','NULL','$username','$url')";
							
							mysqli_query($db_cn, $q_string3);

									$string1="CREATE TABLE $e (`empid` VARCHAR(50), `E_Gender` VARCHAR(10), `E_Age` INT(10), `E_Name` VARCHAR(50), `E_DOJ` DATE, `E_Designation` VARCHAR(50), `E_Salary` INT(30), `E_phone` BIGINT(100), `E_alter_email` VARCHAR(100), `E_address` VARCHAR(100), `E_experience` INT(10), `E_specialization` VARCHAR(50), `com_name` VARCHAR(50), `balance` BIGINT(20), PRIMARY KEY (empid))";
																		$res1=mysqli_query($db_cn, $string1);
									$string2="CREATE TABLE $sa (`shop_id` INT(50) NOT NULL AUTO_INCREMENT, `empid` VARCHAR(50), `username` VARCHAR(50), `password` VARCHAR(50), `count` INT(20), `imgpath` VARCHAR(50), `cooid` VARCHAR(50), `lldt` DATE, `regdate` DATE, `last_mod` DATE, `question` VARCHAR(50), `answer` VARCHAR(50),`approval` INT(1), PRIMARY KEY (shop_id), FOREIGN KEY (empid) REFERENCES $e(empid))";
																		$res2=mysqli_query($db_cn, $string2);
									$string3="CREATE TABLE $sk (`keep_id` INT(50) NOT NULL AUTO_INCREMENT, `shop_id` VARCHAR(50), `empid` VARCHAR(50), `username` VARCHAR(50), `password` VARCHAR(50), `count`INT(20), `imgpath` VARCHAR(50), `cooid` VARCHAR(50), `lldt` DATE, `regdate` DATE, `last_mod` DATE, `question` VARCHAR(50), `answer` VARCHAR(50),`approval` INT(1), PRIMARY KEY (keep_id), FOREIGN KEY (shop_id) REFERENCES $sa(shop_id), FOREIGN KEY (empid) REFERENCES $e(empid))";
																		$res3=mysqli_query($db_cn, $string3);
									$string4="CREATE TABLE $c (`name` VARCHAR(50), `noofpro` INT(10), `shop_id` VARCHAR(50), `alert` INT(5),`shelf_no` INT(10),`rack_no` INT(10),`room_no` INT(10), FOREIGN KEY (shop_id) REFERENCES $sa(shop_id))";
																		$res4=mysqli_query($db_cn, $string4);
									$string5="CREATE TABLE $mt (`trans_id` INT(50) NOT NULL AUTO_INCREMENT, `from_empid` VARCHAR(50), `to_empid` VARCHAR(50), `total_amount` INT(50), `date` DATE, `Back_Acc_From` VARCHAR(50), `Bank_Acc_To` VARCHAR(50), PRIMARY KEY (trans_id), FOREIGN KEY (from_empid) REFERENCES $e(empid),  FOREIGN KEY (to_empid) REFERENCES $e(empid))";
																		$res5=mysqli_query($db_cn, $string5);
									$string6="CREATE TABLE $h (`his_id` INT(50) NOT NULL AUTO_INCREMENT, `shopadmin_empid` VARCHAR(50), `keeper_empid` VARCHAR(50), `cat_name` VARCHAR(50), `from_loc` VARCHAR(50), `to_loc` VARCHAR(50), `No_of_pro` INT(50), `Mode_trans` VARCHAR(50), `date` DATE, PRIMARY KEY (his_id), FOREIGN KEY (cat_name) REFERENCES $c(name),  FOREIGN KEY (shopadmin_empid) REFERENCES $e(empid),  FOREIGN KEY (keeper_empid) REFERENCES $e(empid))";
																		$res6=mysqli_query($db_cn, $string6);
									$string7="CREATE TABLE $f (`feed_id` INT(50) NOT NULL AUTO_INCREMENT, `from_empid` VARCHAR(50), `to` VARCHAR(50), `date` DATE, `feedback` VARCHAR(200), PRIMARY KEY (feed_id), FOREIGN KEY (from_empid) REFERENCES $e(empid))";
																		$res7=mysqli_query($db_cn, $string7);
									$string8="CREATE TABLE $m (`latitude` float(10,6), `longitude` float(10,6) , `address` VARCHAR(100), `city` VARCHAR(50), `shop_id` VARCHAR(50), `h_id` VARCHAR(50), type CHAR(1), PRIMARY KEY (address), FOREIGN KEY (shop_id) REFERENCES $sa(shop_id),  FOREIGN KEY (h_id) REFERENCES company_admin(h_id) )";
																		$res8=mysqli_query($db_cn, $string8);

									

									$q_string2="INSERT INTO $e VALUES ('$empid','$gen',$age,'$fname','$date','$design',$salary,$phoneno,'$altemail','$add',$exper,'$special','$com_name', 5000)"; 
									$res11=mysqli_query($db_cn, $q_string2);

									/*mysqli_query($db_cn, "ALTER TABLE $sa AUTO_INCREMENT=100");
									mysqli_query($db_cn, "ALTER TABLE $sk AUTO_INCREMENT=100");
									mysqli_query($db_cn, "ALTER TABLE $mt AUTO_INCREMENT=100");
									mysqli_query($db_cn, "ALTER TABLE $h AUTO_INCREMENT=100");
									mysqli_query($db_cn, "ALTER TABLE $f AUTO_INCREMENT=100");*/
									

									$q_string4="Select * From company_admin Where username='$username'"; 
									$res10=mysqli_query($db_cn, $q_string4);
									while($row = mysqli_fetch_array($res10))
									{
										$hid=$row["h_id"];
									}

									$q_string9="INSERT INTO $m VALUES ($lat, $lng, '$comadd', '$city', 'NULL', '$hid', 'H')"; 
									$res12=mysqli_query($db_cn, $q_string9);

									if(isset($res12))
										header("location:signin.php");
								
						}
}
else{
	header("location:comsignup.php");
}
?>
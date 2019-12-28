<?php 
session_start();
include("config.php"); //connect to db
mysqli_select_db($db_cn,"$dbname")or die("cannot select DB"); //Selecting db

	date_default_timezone_set('Asia/Kolkata');
	$date=date('Y-m-d');
	//$date=(string)$date;

//Fetching data from sigin page
$myusername=$_POST['username'];
$mypassword=$_POST['password'];
$type=$_POST['type1'];
//$tbn=$_POST['type1'];
$cook=$_POST['remember_me'];
$com_name=$_POST['com_name'];
//$com_name=strtolower($com_name);
$_SESSION["com_name"]=$com_name;

 $myusername = stripslashes($myusername);
 $mypassword = stripslashes($mypassword);
		 //$mypassword = md5($mypassword); // Password encrpytion

			 if(isset($cook)) //If remember me is set
			 {
				 $val=10;
				 $cid=createRandomVal($val);
				 set_cookie($cid);
			 }
		 
		 	if(isset($_COOKIE['id'])) //If the Cookie is set then login not required.
			{
		
				$tbn=$_COOKIE['tbn'];
				$ci=$_COOKIE['id'];
				$na=$_COOKIE['name'];
				$uname=$_COOKIE['uname'];
				$empid=$_COOKIE['empid'];
				$design=$_COOKIE['design'];
				$com_name=$_COOKIE['com_name'];
				$result=mysqli_query($db_cn, "select * from $tbn where cooid = $ci");
                $count=mysqli_num_rows($result); 
				if($count==1)
                {
				$_SESSION["username"] = $uname;		  
				$_SESSION["tbn"] = $tbn;
				$_SESSION["com_name"] = $com_name;
					$_SESSION["imgpath"] = $img;
					$_SESSION["empid"] = $empid;
					$_SESSION["design"] = $design;
				if($design=="shop_admin")
					header("location:shopadminuser.php");
				elseif($design=="company_admin")
					header("location:companyadminuser.php");
				elseif($design=="shop_keeper")
					header("location:shopkeeperuser.php");
				else
					header("location:signin.php");
				}					  
			}
 
// Checking for user type
		 if($type=="shop_admin")
		 {
			$tbn=$com_name.'_shop_admin';
			$_SESSION["tbn"] = $tbn;
				$sql="SELECT * FROM $tbn WHERE username='$myusername' and password='$mypassword' and approval=1";
				$result=mysqli_query($db_cn, $sql);
				$count=mysqli_num_rows($result);
					if($count==1)
					{
						while($row = mysqli_fetch_array($result)) 
						{
							$empid=$row["empid"];
							//$com_name=$row["com_name"];
							$img=$row["imgpath"];
							$username=$row["username"];
							//$design=$row["E_Designation"];
							$cnt=$row["count"];
						}
					$_SESSION["username"] = $username;
					//$sql11="SELECT fname FROM $com_name.'_employee' WHERE empid IN(Select empid from $tbn where empid = '$empid')";
					//$name3=mysqli_query($db_cn, $sql11);
					//$sql13="SELECT design FROM $com_name.'_employee' WHERE empid IN(Select empid from $tbn where empid = '$empid')";
					//$design=mysqli_query($db_cn, $sql13);
					//$_SESSION["name"] = $name3;
					$_SESSION["com_name"] = $com_name;
					$_SESSION["imgpath"] = $img;
					$_SESSION["empid"] = $empid;
					$_SESSION["design"] = "shop_admin";

					$cnt++;
					mysqli_query($db_cn, "UPDATE $tbn SET count='$cnt', lldt='$date' WHERE username='$username'");
					header("location:shopadminuser.php");
					}
						
					else   
						header("location:signin.php");
		 }
		 
		 elseif($type=="company_admin")
		 {
			$tbn='company_admin';
			$_SESSION["tbn"] = $tbn;
				$sql="SELECT * FROM company_admin WHERE username='$myusername' and password='$mypassword'";
				$result=mysqli_query($db_cn, $sql);
				$count=mysqli_num_rows($result);
					if($count==1)
					{
						while($row = mysqli_fetch_array($result)) 
						{
							$empid=$row["empid"];
							$com_name=$row["com_name"];
							//$name1=$row["name"];
							$img=$row["imgpath"];
							$username=$row["username"];
							//$design=$row["E_Designation"];
							$cnt=$row["count"];
						}
					$_SESSION["username"] = $username;
					$sql14="SELECT fname FROM $com_name.'_employee' WHERE empid IN(Select empid from $tbn where empid = '$empid')";
					$name4=mysqli_query($db_cn, $sql14);
					$_SESSION["name"] = $name4;
					$_SESSION["com_name"] = $com_name;
					$_SESSION["imgpath"] = $img;
					$_SESSION["empid"] = $empid;
					$_SESSION["design"] = "company_admin";

					$cnt++;
					mysqli_query($db_cn, "UPDATE company_admin SET count='$cnt', lldt='$date'  WHERE username='$username'");
					header("location:Adminuser.php");
					}
						
					else   
						header("location:signin.php");		  		
		 }
		 
		 elseif($type=="shop_keeper")
		 {
			$tbn=$com_name.'_shop_keeper';
			$_SESSION["tbn"] = $tbn;
				$sql5="SELECT * FROM $tbn WHERE username='$myusername' and password='$mypassword' and approval='1'";
				$result=mysqli_query($db_cn, $sql5);
				$count=mysqli_num_rows($result);
					if($count==1)
					{
						while($row = mysqli_fetch_array($result)) 
						{
							$empid=$row["empid"];
							//$com_name=$row["com_name"];
							$img=$row["imgpath"];
							$username=$row["username"];
							//$design=$row["E_Designation"];
							$cnt=$row["count"];
						}
					$_SESSION["username"] = $myusername;
					$sql10="SELECT fname FROM $com_name.'_employee' WHERE empid IN(Select empid from $tbn where empid = '$empid')";
					$name2=mysqli_query($db_cn, $sql10);
					$sql12="SELECT design FROM $com_name.'_employee' WHERE empid IN(Select empid from $tbn where empid = '$empid')";
					//$design=mysqli_query($db_cn, $sql12);
					$_SESSION["name"] = $name2;
					$_SESSION["imgpath"] = $img;
					$_SESSION["empid"] = $empid;
					$_SESSION["com_name"] = $com_name;
					$_SESSION["design"] = "shop_keeper";

					$cnt++;
					mysqli_query($db_cn, "UPDATE $tbn SET count='$cnt', lldt='$date' WHERE username='$myusername'");
					header("location:shopkeeperuser.php");
					}
						
					else   
						header("location:signin.php");			
		 }  
		elseif($type=="")
		  header("location:signin.php");

   function set_cookie($cid) //Setting cookies with id, name and uname and table name.
   {        
	include("config.php");   
    $cid1=$cid;//md5($cid);
    $tbn=$_SESSION["tbn"];
    $username=$_SESSION["username"];
    $name=$_SESSION["name"]; 
	$design=$_SESSION["design"];
	$empid=$_SESSION["empid"];
	$com_name=$_SESSION["com_name"];
	$_SESSION["cid"]=$cid1;
	  setcookie("cid", $cid1, time()+3600); 
	  setcookie("tbn", $tbn, time()+3600);
      setcookie("name", $name, time()+3600);
	  setcookie("uname", $username, time()+3600);
	  setcookie("design", $design, time()+3600);
	  setcookie("empid", $empid, time()+3600);
	  setcookie("com_name", $com_name, time()+3600);
	   mysqli_query($db_cn, "UPDATE $tbn SET cooid='$cid1' WHERE username='$username'") or die("cannot select DB");
   }

   function createRandomVal($val) //Creates a random value.
   {
      $chars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789,-";
      srand((double)microtime()*1000000);
      $i = 0;
      $pass = '' ;
      while ($i<=$val) 
		{
        $num  = rand() % 33;
        $tmp  = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
		}
    return $pass;
    }	
?>
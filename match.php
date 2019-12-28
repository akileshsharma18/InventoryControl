<?php
session_start();
include("config.php"); //connect to db

mysqli_select_db($db_cn,"$dbname")or die("cannot select DB"); //Selecting db

if(!isset($_SESSION['uname1']))
{
	header("location:reset.php");
}

$tbn=$_SESSION['t'];
$com_name=$_SESSION['com_name'];
$ans=$_POST['answer'];
$uname=$_SESSION['uname1'];

				$result1=mysqli_query($db_cn, "select * from $com_name.$tbn where username='$uname'");
                $count=mysqli_num_rows($result1); 
				if($count==1)
                {
					while($row = mysqli_fetch_array($result1)) 
					{
						$answ=$row['answer'];
					
					}
					if($ans==$answ)
						header("Location:confirm.php");
					else
						header("Location:reset.php");
				}
				
				
											
?>
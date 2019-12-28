<?php

 include("config.php");
 session_start();
   mysqli_select_db($db_cn,"$dbname")or die("cannot select DB");
    if($_POST['pass']==$_POST['cpass']){

		$uid=$_SESSION["username"];
	    $tbn1=$_SESSION["design"];
		$tbn1=strtolower($tbn1);
		$com_name=$_SESSION["com_name"];
	date_default_timezone_set('Asia/Kolkata');
	$date1=date('Y-m-d');
	//$date1=(string)$date1;
	
		if ($tbn1=="shop_admin")
         {	
		 
			 $pass = $_POST['pass'];
			 //$pass1 = md5($pass);
			 $email = $_POST['email'];
			 $pnum = $_POST['pnum'];
			 $add = $_POST['add'];
			 $c=$com_name.'_shop_admin';
			 $result=mysqli_query($db_cn ,"UPDATE $c SET password='$pass', last_mod='$date1' WHERE username='$uid'");
			 $result2=mysqli_query($db_cn ,"SELECT * FROM $c WHERE username='$uid'");
			    $count=mysqli_num_rows($result2); 
				if($count==1)
                {
				while($row = mysqli_fetch_array($result2)) 
					{
						$empid1=$row["empid"];
					}
								 $e1=$com_name.'_employee';
			 $result1=mysqli_query($db_cn ,"UPDATE $e1 SET E_address='$add', E_alter_email='$email',  E_phone='$pnum' WHERE empid='$empid1'");
				if($result)
                {

						header("Location:shopadminsetting.php");
					}
					}

					else
					 {
						//header("Location:shopadminsetting.php");
		
					}
				
		 }
		 elseif ($tbn1=="shop_keeper")
		 {
			 
		if($_POST)
		{ 

			 $pass = $_POST['pass'];
			 //$pass1 = md5($pass);
			 $email = $_POST['email'];
			 //$pnum = $_POST['pnum'];
		     $c1=$com_name."_shop_keeper";
             $result=mysqli_query($db_cn , "UPDATE $c1 SET password='$pass', last_mod='$date1' WHERE username='$uid' ");
				$result5=mysqli_query($db_cn ,"SELECT * FROM $c1 WHERE username='$uid' ");
			    $count=mysqli_num_rows($result5); 
				if($count==1)
                {
				while($row = mysqli_fetch_array($result5)) 
					{
						$empid1=$row["empid"];
					}
								 $e1=$com_name.'_employee';
			 $result1=mysqli_query($db_cn ,"UPDATE $e1 SET E_alter_email='$email' WHERE empid='$empid1'");
				if($result1)
                {

						header("Location:keeperusersetting.php");
					}
					}
					else{
						//header("Location:setting.php");
			
					}

	}
	}
	
		elseif ($tbn1=="company_admin")//Company Admin Update
		 {	 
		if($_POST)
		{ 

			 $pass = $_POST['pass'];
			// $pass1 = md5($pass);
			 $add = $_POST['add'];
			 $email = $_POST['email'];
			 $pnum = $_POST['pnum'];
			 $url=$_POST['url'];
		     
             $result=mysqli_query($db_cn , "UPDATE company_admin SET password='$pass', last_mod='$date1', comaddress='$add', alter_email='$email', phoneno=$pnum WHERE username='$uid'");
        if($result)
        {
		header("Location:comsetting.php");
		}
		else{
			//header("Location:setting.php");
			
		}
		}
		}
	}
	?>
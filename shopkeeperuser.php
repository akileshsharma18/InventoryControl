<?php
session_start();
include("config.php"); //connect to db
mysqli_select_db($db_cn,"$dbname")or die("cannot select DB"); //Selecting db

				$uname=$_SESSION["username"];
				$cname=$_SESSION["com_name"];
				if(($_SESSION["username"]))
				{

				$cname1=strtolower($cname);
				$c3=$cname1.'_shop_keeper';
				$e3=$cname1.'_employee';
				$m3=$cname1.'_map';

				$result9 = mysqli_query($db_cn, "SELECT * FROM `$c3` WHERE username='$uname' ");
				$count=mysqli_num_rows($result9);
					if($count>=1)
					{
					while($row5 = mysqli_fetch_array($result9)) 
					{
						
						$img=$row5["imgpath"];
						$empid=$row5["empid"];
						$shopid=$row5["shop_id"];
					}
					}
					$result1=mysqli_query($db_cn, "SELECT * FROM `$e3` WHERE empid='$empid' ");
					while($row7 = mysqli_fetch_array($result1)) 
					{
						
						$fname=$row7["E_Name"];
					}
					$result2=mysqli_query($db_cn, "select * from `$m3` where shop_id='$shopid' ");
					while($row6 = mysqli_fetch_array($result2)) 
					{
						
						$city=$row6["city"];
					}

					$_SESSION["com_name"] = $cname;
					$_SESSION["ci"] = $city;
					$_SESSION["imgpath"] = $img;
					$_SESSION["tbn"] = "shop_keeper";
					$_SESSION["shop_id"]=$shopid;
				
			}
				else
				{
					header("location:signin.php");
				}
?>
<html>
	<head>
	<link rel="icon" href="Images/LogoMakr.png" type="image/png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		::-webkit-scrollbar 		{ width:0.50em;height:0.35em; background: #C6C6C6; }
		::-webkit-scrollbar-thumb 	{ background: #4586D3; border-radius:10px;}
		::-webkit-scrollbar-thumb:hover	{ background: #00658F; border-radius:10px; }

		 * {
			 box-sizing: border-box;
			 font-family: "Segoe UI Light",monospace;
		   }
		 .nav-bar{
			 position: relative;
			 background-color: #60b0f4;
			 top: 0px;
			 left: 0px;
			 z-index: 1;
			 position: fixed;
			 border-color: transparent;
		 }
		 .imgset{
			 position: absolute;
			 top: 0%;
			 left: 2%;
		 }

		#nav {
			height: 12%;
			background: transparent; // Transparent can also be used.
			display: block;
			position: fixed;
			width: 100%;
			z-index: 1;
			color: black;
			transition: all ease .3s;
		 }

		 #logo {
			top: 15%;
			color: black;
			font-size: 18px;
			transition: all ease .5s;
			height: 15% !important;
		 }

		 #nav.shrink {
		   height: 10%;
		   transition: all ease .7s;
		   background: white;// Change background on scroll
		   opacity: 0.8;
		 }


		 #nav.shrink #logo {
		   transition: all ease .5s;
		 }



		.sidenav {
			height: 100%; /* 100% Full-height */
			width: 0; /* 0 width - change this with JavaScript */
			position: fixed; /* Stay in place */
			z-index: 1; /* Stay on top */
			top: 0;
			left: 0;
			float: right;
			background-color: white; /* white*/
			overflow-x: hidden; /* Disable horizontal scroll */
			padding-top: 60px; /* Place content 60px from the top */
			transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
		}

		/* The navigation menu links */
		.sidenav a {
			padding: 8px 8px 8px 32px;
			text-decoration: none;
			font-size: 25px;
			color: black;
			display: block;
			transition: 0.3s;
			text-align: center;
		}

		/* When you mouse over the navigation links, change their color */
		.sidenav a:hover, .offcanvas a:focus{
			color: #667e99;
		}

		/* Position and style the close button (top right corner) */
		.sidenav .closebtn {
			position: absolute;
			top: 0;
			right: 25px;
			font-size: 36px;
			margin-left: 50px;
		}

		/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
		@media screen and (max-height: 450px) {
			.sidenav {padding-top: 15px;}
			.sidenav a {font-size: 18px;}
		}

		a{
			text-decoration: none;
			color: black;

		}
		.but{
            float: right;
            background-color: inherit;
            border: 0px;
            height: 100%;
            width: 15%;
            outline: none;
            font-size: 15px;
          }
          .but:hover {
            background-color: black;
            color: white;
		  transition: all 0.9s ease-out;
          }
		.chip {
		    display: inline-block;
		    height: 150px;
		    font-size: 16px;
		    background-color: transparent;
			margin-top: 0px;
		     border-radius: 50%;
		}

		.chip img {
		    float: left;
		    height: 150px;
		    width: 150px;
	         border-radius: 50%;
		}

		.tab {
	   		overflow: hidden;
			width: 100%;
	   		border: 1px solid #ccc;
		    background-image: url("Images/wallpaper1.jpg");
		    background-repeat: no-repeat;
		    background-size: cover;
		}

		/* Style the buttons inside the tab */
		.tab button {
			background-color: transparent;
			color: white;
		    width: inherit;
		    border: none;
		    outline: none;
		    cursor: pointer;
		    padding: 20px 16px ;
		    transition: 0.3s;
		    font-size: 17px;
		    width: 24.75%;
		}

		/* Change background color of buttons on hover */
		.tab button:hover {
		    background-color: #76946b;
		    opacity: 0.7;
		}

		/* Create an active/current tablink class */
		.tab button.active {
		    background-color: #7f7f7f;
		    opacity: 0.7;
		}

		/* Style the tab content */
		.tabcontent {
		    display: none;
		    padding: 6px 12px;
		    -webkit-animation: fadeEffect 1s;
		    animation: fadeEffect 1s;
		}

		.tabcontent1 {
		    padding: 6px 12px;
		    -webkit-animation: fadeEffect 1s;
		    animation: fadeEffect 1s;
		}
		/* Fade in tabs */
		@-webkit-keyframes fadeEffect {
		    from {opacity: 0;}
		    to {opacity: 1;}
		}

		@keyframes fadeEffect {
		    from {opacity: 0;}
		    to {opacity: 1;}
		}

		@media screen and (max-width: 1024px) {
			.tab button{width: 100%; }
			.tab{margin-top: 20%;}
		}

		.padman{
			margin-top: 10%;
		}

		.but1{
			background-color: transparent;
			color: black;
			height: 10%;
			width: 25%;
			outline: none;
			border-width: 1px;
			border-color: black;
			cursor: pointer;
			 font-size: 15px;
		}

		.but1:hover {
			background-color: black;
			color: white;
			transition: all 0.9s ease-in-out;
		}
		input[type=number]{
			width: 40%;
			height: 8%;
			border-top: 0px;
			border-left: 0px;
			border-right: 0px;
			outline: none;
			border-bottom-color: grey;
			color: black;
 		}
		input[type=text]{
			width: 40%;
			height: 8%;
			border-top: 0px;
			border-left: 0px;
			border-right: 0px;
			outline: none;
			border-bottom-color: grey;
			color: black;
 		}
		.but3{
			background-color: white;
			color: black;
			height: 5%;
			width: 10%;
			outline: none;
			cursor: pointer;
			font-size: 15px;
			border-color: black;
			font-weight: bold;
			border-width: 1px thin;
		}
		.but3:hover {
			background-color: black;
			color: white;
			transition: all 0.9s ease-in-out;
		}
		select{
                  width: 35%;
                  height: 5%;
                  background-color: transparent;
                  color: black;
                  outline: none;
                  border-top: 0px;
                  border-left: 0px;
                  border-right: 0px;
                  border-bottom-color:black;
                  border-bottom-width: 2;
                }

                select > option{
                  color: black;
                  background-color: lightgrey;
                  outline: none;
                  transition: all 0.9s ease-in-out;
                }
	</style>
	<script src="js/jquery.js"></script>
	<script src="js/navshrink.js"></script>
	<script src="js/new1.js"></script>
	</head>


	<body>

		<div class="nav-bar" id="nav">
			<div class="imgset" id="logo">
				<font size="6">
					<a href="MainPage.php"><b>Inventory Control</b></a>
				</font>
			</div>

			<div id="mySidenav" class="sidenav">
			  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			  <center>
			  	<div class="chip">
			  		<img src="<?php echo $img;?>" alt="Person" width="150" height="150">
			  	</div>
				<br><br>
				<font face="Segoe UI Light" size="5" color="black"><b>Hi! <?php echo $fname;?></b></font><br>
			</center>
			  <a href="keeperusersetting.php"> Deeper Settings.</a>
			  <a href="logout.php">Log out.</a>
			</div>

			<!-- Use any element to open the sidenav -->
	               <input type="button" name="" value="Setting" class="but" onclick="openNav()">
		</div>

	<div class="padman">
			<h1>
				<center>
					Perform your activities here.
				</center>
			</h1>


		<div class="tab">
		  <button class="tablinks active" id="view" onclick="openTab(event, 'Add')">History</button>
		  <button class="tablinks" onclick="openTab(event, 'Use')">Use of Material</button>
		  <button class="tablinks" onclick="openTab(event, 'Shop')">Shop to Shop</button>
		  <button class="tablinks" onclick="openTab(event,'Money')">Money Transaction</button>
		</div>


		<div id="Add" class="tabcontent" style="display: block;">
		  <h1><center>History</center></h1>
		  <p>
<table class="table table-striped" border="1" style="width: 100%;"><tbody>
<?php
$u=$_SESSION['com_name'];
$t=$u.'_history';
  $selectSQL = "SELECT * FROM `$t` WHERE from_loc='$city' or to_loc='$city'";
  if( !( $selectRes = mysqli_query( $db_cn,$selectSQL ) ) ){
    echo 'Retrieval of data from Database Failed - #';
  }else{?>
	<p> 
    <?php
			echo "		<tr>
						<th> From </th>
						<th> To </th>
						<th> Category </th>
						<th> Sent </th>
					</tr>";
     while( $row = mysqli_fetch_assoc( $selectRes ) )
	 {
		echo "<tr><td>{$row['from_loc']}</td></br>";
		echo "<td>"."{$row['to_loc']}</td>";
		echo "<td>{$row['cat_name']}</td>"; 
		echo "<td>{$row['No_of_pro']}</td></tr>";	
	 }
      }
  ?>
	  </p></tbody></table>
		  </p>
		  <h1><center>Number of Products</center></h1>
		  <p>
<table class="table table-striped" border="1" style="width: 100%;"><tbody>
<?php
$u=$_SESSION['com_name'];
$u.="_category";
  $selectSQL = "SELECT * FROM `$u` WHERE `shop_id`='$shopid'";
  if( !( $selectRes = mysqli_query( $db_cn,$selectSQL ) ) ){
    echo 'Retrieval of data from Database Failed - #'.mysqli_errno().': '.mysqli_error();
  }else{?>
	<p> 
    <?php
			echo "		<tr>
						<th> Category </th>
						<th> Number of Products </th>
					</tr>";
     while( $row = mysqli_fetch_assoc( $selectRes ) )
	 {
		echo "<tr><td>{$row['name']}</td></br>";
		echo "<td>"."{$row['noofpro']}</td></tr>";
	 }
      }
  ?>
	  </p></tbody></table>
		  </p>
		</div>

		<div id="Use" class="tabcontent">
		  <h1><u><center>USAGE.</center></u></h1>
		  <p>
				<form action='usage.php' method='POST'>
				
				                    Select Category<br>
                                      <select name="comname">
									  <option value=''>Select Category</option>
                                    <?php
									include("config.php"); //connect to db
									mysqli_select_db($db_cn,"$dbname")or die("cannot select DB"); //Selecting db
									$a=$cname."_category";
									$selectSQL1 = "SELECT * FROM `$a` where shop_id='$shopid'";
									if( !( $selectRes1 = mysqli_query( $db_cn,$selectSQL1 ) ) ){
										echo 'Retrieval of data from Database Failed - #';
									}else{?>
									<p> 
									<?php
									while( $row = mysqli_fetch_assoc( $selectRes1 ) )
									{
										echo "<a id={$row['name']}><option value={$row['name']}>{$row['name']}</option></a>";		
									}
									}
									?>
                                      </select><br><br>
				
					 Enter the number of material used.<input type="number" name="num" placeholder="Enter the number of material used.">
					<br><br>
					
					<input type="submit" class="but3" value="Submit">
				</form><BR><BR><BR>
				
				<h1><u><center>ADD Products.</center></u></h1>
								<form action='adding.php' method='POST'>
				
				                    Select Category<br>
                                      <select name="comname">
									  <option value=''>Select Category</option>
                                    <?php
									include("config.php"); //connect to db
									mysqli_select_db($db_cn,"$dbname")or die("cannot select DB"); //Selecting db
									$a=$cname."_category";
									$selectSQL1 = "SELECT * FROM `$a` where shop_id='$shopid'";
									if( !( $selectRes1 = mysqli_query( $db_cn,$selectSQL1 ) ) ){
										echo 'Retrieval of data from Database Failed - #';
									}else{?>
									<p> 
									<?php
									while( $row = mysqli_fetch_assoc( $selectRes1 ) )
									{
										echo "<a id={$row['name']}><option value={$row['name']}>{$row['name']}</option></a>";		
									}
									}
									?>
                                      </select><br><br>
				
					 Enter the number of material being added.<input type="number" name="num1" placeholder="Enter the number of material used.">
					<br><br>
                    
                                    Rack Number: <input type="number" name="rack" placeholder="Rack Number"><br><br>
                                    Shelf Number: <input type="number" name="shelf" placeholder="Shelf Number"><br><br>
                                    Room Number: <input type="number" name="room" placeholder="Room Number">
                                    <br><br>
					
					<input type="submit" class="but3" value="Submit">
				</form>
			</p>
		</div>

		<div id="Shop" class="tabcontent">
		  <h1><u><center>MOVE TO SHOP.</center></u></h1>
		  
		  <p><table class="table table-striped" border="1" style="width: 100%;" ><tbody>
<?php
$u=$_SESSION['com_name'];
$c=$u."_category";
  $selectSQL1 = "SELECT * FROM `$c` where shop_id='$shopid'";
  if( !( $selectRes1 = mysqli_query( $db_cn,$selectSQL1 ) ) ){
    echo 'Retrieval of data from Database Failed - #';
  }else{?>
	<p> 
    <?php
	echo "<h1><u><center>Alert</center></u></h1>";
				echo "		<tr>
						<th> Category </th>
						<th> Number of Products </th>
						<th> Shop ID </th>
					</tr>";	
     while( $row = mysqli_fetch_assoc( $selectRes1 ) )
	 {
		if($row['noofpro']<=($row['alert']+5) || $row['noofpro']<=($row['alert']-5) && $row['noofpro']!=NULL)
		{

		echo "<tr><td>{$row['name']}</td>";
		echo "<td>"."{$row['noofpro']}</td>";
		echo "<td>{$row['shop_id']}</td></tr>"; 
		}		
	 }
  }
  ?>
	  </p></tbody></table>
		  
		  <p>
				<form action="move.php" method="POST">
								    Select Category<br>
                                      <select name="cat">
									  <option value=''>Select Category</option>
                                    <?php
									include("config.php"); //connect to db
									mysqli_select_db($db_cn,"$dbname")or die("cannot select DB"); //Selecting db
									$a=$cname."_category";
									$selectSQL1 = "SELECT * FROM `$a` where shop_id='$shopid'";
									if( !( $selectRes1 = mysqli_query( $db_cn,$selectSQL1 ) ) ){
										echo 'Retrieval of data from Database Failed - #';
									}else{?>
									<p> 
									<?php
									while( $row = mysqli_fetch_assoc( $selectRes1 ) )
									{
										echo "<a id={$row['name']}><option value={$row['name']}>{$row['name']}</option></a>";		
									}
									}
									?>
                                      </select><br><br>
				
					 Enter the number of material to be moved.<input type="number" name="no" placeholder="Enter the number of material to be moved.">
					<br><br>
					Enter the Shop city to be moved.<!--Want a drop down menu-->
					<br><br>
					
					                <select name="city">
									  <option value=''>Select City</option>
                                    <?php
									include("config.php"); //connect to db
									mysqli_select_db($db_cn,"$dbname")or die("cannot select DB"); //Selecting db
									$a=$cname."_map";
									$selectSQL1 = "SELECT * FROM $a WHERE `shop_id`!='$shopid' AND `shop_id`!='NULL'";
									if( !( $selectRes1 = mysqli_query( $db_cn,$selectSQL1 ) ) ){
										echo 'Retrieval of data from Database Failed - #';
									}else{?>
									<p> 
									<?php
									while( $row = mysqli_fetch_assoc( $selectRes1 ) )
									{
										echo "<a id={$row['city']}><option value={$row['city']}>{$row['city']}</option></a>";		
									}
									}
									?>
                                      </select><br><br>
					Enter the mode of transport.<input type="text" name="mode" placeholder="Enter the number of material to be moved.">
					<br><br>
					<input type="submit" class="but1" value="Move">
				</form>
			</p>
		</div>

		<div id="Money" class="tabcontent" style="display: block;">
			<h1><u><center>Money Transactions.</center></u></h1>
			<p>
				<form action=".php" method="POST">
					Bank Account From: <input type="number" name="fromacc" placeholder="Enter the Account number From" required><br><br>
					Bank Account To: <input type="number" name="toacc" placeholder="Enter the Account number To" required><br><br>
					Amount to be transfered: <input type="number" name="amount" placeholder="Amount" required><br><br>
					To (Employee id): <select name="empid">						
						<?php
$u=$_SESSION['com_name'];
$c=$u.'_employee';
  $selectSQL1 = "SELECT empid FROM $c where empid!='$empid'";
  if( !( $selectRes1 = mysqli_query( $db_cn,$selectSQL1 ) ) ){
    echo 'Retrieval of data from Database Failed - #'.mysqli_errno().': '.mysqli_error();
  }else{?>
	<p> 
    <?php
     while( $row = mysqli_fetch_assoc( $selectRes1 ) )
	 {
		echo "<option value={$row['empid']}>{$row['empid']}</option>";		
	 }
      }
  ?>
					</select>><br><br><br>

					<input type="submit" class="but1" value="Transfer">
				</form>
			</p>

			<h1><u><center>Money Transactions.</center></u></h1>
			<p>
				<form action="addmoney.php" method="POST">
					Amount to be added: <input type="number" name="amount" placeholder="Amount" required><br><br>
					<br><br><br>

					<input type="submit" class="but1" value="ADD">
				</form>
			</p>

		</div>

	</div>
	</body>
</html>

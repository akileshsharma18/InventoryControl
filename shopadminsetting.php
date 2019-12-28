<?php
session_start();
include("config.php"); //connect to db
mysqli_select_db($db_cn,"$dbname")or die("cannot select DB"); //Selecting db
				$uname=$_SESSION["username"];
				$com_name=$_SESSION["com_name"];

				if(($_SESSION["username"]))
				{
				$s1=strtolower($com_name);
				$j1=$s1.'_shop_admin';
				$e1=$s1.'_employee';
				$m1=$s1.'_map';

				$result=mysqli_query($db_cn, "select * from `$j1` where username='$uname'");
                $count=mysqli_num_rows($result); 
				if($count==1)
                {
					while($row = mysqli_fetch_array($result)) 
					{
						$img=$row["imgpath"];
						$u_name=$row["username"];
						//$phno=$row["phoneno"];
						$last_mod=$row["last_mod"];
						$lldt=$row["lldt"];
						$regdate=$row["regdate"];
						$empid1=$row["empid"];
						$shopid1=$row["shop_id"];
					}
					$_SESSION["com_name"] = $com_name;
					$_SESSION["imgpath"] = $img;
					$_SESSION["username"] = $u_name;
					$_SESSION['empid']=$empid1;
					}

					$result3=mysqli_query($db_cn, "SELECT * FROM `$e1` WHERE empid='$empid1'");
					while($row1 = mysqli_fetch_array($result3)) 
					{
						
						$fname=$row1["E_Name"];
						$altemail=$row1["E_alter_email"];
						$phno=$row1["E_phone"];
						$shopadd=$row1["E_address"];
					}
					$result4=mysqli_query($db_cn, "SELECT * FROM `$m1` WHERE shop_id='$shopid1'");
					while($row2 = mysqli_fetch_array($result4)) 
					{
						
						$city=$row2["city"];
						
					}
					$_SESSION["city"] = $city;
				

				
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
       background: orange;// Change background on scroll
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

    .tablink {
    background-color: #555;
    color: white;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    font-size: 17px;
    width: 25%;
    margin-top: 0%;
}

  .tablink:hover {
      background-color: #777;
  }

  /* Style the tab content */
  .tabcontent {
      color: white;
      display: none;
      padding: 50px;
      -webkit-animation: fadeEffect 1s;
      animation: fadeEffect 1s;
      margin-top: 6%;
      margin-right: 0%;
      margin-left: 0%;
      height: 80%;
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
			.tablink {width: 100%; }
			.tablink{margin-top: 20%; width: 100%;}
		}

    #yourinfo {background-color:#34cbbc;}
    #edit {background-color:#d5bf2b;}
    #upload {background-color:#6cae51;}
    #del {background-color:#4364bc;}
    #rep {background-color:#59a678;}
		.padman{
			margin-top: 10%;
		}

		.but1{
			background-color: transparent;
			color: black;
			height: 10%;
			width: 100%;
			outline: none;
			border-width: 1.5px;
			border-color: black;
			cursor: pointer;
			font-size: 15px;
		}

		.but1:hover {
			background-color: black;
			color: white;
			transition: all 0.9s ease-in-out;
		}
    input[type=email], input[type=password], input[type=text], input[type=number]{
         width: 30%;
         background: transparent;
         height: 6%;
         font-size: 16px;
         font-weight: bold;
         border-top: 0px;
         border-left: 0px;
         border-right: 0px;
         outline: none;
         border-bottom-color: white;
         color: white;
    }

    input::-webkit-input-placeholder {
         color: white !important;
    }

    input[type=email]:focus ,input[type=password]:focus,input[type=text]:focus,input[type=number]:focus {
         border-bottom-color: black;
         transition: all 0.9s ease;
    }

		textarea{
			background-color: lightgreen;
			color: white;
			font-weight: bold;
			font-size: 18px;
		}
		textarea::-webkit-input-placeholder{
			color: white !important;
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
					<b><?php echo $com_name;?></b>
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
        <a href="shopadminuser.php">Go Back to Manage Inventory.</a>
			  <a href="logout.php">Log out.</a>
			</div>

			<!-- Use any element to open the sidenav -->
	               <input type="button" name="" value="Go Back." class="but" onclick="openNav()">
		</div>


    <div id="yourinfo" class="tabcontent" style="display: block;">
      <h1><u>Your Info.</u></h1>
      <p>
        <label>Username: <?php echo $u_name;?></label><br><br>
				<label>Shop Address: <?php echo $shopadd;?></label><br><br>
				<label>First Name: <?php echo $fname;?></label><br><br>
				<label>Phone No: <?php echo $phno;?></label><br><br>
				<label>Organization Name: <?php echo $com_name;?></label><br><br>
				<label>City Name: <?php echo $city;?></label><br><br>
				<label>Alternate Email: <?php echo $altemail;?></label><br><br>
				<label>Registered Date: <?php echo $regdate;?></label><br><br>
				<label>Last Login Date: <?php echo $lldt;?></label><br><br>
				<label>Last Modified Date: <?php echo $last_mod;?></label>
				
      </p>
    </div>

    <div id="edit" class="tabcontent">
      <h1><u>Edit My account</u></h1><br>
      <p>
        <form action="updateacc.php" method="POST">
             Organization Name: <input type="text" name="" value="<?php echo $com_name;?>"  disabled>
             Email: <input type="email" name="" value="<?php echo $u_name;?>" disabled><br><br><br>
             Password: <input type="password" name="pass" placeholder="Password" required>
             Confirm Password: <input type="password" name="cpass" placeholder="Confirm Password" required><br><br><br>
			City or Region: <input type="text" name="" value="<?php echo $city;?>"  disabled>
             Alternate Email: <input type="email" name="email" value="<?php echo $altemail;?>" required><br><br>
			 Address: <input type="text" name="add" value="<?php echo $shopadd;?>" required><br><br>
			 Shop Phone Number: <input type="number" name="pnum" value="<?php echo $phno;?>" required><br><br>
             <center>
               <input type="submit" name="" value="Submit." class="but1">
             </center>
        </form>
      </p>
    </div>


    <div id="del" class="tabcontent">
      <h1><u>Delete my Account.</u></h1>
      <p>
        <form action="delacc.php" method="POST">
          <input type="submit" value="Delete my account." class="but1" onclick="alert('We are Sorry to see you go!. Thanks for using IntMgt.')">
        </form>
      </p>
    </div>

    <div id="rep" class="tabcontent">
      <h1><u>Report a Bug..</u></h1>
      <p>
        <form action="feedback.php" method="POST">
    			<textarea placeholder="Report the bug here: " class="form-control" rows="10" cols="100" id="bug" name="feedback"></textarea><br><br>
					<input type="submit" value="Submit your Feedback/Bug" class="but1" onclick="alert('Thank You for your help. This means a lot to us.')">
        </form>
      </p>
    </div>

    <button class="tablink active" style="background-color: #34cbbc;" onclick="openBottomTab('yourinfo', this, '#34cbbc')">Your Account Info.</button>
    <button class="tablink" onclick="openBottomTab('edit', this, '#d5bf2b')">Edit my Account.</button>
    <button class="tablink" onclick="openBottomTab('del', this, '#4364bc')">Delete my Account.</button>
    <button class="tablink" onclick="openBottomTab('rep', this, '#59a678')">Report a Bug.</button>
	</body>
</html>

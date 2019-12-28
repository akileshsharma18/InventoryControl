<?php
session_start();
include("config.php"); //connect to db
mysqli_select_db($db_cn,"$dbname")or die("cannot select DB"); //Selecting db

				if(isset($_SESSION["username"]))
				{
				$uname=$_SESSION["username"];
				$result=mysqli_query($db_cn, "select * from `company_admin` where username='$uname'");
                $count=mysqli_num_rows($result); 
				if($count==1)
                {
					while($row = mysqli_fetch_array($result)) 
					{
						$com_name=$row["com_name"];
						$img=$row["imgpath"];
						$fname=$row["fname"];
					}
					//$com_name=strtolower($com_name);
					$_SESSION["com_name"] = $com_name;
					$_SESSION["imgpath"] = $img;
					$_SESSION["tbn"] = "company_admin";
				}
				}
				else
				{
					header("location:signin.php");
				}
?>
<html>
	<head>
	<link rel="icon" href="Images/LogoMakr.png" type="image/png">
        
    		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

			<!-- jQuery library -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

			<!-- Latest compiled JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

			<script src="http://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyD0X4v7eqMFcWCR-VZAJwEMfb47id9IZao"></script>

    
        
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
		    padding: 20px 16px;
		    transition: 0.3s;
		    font-size: 17px;
		    width: 19.77%;
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

		table{
			border: 1px;
			border-style: solid;
			width: 100%;
		}
		th{
			border: 1px;
			border-style: solid;
			text-align: center;
		}
		td{
			text-align: left;
			padding-left: 3%;
		}
		input[type=text]{
			width: 40%;
			height: 10%;
			border-top: 0px;
			border-left: 0px;
			border-right: 0px;
			border-bottom-color: black;
			outline: none;
		}
		input[type=number]{
			width: 40%;
			height: 10%;
			border-top: 0px;
			border-left: 0px;
			border-right: 0px;
			border-bottom-color: black;
			outline: none;
		}
		select{
			width: 40%;
			height: 10%;
			border-top: 0px;
			border-left: 0px;
			border-right: 0px;
			border-bottom-color: black;
			outline: none;
		}
		select:focus{
			border-bottom-color: darkgrey;
			transition: all 0.9s ease-in;
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
					<b><?php echo $com_name?></b>
				</font>
			</div>

			<div id="mySidenav" class="sidenav">
			  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			  <center>
			  	<div class="chip">
			  		<img src="<?php echo $img?>" alt="Company Logo" width="150" height="150">
			  	</div>
				<br><br>
				<font face="Segoe UI Light" size="5" color="black"><b>Hi! <?php echo $fname?></b></font><br>
			</center>
			  <a href="comsetting.php"> Deeper Settings.</a>
			  <a href="logout.php">Log out.</a>
			</div>

			<!-- Use any element to open the sidenav -->
	               <input type="button" name="" value="Setting" class="but" onclick="openNav()">
		</div>

	<div class="padman">
			<h1>
				<center>
					IntMgt.
				</center>
			</h1>
			<h2>
				<center>
					Perform your activities here.
				</center>
			</h2>


		<div class="tab">
		  <button class="tablinks active" id="view" onclick="openTab(event, 'Add')">DASHBOARD</button>
		  <button class="tablinks" onclick="openTab(event, 'Use')">MANAGE ADMINS</button>
		  <button class="tablinks" onclick="openTab(event,'AddorRemove')">ADD/REMOVE</button>
		  <button class="tablinks" onclick="openTab(event,'Request')">NOTIFICATIONS</button>
		  <button class="tablinks" onclick="openTab(event,'Money')">MONEY TRANSACTION</button>
		</div>


		<div id="Add" class="tabcontent" style="display: block;">
		  <h1><center><u>DASHBOARD</u></center></h1><br>
					<center>
						<h1>Employee List.</h1>
					</center>

				<p><table class="table table-striped"><tbody>
<?php
$com_name1=strtolower($com_name);
$c1=$com_name1.'_employee';
  $selectSQL = "SELECT * FROM  $c1 ";
  $selectRes = mysqli_query( $db_cn, $selectSQL );
  if(! ( $selectRes ) ){
    echo 'Retrieval of data from Database Failed - #';
  }else{?>
	<p> 
    <?php
			echo "		<tr>
						<th> Employee ID: </th>
						<th> Name </th>
						<th> Gender </th>
						<th> Phone No </th>
					</tr>";
     while( $row = mysqli_fetch_assoc( $selectRes ) )
	 {
		echo "<tr><td>{$row['empid']}</td></br>";
		echo "<td>"."{$row['E_Name']}</td>";
		echo "<td>{$row['E_Gender']}</td>"; 
		echo "<td>{$row['E_phone']}</td></tr>";	
	 }
      }
  ?>
	  </p></tbody></table>
		  </p>
        
		  
		  			<center>
						<h1>History / Usage.</h1>
					</center>

				<p><table class="table table-striped"><tbody>
<?php
$c2=$com_name1.'_history';
  $selectSQL = "SELECT * FROM $c2 ";
   $selectRes = mysqli_query( $db_cn, $selectSQL );
  if( !( $selectRes) ){
    echo 'Retrieval of data from Database Failed - #';
  }else{?>
	<p> 
    <?php
			echo "		<tr>
						<th> From </th>
						<th> To </th>
						<th> Category </th>
						<th> Number of Item sent </th>
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

	  <div class=" no-padding col-lg-12 col-md-12 col-sm-12 col-xs-12">
<br><br><div id="map" style="width:100%; height: 400px;"></div>
    <script>
      var customLabel = {
        H: {
          label: 'H'
        },
        S: {
          label: 'S'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(22.9734, 78.6569),
          zoom: 4
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('mapmarker2.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
             // var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('city');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-bGmRuwcTZKa8gKyV-RDUsHqvtppAbSY&callback=initMap">
    </script><br><br></div><br><br>


        </div>
		  </p>
		</div>

		<div id="Use" class="tabcontent">
		  <h1><u><center>MANAGE NEW ADMINS</center></u></h1>
				
				<p><table class="table table-striped"><tbody>
<?php
$u=$_SESSION['com_name'];
$e=$u.'_employee';
$u=$u.'_shop_admin';

  $selectSQL = "SELECT * FROM $u WHERE `approval`='0'";
  if( !( $selectRes = mysqli_query( $db_cn,$selectSQL ) ) ){
    echo 'Retrieval of data from Database Failed - #'.mysqli_errno().': '.mysqli_error();
  }else{?>
	<p> 
    <?php
			echo "		<tr>
						<th> Shop Admin Name </th>
						<th> Employee ID </th>
						<th> Username </th>
						<th> Approve/Reject </th>
					</tr>";
     while( $row = mysqli_fetch_assoc( $selectRes ) )
	 {
		$empid2=$row['empid'];
		$selectSQL5 = "SELECT * FROM `$e` WHERE `empid`='$empid2' ";
		$selectRes5 = mysqli_query( $db_cn, $selectSQL5 );
		while( $row1 = mysqli_fetch_assoc( $selectRes5 ) )
	 {
		echo "<td>{$row1['E_Name']}</td>";
	 }
	 echo "<td>{$row['empid']}</td>"; 
		echo "<td>{$row['username']}</td>";
		echo "<td><a href='approve.php?id={$row['username']}'><input type='submit' value='Approve'></td></tr>";		
	 }
      }
  ?>
	  </p></tbody></table>
		  </p>
			</p>
		</div>

		<div id="AddorRemove" class="tabcontent">
		  <h1><u><center>ADD/REMOVE CATEGORIES.</center></u></h1>
				<form action="newcat.php" method="POST">
					Add a new Category: <input type = "text" name="name" placeholder="Add a Category"><br><br>
					Alert: <input type = "number" name="no" placeholder="Alert No"><br><br>
					<input type="Submit" name="" class="but1" value="Add"><br><br>
					</form><br><br>
					<form action="remcat.php" method="POST">
					Remove a Category:
					<select name="cat">						
						<?php
$u=$_SESSION['com_name'];
$c=$u.'_category';
  $selectSQL1 = "SELECT Distinct name FROM $c";
  if( !( $selectRes1 = mysqli_query( $db_cn,$selectSQL1 ) ) ){
    echo 'Retrieval of data from Database Failed - #'.mysqli_errno().': '.mysqli_error();
  }else{?>
	<p> 
    <?php
     while( $row = mysqli_fetch_assoc( $selectRes1 ) )
	 {
		echo "<option value={$row['name']}>{$row['name']}</option>";		
	 }
      }
  ?>
					</select>
					<input type="Submit" name="" class="but1" value="Remove">
				</form>
			</p>

		</div>

		<div id="Request" class="tabcontent">
		  <h1><u><center>NOTIFICATIONS.</center></u></h1>
			<p>
				<h1><u><center>Feedback</center></u></h1>
				<p><table class="table table-striped"><tbody>
<?php
$u=$_SESSION['com_name'];
$c=$u."_feedback";
  $selectSQL1 = "SELECT * FROM $c WHERE `to`='Company_Admin'";
  if( !( $selectRes1 = mysqli_query( $db_cn,$selectSQL1 ) ) ){
    echo 'Retrieval of data from Database Failed - #'.mysqli_errno().': '.mysqli_error();
  }else{?>
	<p> 
    <?php
			echo "		<tr>
						<th> Feedback </th>
						<th> From Emp_ID</th>
						<th> Date </th>
					</tr>";
     while( $row = mysqli_fetch_assoc( $selectRes1 ) )
	 {
		echo "<tr><td>{$row['feedback']}</td></br>";
		echo "<td>"."{$row['from_empid']}</td>";
		echo "<td>{$row['date']}</td></tr>"; 	
	 }
      }
  ?>
	  </p></tbody></table>
		  </p>
			</p>
			
			<p>
				
				<p><table class="table table-striped"><tbody>
<?php

$c=$com_name1."_category";
  $selectSQL1 = "SELECT * FROM $c";
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
		if($row['noofpro']<=($row['alert']+5) && $row['noofpro']!=NULL)
		{

		echo "<tr><td>{$row['name']}</td>";
		echo "<td>"."{$row['noofpro']}</td>";
		echo "<td>{$row['shop_id']}</td></tr>"; 
		}		
	 }
  }
  ?>
	  </p></tbody></table>
		  </p>
			</p>			
			
	

		</div>



	</div>

		<div id="Money" class="tabcontent" style="display: block;">
			<h1><u><center>Money Transactions.</center></u></h1>
			<p>
				<form action="money.php" method="POST">
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
					</select><br><br><br>

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



	</body>
</html>

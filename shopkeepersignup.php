
<html>
     <head>

          <link rel="icon" href="Images/LogoMakr.png" type="image/png">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

			<!-- jQuery library -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

			<!-- Latest compiled JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

			<script src="http://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyD0X4v7eqMFcWCR-VZAJwEMfb47id9IZao"></script>


         
          <style>
              ::-webkit-scrollbar 		{ width:0.50em;height:0.35em; background: #C6C6C6; }
              ::-webkit-scrollbar-thumb 	{ background: #4586D3; border-radius:10px;}
              ::-webkit-scrollbar-thumb:hover	{ background: #00658F; border-radius:10px; }

              @media screen and (max-height: 450px) {
                   *  {padding-top: 15px; width: 80%;}
                    * a {font-size: 18px;}
              }
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
                .but{
                  float: right;
                  opacity: 0.9;
                  background-color: transparent;
                  color: black;
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
                a{
                     text-decoration: none;
                     color: black;
                }
                	#nav {
                  height: 12%;
                  background: transparent; // Transparent initial setting
                  display: block;
                  position: fixed;
                  width: 100%;
                  z-index: 1;
                  color: black;
                  transition: all ease .3s;
                }

                #logo {
                     top: 15%;
                     color: white;
                     font-size: 18px;
                     transition: all ease .5s;
                     height: 15% !important;
                }

                #nav.shrink {
                  height: 10%;
                  transition: all ease .7s;
                  background: orange;// Change background on scroll or can be transparent.
                  opacity: 0.8;
                }


                #nav.shrink #logo {
                  transition: all ease .5s;
                }

                input[type=email], input[type=password], input[type=text], input[type=number]{
                     width: 45%;
                     background: transparent;
                     height: 3%;
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
                     border-bottom-color: blue;
                     width: 70%;
                     transition: all 0.9s ease;
                }
                .container{
                     margin-top: 2%;
                }
                 .bg {
                      background-image: url("Images/P4Y170.jpg");
                      height: 350%;
                      background-position: center;
                      background-repeat: no-repeat;
                      background-size: cover;
                 }
                 .signupstyle{
                     background-color: transparent;
                     color: black;
                     height: auto;
                     width: 100%;
                     align: center;
                     
                    border-radius: 5px;
                }
              
              .signupstyle1{
                     background-color: transparent;
                     color: black;
                     height: auto;
					 width: 100%;
					 font-size: 16px;
                     align: center;
                    border-radius: 5px;
					margin-left: 20%;
                }
              
                .signup{
                     color: black;
                     font-weight: bold;
                     text-align: left;
                    margin-left: 15%;
                }
                .but1{
                     background-color: transparent;
                     color: black;
                     border-width: 1px;
                     border-color: black;
                     height: 2%;
                     width: 100%;
                     outline: none;
                     font-weight: bold;
                     font-size: 20px;
                }
                .but1:hover {
                     color:white;
                     background-color: black;
                     transition: all 0.9s ease-in-out;
                }

                select{
                  width: 35%;
                  height: 3.5%;
                  background-color: transparent;
                  color: white;
                  outline: none;
                  border-top: 0px;
                  border-left: 0px;
                  border-right: 0px;
                  border-bottom-color:white;
                  border-bottom-width: 2;
                }

                select > option{
                  color: black;
                  background-color: lightgrey;
                  outline: none;
                  transition: all 0.9s ease-in-out;
                }
              
              
                            #map {
					height: 300px;
					width: 85%;
					margin-left: 0px;
				  }
				  #description {
					font-family: Roboto;
					font-size: 15px;
					font-weight: 300;
				  }

				  #infowindow-content .title {
					font-weight: bold;
				  }

				  #infowindow-content {
					display: none;
				  }

				  #map #infowindow-content {
					display: inline;
				  }

				  .pac-card {
					margin: 10px 10px 0 0;
					border-radius: 2px 0 0 2px;
					box-sizing: border-box;
					-moz-box-sizing: border-box;
					outline: none;
					box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
					background-color: #fff;
					font-family: Roboto;
				  }

				  #pac-container {
					padding-bottom: 12px;
					margin-right: 12px;
				  }

				  .pac-controls {
					display: inline-block;
					padding: 5px 11px;
				  }

				  .pac-controls label {
					font-family: Roboto;
					font-size: 13px;
					font-weight: 300;
				  }

				  #pac-input {
					background-color: transparent;
					font-family: Segoe UI Light;
				  }

				  #title {
					color: #222;
					background-color: #4d90fe;
					font-size: 25px;
					font-weight: 500;
					padding: 6px 12px;
				  }
				  #target {
					width: 345px;
				  }

           </style>

          <script src="js/jquery.js"></script>
     	<script src="js/navshrink.js"></script>
       </head>

       <body class="bg">
          <div class="nav-bar" id="nav">
             <div class="imgset" id="logo">
               <font size="6">
                        <a href="MainPage.php"><b> Inventory Control</b></a>
               </font>
             </div>

             <a href="signin.php">
                  <input type="button" name="" value="Sign-In" class="but">
             </a>
          </div>

          <div class="container">
                         <br><br><br><h1>Create your Administrative account here to manage further.</h1><br><br>
                   <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="signupstyle">
                         <div class="signup">
                              <form action="shopkeepsignup.php" method="POST">
                                  <h1><center>Organization Information</center></h1><br><br>
                                  
                                   
                                   Employee ID:<br> <input type="text" name="empid" placeholder="Employee ID" required><br><br>

                                   Organization to be Sign-uped for:<br>
                                      <select name="comname">
									  <option value=''>Select Organization</option>
                                    <?php
									include("config.php"); //connect to db
									mysqli_select_db($db_cn,"$dbname")or die("cannot select DB"); //Selecting db
									$selectSQL1 = "SELECT * FROM `company_admin`";
									if( !( $selectRes1 = mysqli_query( $db_cn,$selectSQL1 ) ) ){
										echo 'Retrieval of data from Database Failed - #'.mysqli_errno().': '.mysqli_error();
									}else{?>
									<p> 
									<?php
									while( $row = mysqli_fetch_assoc( $selectRes1 ) )
									{
										echo "<a href='getcname.php?id={$row['com_name']}'><option value={$row['com_name']}>{$row['com_name']}</option></a>";		
									}
									}
									?>
                                      </select><br><br>

	<?php
	//include("getcname.php");

	?>

<br>
									  Enter City:<br><input type="text" name="city" id="pac-input" placeholder="Shop City"required><br><br>
                                      
                                  
                                <!--  <input type="text" name="lat" style="visibility:hidden;" id="latitude" placeholder="Latitude"/>
							<input type="text" name="lng" style="visibility:hidden;" id="longitude" placeholder="Longitude"/>
							<div id="map"></div>
							  <script>
							  document.getElementById('my-button').onclick = function () {
								var input = document.getElementById('pac-input');

								google.maps.event.trigger(input, 'focus')
								google.maps.event.trigger(input, 'keydown', { keyCode: 13 });
							};


								  function initAutocomplete() {
									var map = new google.maps.Map(document.getElementById('map'), {
									  center: {lat: 12.9716, lng: 77.5946},
									  zoom: 13,
									  mapTypeId: 'roadmap'
									});

									// Create the search box and link it to the UI element.
									var input = document.getElementById('pac-input');
									var searchBox = new google.maps.places.SearchBox(input);
									//map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);

									// Bias the SearchBox results towards current map's viewport.
									map.addListener('bounds_changed', function() {
									  searchBox.setBounds(map.getBounds());
									});

									var markers = [];
									// Listen for the event fired when the user selects a prediction and retrieve
									// more details for that place.
									searchBox.addListener('places_changed', function() {
									  var places = searchBox.getPlaces();

									  if (places.length == 0) {
										return;
									  }

									  // Clear out the old markers.
									  markers.forEach(function(marker) {
										marker.setMap(null);
									  });
									  markers = [];

									  // For each place, get the icon, name and location.
									  var bounds = new google.maps.LatLngBounds();
									  places.forEach(function(place) {
										if (!place.geometry) {
										  console.log("Returned place contains no geometry");
										  return;
										}
										var icon = {
										  url: place.icon,
										  size: new google.maps.Size(71, 71),
										  origin: new google.maps.Point(0, 0),
										  anchor: new google.maps.Point(17, 34),
										  scaledSize: new google.maps.Size(25, 25)
										};

										// Create a marker for each place.
										markers.push(new google.maps.Marker({
										  map: map,
										  icon: icon,
										  title: place.name,
										  position: place.geometry.location,
			 
										}));
									var lat=place.geometry.location.lat();
									var lng=place.geometry.location.lng();
								  document.getElementById('latitude').value=lat;
								  document.getElementById('longitude').value=lng;
										if (place.geometry.viewport) {
										  // Only geocodes have viewport.
										  bounds.union(place.geometry.viewport);
										} else {
										  bounds.extend(place.geometry.location);
										}
									  });
									  map.fitBounds(bounds);
									});
								  }

	  
	  
								</script>
								 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-bGmRuwcTZKa8gKyV-RDUsHqvtppAbSY&libraries=places&callback=initAutocomplete">
							     </script>
								 <br><br>-->

                                  </div>
                        </div>
                       </div>
                                  
                            
                                  
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<h1><center>Personal Information</center></h1><br><br>
						<div class="signupstyle1">
							First Name: <br><input type="text" name="fname" placeholder="First Name" required><br><br>
							Username:<br> <input type="email" id="uname" name="uname" placeholder="abcd1234@something.com" required><br><br>
                            Password:<br> <input type="password" name="pass" placeholder="Password" required><br><br>
                            Confirm Password:<br> <input type="password" name="cpass" placeholder="Confirm Password" required><br><br>
							Phone: <br><input type="number" name="perpho" placeholder="Phone"required><br><br>
							Alternate Email: <br><input type="email" name="altemail" placeholder="Alternate Email."required><br><br>
							Address: <br><input type="text" name="address" placeholder="Enter you Address here." required><br><br>
							Question: <br><input type="text" name="que" placeholder="Enter you Question here." required><br><br>
							Answer: <br><input type="text" name="ans" placeholder="Answer" required><br><br>
							Gender: <br>
								<input type="radio" name="gen" value='Male'> Male
								<input type="radio" name="gen" value='Female'> Female<br><br>
							Age: <br><input type="number" name="age" placeholder="Age" required><br><br>
							
							Salary: <br><input type="number" name="salary" placeholder="Salary" required><br><br>
							Experience: <br><input type="number" name="exp" placeholder="Experience" required><br><br>
							Specialization: <br><input type="text" name="special" placeholder="Specialization" required><br><br>
						</div>
					</div>
					 <input type="submit" name="" value="Submit." class="but1">
					</form>

                         </div>
                    </div>
          </div>
       </body>
</html>

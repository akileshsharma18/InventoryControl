<?php
session_start();
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
                .but{
                  float: right;
                  opacity: 0.9;
                  background-color: grey;
                  color: white;
                  border: 0px;
                  height: 100%;
                  width: 15%;
                  outline: none;
                  font-size: 15px bold;
                }
                .but:hover {
                  background-color: lightgrey;
                  color: black;
                  transition: all 0.9s ease-out;
                }
                a{
                     text-decoration: none;
                     color: white;
                }
                	#nav {
                  height: 12%;
                  background: transparent; // Transparent initial setting
                  display: block;
                  position: fixed;
                  width: 100%;
                  z-index: 1;
                  color: white;
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

                .signinstyle{
                     padding-top: 6%;
                     align: center;
                     position: relative;
                     margin-left: -0.60%;
                     margin-right: -0.60%;
                     left: 0px;
                     padding-right: 3%;
                     height: 100%;

                }
                .login{
                     background-color: white;
                     color: black;
                     height: auto;
                     width: 40%;
                     float: right;
                     align: left;
                     border-radius: 5px;
                     box-shadow: 7px 7px 5px #888888;
                }
                .bg {
                     background-image: url("Images/bg.jpg");
                     height: 95%;
                     background-position: center;
                     background-repeat: no-repeat;
                     background-size: cover;
                }

                input[type=email], input[type=password]{
                     width: 50%;
                     height: 8%;
                     border-top: 0px;
                     border-left: 0px;
                     border-right: 0px;
                     outline: none;
                     border-bottom-color: grey;
                     color: black;
                }

                input[type=email]:focus ,input[type=password]:focus {
                     border-bottom-color: blue;
                     transition: all 0.9s ease-in;
                }

                .but1{
                     background-color: white;
                     width: 100%;
                     border: 0px;
                     height: 10%;
                     outline: none;
                }
                 .but1:hover{
                      background-color: black;
                      color: white;
                      transition: all 0.9s ease-in-out;
                 }


                .pad{
                     padding-left: 5%;
                }

                label > input{ /* HIDE RADIO */
                  visibility: hidden; /* Makes input not-clickable */
                  position: absolute; /* Remove input from document flow */
                }
                label > input + img{ /* IMAGE STYLES */
                  cursor:pointer;
                  margin-left: 0px;
                }
                label > input:checked + img{ /* (RADIO CHECKED) IMAGE STYLES */
                  opacity: 0.1;
                }
                .img-circle{
                   border-radius: 50%;
                   padding: 20px;
                   width: 30%;
                   height: 30%;
                }
                .inli{
                  display: inline;
                }
				.dropdowwnstyle{
					height: 10%;
					width: 75%;
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

            <a href="mainsignup.html">
                 <input type="button" name="" value="Sign-Up" class="but">
            </a>
          </div>
               <div class="signinstyle">
                    <div class="login">
                         <font size="6">
                              <br><center>
                                             Login using your ID.
                                  </center>
                          </font>
                         <form action="login.php" method="POST">
                              <div class="inli">
                                <label>
                                  <input type="radio" name="type1" value="company_admin" img="Images/admin.png" required>
                                  <img src="Images/admin.png" width="175px" height="175px;" class="img-circle">
                               </label>
                               <label>
                                 <input type="radio" name="type1" value="shop_admin" img="Images/shopadmin.png" required>
                                 <img src="Images/shopadmin.png" width="175px" height="175px;" class="img-circle">
                              </label>
                              <label>
                                <input type="radio" name="type1" value="shop_keeper" img="Images/shop.png" required>
                                <img src="Images/shop.png" width="175px" height="175px;" class="img-circle">
                             </label>
                             </div>
                              <div class="pad">
                                   Email: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="email" name="username" placeholder="abcd1234@something.com" required><br>
                                   Password: <input type="password" name="password" placeholder="Password" required><br><br>

								   Select your Company Name:<br><br>
                                      <select name="com_name" class="dropdownstyle">
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
								   <!--No remeber me check box-->
								   <input type="checkbox" name="remember_me"> Stay signed in
                              </div>
                              <input type="submit" name="" value="Login" class="but1"><br>
                              <font size=4>
                                   <a href="reset.php" style="padding-left: 5%; color: black;">
                                        Forgot Password?
                                   </a>
                              </font><br><br>
                              <center>
                                   <font size="4">
                                        Don't have an account then make one. Sign-Up from<br>above for free.
                                   </font>
                              </center>
                         </form>
                    </div>
               </div>
       </body>
</html>

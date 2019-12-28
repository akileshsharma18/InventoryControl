<?php
session_start();
$tbn=$_SESSION['t'];
$uname=$_SESSION['uname1'];
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
                   background-color: inherit;
                   border: 0px;
                   height: 100%;
                   width: 15%;
                   outline: none;
                   font-size: 15px;
                 }
                 .but:hover {
                   background-color: black;
                   transition: background-color 0.9s ease-out;
                   color: white;
                 }
                 a{
                      text-decoration: none;
                      color: black;

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

                 .forgot{
                      margin-top: 9%;
                 }

                 .forgotpass{
                      background-color: lightgrey;
                      color: black;
                      height: 50%;
                      width: 55%;
                      align: left;
                      box-shadow: 7px 7px 5px #888888;
                 }

                 input[type=password]{
					  padding-left: 2%;
                      border-top: 0px;
                      border-bottom-color: #ff3300;
                      border-left: 0px;
                      border-right: 0px;
                      background-color: inherit;
                      outline: none;
                      width: 30%;
                      font-size: 15px;
                 }

                 
                 input::-webkit-input-placeholder {
                     color: black !important;
                }
                .but1{
                     background-color: inherit;
                     border: 0px;
                     height: 15%;
                     width: 100%;
                     outline: none;
                     font-size: 15px;
                   }
                  .but1:hover {
                     background-color: black;
                     transition: background-color 0.9s ease-out;
                     color: white;
                   }
          </style>
          <script src="js/jquery.js"></script>
     	<script src="js/navshrink.js"></script>
     </head>

     <body>
          <div class="nav-bar" id="nav">
            <div class="imgset" id="logo">
              <font size="6">
                        <a href="MainPage.php"><b>Inventory Control</b></a>
              </font>
            </div>

            <a href="signin.html">
                 <input type="button" name="" value="Sign-In" class="but">
            </a>
          </div>
			
          <div class="forgot">
               <center>
                    <font size ="6">
                         Change your Password<br><br>
                    </font>
					
                    <div class="forgotpass">
					<br><br><br><br>
                         <form action = "change.php" method = "POST">
                              <br>Your New Password: 
                              <input required type="password" name="pass1" placeholder="New Password">
                              <br><br>
							  <br>Confirm your New Password: 
                              <input required type="password" name="cpass1" placeholder="Confirm Password"><br><br>
                              <input type="submit" name="" value="Submit" class="but1"><br><br>
                         </form>
                    </div>
               </center>
          </div>
     </body>
</html>				
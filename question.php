<?php
session_start();
include("config.php"); //connect to db

mysqli_select_db($db_cn,"$dbname")or die("cannot select DB"); //Selecting db

if(!isset($_SESSION['uname1']))
{
	header("location:reset.php");
}

$tbn=$_POST['type1'];
$com_name=$_POST['com_name'];
$_SESSION['t']=$tbn;
$_SESSION['com_name']=$com_name;
$uname=$_POST['username'];
$_SESSION['uname1']=$uname;

if($tbn!='company_admin')
{
	$tbn1=$com_name.$tbn;
}
$ques=mysqli_query($db_cn, "select question from `$tbn1` where username='$uname'");
                $count=mysqli_num_rows($ques); 
				if($count==1)
                {
					while($row = mysqli_fetch_array($result)) 
					{
						$ques=$row["question"];
					}	
				}
				else
					header("Location:reset.php");
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

                 input[type=text]{
                      text-align:center;
                      border-top: 0px;
                      border-bottom-color: #ff3300;
                      border-left: 0px;
                      border-right: 0px;
                      background-color: inherit;
                      outline: none;
                      width: 30%;
                      font-size: 15px;
                 }

                 input[type=text]:hover {
                      width: 70%;
                      border-bottom-color: #bfb52b;
                      color: black;
                      transition: all 0.9s ease-in-out;
                 }
                 input[type=text]:focus {
                      width: 90%;
                      border-bottom-color: #2cbe33;
                      color: black;
                      transition: all 0.9s ease-in-out;
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

            <a href="signin.php">
                 <input type="button" name="" value="Sign-In" class="but">
            </a>
          </div>
			
          <div class="forgot">
               <center>
                    <font size ="6">
                         Enter the answer to the question.<br><br>
                    </font>
					
                    <div class="forgotpass">
					<br><br><br><br>
                         <form action = "match.php" method = "POST">
						 
							   <label>
									<?php echo $ques;?>
							   </label><br>
                              <br>Your Answer: <br><br>
                              <input required type="text" name="answer" placeholder="Answer">
                              <br><br>
                              <input type="submit" name="" value="Next." class="but1"><br><br>
                         </form>
                    </div>
               </center>
          </div>
     </body>
</html>

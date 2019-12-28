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
                      margin-top: 6%;
                 }

                 .forgotpass{
                      background-color: lightgrey;
                      color: black;
                      height: 80%;
                      width: 60%;
                      align: left;
                      box-shadow: 7px 7px 5px #888888;
                 }

                 input[type=email]{
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

                 input[type=email]:hover {
                      width: 70%;
                      border-bottom-color: #bfb52b;
                      color: black;
                      transition: all 0.9s ease-in-out;
                 }
                 input[type=email]:focus {
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
                     height: 10%;
                     width: 100%;
                     outline: none;
                     font-size: 15px;
                   }
                  .but1:hover {
                     background-color: black;
                     transition: background-color 0.9s ease-out;
                     color: white;
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
                   
                   width: 23%;
                   height: 30%;
                }
                .inli{
                  display: inline;
                }
				.dropdowwnstyle{
					height: 10%;
					width: 75%;
					background-color: lightgrey;
					border-color: black;
					border: 2 solid black;
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
                         Forgot your password? We'll help.<br>Just fill the following to access to our account again.<br><br>
                    </font>
					
                    <div class="forgotpass">
					<br><br>
                         <form action = "question.php" method = "POST">
						 
						    <div class="inli">
                                <label>
                                  <input type="radio" name="type1" value="company_admin" img="Images/admin.png" required>
                                  <img src="Images/admin.png" width="150px" height="300px;" class="img-circle">
                               </label>
                               <label>
                                 <input type="radio" name="type1" value="shop_admin" img="Images/shopadmin.png" required>
                                 <img src="Images/shopadmin.png" width="150px" height="300px;" class="img-circle">
                              </label>
                              <label>
                                <input type="radio" name="type1" value="shop_keeper" img="Images/shop.png" required>
                                <img src="Images/shop.png" width="150px" height="300px;" class="img-circle">
                             </label>
                            </div>
							<br><br>
                              <br>Enter your registered email address: <br><br>
                              <input required type="email" name="username" placeholder="abcd1234@something.com">
                              <br><br>

							  Select your Company Name:<br><br>
								   <select class="dropdowwnstyle">
									  <option value="hp">HP</option>
									  <option value="dell">Dell</option>
									  <option value="samsung">Samsung</option>
									  <option value="lenovo">Lenovo</option>
									</select>
							   <br><br>

                             <input type="submit" name="" value="Next." class="but1">
                         </form>
                    </div>
               </center>
          </div>
     </body>
</html>

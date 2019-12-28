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
        background: white;// Change background on scroll
        opacity: 0.8;
      }


      #nav.shrink #logo {
        transition: all ease .5s;
      }

      .firstdiv{
           position: relative;
           margin-left: -0.60%;
           margin-right: -0.60%;
           height: auto;
           left: 0px;
           right: 0px;
           background-color: orange;
            text-decoration:none;
            padding:5px 10px;
            font-size:30px;
           -webkit-transform: skewY(3.5deg);
      }
      .secdiv{
           position: relative;
            margin-left: -0.60%;
            margin-right: -0.60%;
            padding-top: 50px;
            left: 0px;
            right: 0px;
           text-decoration:none;
           padding:5px 10px;
           font-size:30px;
           background-color: black;
           opacity: 0.9;
           color: white;
           text-decoration: none;
           -webkit-transform: skewY(3.5deg);
           background-image: url("Images/mainpage1.jpg");
           background-position: center;
           background-repeat: no-repeat;
           background-size: cover;
      }
      .thirddiv{
            position: relative;
            margin-left: -0.60%;
            margin-right: -0.60%;
            left: 0px;
            right: 0px;
            text-decoration:none;
            padding:5px 10px;
            font-size:30px;
            background-color: violet;
            color: white;
            text-decoration: none;
            -webkit-transform: skewY(3.5deg);
            }
     .fourthdiv{
           position: relative;
           margin-left: -0.60%;
           margin-right: -0.60%;
           left: 0px;
           right: 0px;
           text-decoration:none;
           padding:5px 10px;
           font-size:30px;
           background-color: lightblue;
           color: white;
           text-decoration: none;
           -webkit-transform: skewY(3.5deg);
      }
      .fifthdiv{
           position: relative;
           margin-left: -0.60%;
           left: 0px;
           right: 0px;
           text-decoration:none;
           font-size:30px;
           background-color: lightgreen;
           color: white;
           text-decoration: none;
           -webkit-transform: skewY(3.5deg);
      }
      .rotatetext{
           -webkit-transform:rotate(-3.5deg);
           -webkit-transform: skewY(-3.5deg);
      }
      .but1{
           background-color: transparent;
            border-width: 1.5px;
            border-color: black;
            height: 10%;
            width: 20%;
            outline: none;
            font-size: 15px;
            color: black;
          }
          .but1:hover {
            background-color: black;
            color: white;
            transition: background-color 0.9s ease-in;
          }
          .bgtext{
               background-color: white;
               color:black;
               width: 75%;

          }
          .bgtext1{
               background-color: white;
               text-rendering: transparent;
               width: 101.5%;
               height: auto;
               opacity: 0.8;
               margin-left: -0.75%;
               margin-top: -0.43%;
               margin-bottom: -0.43%;
               left: 0px;
               right: 0px;
               color: black;
          }
          .bgtext2{
               background-color: black;
               width: 101.5%;
               height: auto;
               opacity: 0.8;
               margin-left: -0.75%;
               margin-top: -0.43%;
               margin-bottom: -0.43%;
               left: 0px;
               right: 0px;
               color: white;
          }
          .up {
            transform: rotate(-135deg);
            -webkit-transform: rotate(-135deg);
          }
          .back-to-top {
              cursor: pointer;
              position: fixed;
              bottom: 20px;
              right: 20px;
              display:none;
          }

    </style>
	<script src="js/jquery.js"></script>
	<script src="js/navshrink.js"></script>
  <script src="js/new1.js">  </script>
  </head>

  <body bgcolor="orange">

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

    <div class="firstdiv">
         <div class="rotatetext">
              <font size="25">
                   <center>
                        <br><br>Free Inventory Managment for small BUSINESSES.<br><br>
                   </center>
              </font>
             <font size="20">
                  <center>
                       Organize your Organization and Save Money.
                 </center>
           </font>
           <font size="6">
                <center>
                     Organize your Inventory to avoid Confusion and Loss and also keep track of <br> all your part in the Organization.<br><br>
                         <form>
                              <a href="signin.php">
                                   <input type="button" name="" value="Sign-In" class="but1">
                              </a> | OR |
                              <a href="mainsignup.html">
                                   <input type="button" name="" value="Sign-Up" class="but1">
                              </a><br><br>
                              It's FREE.
                         </form>
                     <br><br><br>
                </center>
           </font>
      </div>
    </div>

    <div class="secdiv">
         <div class="bgtext1">
             <div class="rotatetext">
                  <font size="20" color= "black">
                      <center>
                           <br><br>
                              Manage Stuff in a very easy way.
                         </center>
                    </font>
                    <font size="6">
                         <center>
                              We provide a very easy way to manage your inventory that other sofware<br> don't provide. A very friendly UI to manage things faster.
                              <br><br><br>
                         </center>
                    </font>
               </div>
          </div>
     </div>

    <div class="thirddiv">
         <div class="bgtext2">
             <div class="rotatetext">
                  <font size="20">
                         <center>
                           <br>
                                   Save Money.
                                   <br>
                         </center>
                    </font>
                    <font size="6">
                         <center>
                              Organizing your Inventory can be a very useful thing. It save you a lot of money by informing you about the current status of your raw material before it runs out without your notice.
                              <br><br>
                              <img src="Images/money.png">
                              <br><br>
                         </center>
                    </font>
               </div>
          </div>
     </div>

         <div class="fourthdiv">
                  <div class="rotatetext">
                       <font size="20">
                              <center>
                                <br>
                                        Save Time.
                                        <br>
                              </center>
                         </font>
                         <font size="6">
                              <center>
                                   Keeping things organized and upto date save a lot of time. We help you do that so that you can ue your saved time to earn even more.
                                   <br><br>
                                   <img src="Images/savetime.png">
                                   <br><br>
                              </center>
                         </font>
                    </div>
          </div>

          <div class="fourthdiv" style="background-color:purple;">
                  <div class="rotatetext">
                       <font size="20">
                              <center>
                                <br>
                                        Relax.
                                        <br>
                              </center>
                         </font>
                         <font size="6">
                              <center>
                                   Saving both time and money helps you relax. So just relax and manage your inventory in the easiest way.
                                   <br><br>
                                   <img src="Images/relax.png">
                                   <br><br>
                              </center>
                         </font>
                    </div>
          </div>

          <div class="fourthdiv" style="background-color: darkblue">
                  <div class="rotatetext">
                       <font size="20">
                              <center>
                                <br><br>
                                        Inventory Made Easy.
                                        <br>
                              </center>
                         </font>
                         <font size="6">
                              <center>
                                   There are many reasons to use our inventory tool, including but not limited to: it's free, it saves you time, it makes next time easier, it ensures you don't lose your written list, and we add features and enhancements all the time.
                                   <br><br>
                                   <h2>Get started now.</h2> Sign-Up and use all our features for free or Sign-In
                                   <br><br>
                                   <a href="signin.php">
                                        <input type="button" name="" value="Sign-In" class="but1" style="color: white;">
                                   </a>
                                   <a href="mainsignup.html">
                                        <input type="button" name="" value="Sign-Up" class="but1" style="color: white;">
                                   </a>
                                   <br><br><br><br>
                              </center>
                         </font>
                    </div>
          </div>
          <center>
               <div class="foot" style="disaplay: inline;"
               <h1><br>
                    <font size="4.5">
                         <b>
                              &copy 2017 NanoSoft.
                         </b>
                    </font>
               </h1>
          </center>
  </body>
</html>

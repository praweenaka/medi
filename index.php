<?php
include './CheckCookie.php';
$cookie_name = "user";
if (isset($_COOKIE[$cookie_name])) {

    $mo = chk_cookie($_COOKIE[$cookie_name]);

    if ($mo == "ok") {
        header('Location: ' . "home.php");
        exit();
    }
}
?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login Page</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link  href="css/login.css" rel="stylesheet">    

        <link rel="stylesheet" href="css/ionicons/css/ionicons.min.css">
        <link rel="icon" type="image/png" sizes="16x16" href="andpic.png">

        <script src="js/vuepkg.js" type="text/javascript"></script>
        <script src="js/user.js"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <style>
            
            body{
                background-color: #ded5d5;
            }
            #login-form{
                background-color: #211818;
                border: 0px;
              /*  height: 400px;*/
            }
            #topic{
                color: white;
            }
            #lab{
                color: white;
            }
            #txterror{
                color: white;
            }
            .button {
              background-color: #4CAF50; /* Green */
              border: none;
              color: white;
              padding: 7px 16px;
              text-align: center;
              text-decoration: none;
              display: inline-block;
              font-size: 14px;
              margin: 4px 2px;
              cursor: pointer;
              border-radius: 4px;
            }

            
            .button3 {background-color: #f44336;} /* Red */ 

            .letter-red{
                color: red;
            }
        </style>
        
    </head>
    <body>


   

        <div class="container" >
            <br><br>
            
            <div id="login-form" class="col-md-12" style="padding: 0px;">
                <!-- <br><br><br><br><br> -->
                <div style="background-color: red;width: 100%;height: 10px"></div>
                
             

                <div class="col-md-4" style="padding: 20px;">
                    <br><br>
                    <div>
                        <!--<img style="align-content: center" class="img-responsive" src="img/Mas_Holdings_Logo.png">-->
                        <div class="form-group" >
                            <h1 id="topic"><center>Medical <span style="color: red;">System</span></center></h1>
                        </div>
                    </div>
                    <!--<h3><center>MAS HOLDINGS</center></h3>-->
                    <div class="form-group"></div>

                    <strong id="lab">Username:</strong>
                    <input class="form-control"  name="UserName" type="text" id="txtUserName" onkeypress="keyset('txtPassword', event)"  />
                    <strong id="lab">Password:</strong>
                    <input class="form-control" name="Password" type="password" id="txtPassword" onkeypress="keyset('lbtn', event)"/>
                    <div id="txterror" class="login_error">
                    </div>
                    <br>
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;
                    <button class="button button3" style="background-color: #f44336;" id="lbtn"  name="lbtn" onclick="IsValiedData();">Log in &nbsp;&nbsp; &nbsp;&nbsp;</button>

                </div>
                   <div class="col-md-8" style="text-align: center;color: white;font-family: Helvetica, Geneva, sans-serif;font-size: 13px;letter-spacing: 0.4px;word-spacing: 6px;color: white;text-decoration: none;font-style: normal;font-variant: normal;text-transform: none;">
                    <div style="margin-top: 20px;">
                       <img src="img/logo.jpg"   class="img-fluid" style="width:100%; ">
                   </div>
                    <div style="margin-top: 60px;margin:  20px;" >
                   <p><span class="letter-red">C</span>apital. <span class="letter-red">W</span>eb. <span class="letter-red">S</span>olutions.</p>
                   </div>
                </div>
               
            </div>
        </div>

        
    </body>    
</html>     


<script>
    var elem = document.getElementById("txtPassword");
    elem.onkeyup = function (e) {
        if (e.keyCode == 13) {
            IsValiedData();
        }
    }


</script>


<script src="js/jquery-2.1.0.js"></script>
<script src="js/bootstrap.min.js"></script>
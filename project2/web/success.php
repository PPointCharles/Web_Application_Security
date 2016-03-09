<!DOCTYPE html>
<html>
    <head>
        <style>

            h1 {
                text-align: center;
            }
            h2 {
                text-align: right;
                color:red;
            }
            #div1 {
                margin-top: -25px;
                margin-bottom:-10px;
                margin-left:-10px;
                margin-right:-10px;
                text-align: center;
                background:#F5F5DC;
                /*width:100%;*/
                height: 100%
            }
            #div2 {
                margin-top: 20px;
                text-align: center;
                /*border:50px;*/
                position: absolute;
                left: 0;
                right: 0;
                top: 30%;
                transform: translate(0, -50%);
            }
            body{
                /*background:url(http://ginva.com/wp-content/uploads/2012/07/city-skyline-wallpapers-008.jpg);*/
            
			width: auto;
			height: auto;
			background-image: url(http://www.freecreatives.com/wp-content/uploads/2015/03/Huge-Backgrounds-41-1024x683.jpg);
			background-size: cover;
			
			z-index: 0;
            }
            
        </style>
    </head>
    <body>
        <div id='div1' >
        <h1>Web Secure-CPEG670</h1>
        <h2>
        <?php
        
            session_start();
            if($_SESSION['username']!=null)
            echo "Welcome! ".$_SESSION["username"];
            
        ?>
        </h2>
        
        </div>
        <hr>
        <div id='div2'>
        <span>Want to change your password?&nbsp;</span>
        <button onclick="change_password()" >Click me!</button>
        <br><br>
        <form id='change_password' style="display: none;" action="change_password.php" method="post">
            <input type="password" placeholder="Set New Password" name="password" id="password" required>
            <input type="password" placeholder="Confirm Password" id="confirm_password" required>
            <input type="submit" value="Submit"/>
        </form>
        </div>
        <script type="text/javascript" >
            
            var password = document.getElementById("password"),
                confirm_password = document.getElementById("confirm_password");
            
            password.onchange = validatePassword;
            confirm_password.onkeyup = validatePassword;
            
            function change_password(){
               document.getElementById('change_password').style.display="block";
            }
            
            function validatePassword() {
              if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
              } else {
                confirm_password.setCustomValidity('');
              }
            }
            
        </script>
    </body>
</html>


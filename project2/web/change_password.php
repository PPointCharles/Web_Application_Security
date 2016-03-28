<!DOCTYPE html>
<html>
    <head>
        <style>
            
		@import url(//fonts.googleapis.com/css?family=Exo:100,200,400);
		@import url(//fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);
            
        </style>
        
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    </head>
    <body>
        <div id='div1' >
        <h2>
        <?php
            session_start();
            if(!$_SESSION['ip']){
                $_SESSION['ip']= $_SERVER['REMOTE_ADDR']; 
            }
            else{
                $x=explode('.',$_SESSION['ip']);
                $y=explode('.',$_SERVER['REMOTE_ADDR']);
                if(!($x[0]==$y[0] and $x[1]==$y[1] and $x[2]==$y[2]) ){
                    
                    $_SESSION['username']=null;
                    $_SESSION["logged_in"] = false;
                    header("Location: login.html");
                }
            }
            if($_SESSION['username']!=null)
                echo "Welcome! ".$_SESSION["username"];
            else {
                header("Location: login.html");
            }
        ?>
        
        <button onclick="logout()" >Logout!</button>
        </h2>
        
        </div>
        <div id='div2'>
        <span>Want to change your password?&nbsp;</span>
        <button onclick="change_password()" >Click me!</button>
        <br><br>
        <form id='change_password' style="display: none;" action="OP_change_password.php" method="post">
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
               $('#change_password').toggle();
            }
            
            function validatePassword() {
              if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
              } else {
                confirm_password.setCustomValidity('');
              }
            }
            function logout(){
                $.post( "OP_logout.php", function( data ) {
                        var r=$.parseJSON(data);
                        if(r.status=='success'){
                            location.reload();
                        }else{
                            alert('error');
                        }
                });
            }
        </script>
    </body>
</html>


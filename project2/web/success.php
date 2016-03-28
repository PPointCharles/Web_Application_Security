<!DOCTYPE html>
<html>
    <head>
        <style>
            
		@import url(//fonts.googleapis.com/css?family=Exo:100,200,400);
		@import url(//fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);
            
        </style>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <meta name="google-signin-client_id" content="407701602385-q005efm7k49t4up3mjbeu55p0in6lkon.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
    
    </head>
    <body>
        
        <div id='div1'>
        <h2>
        <?php
            session_start();
            if(($_GET['type']=='google')){
                $_SESSION['username']=$_GET['name'];
                $_SESSION['type']='google';
            }
            {
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
            }
        ?>
        
        <button onclick="logout()" >Logout!</button>
        </h2>
        </div>
        
        <div id='div2'>
        <span>Want to change your password?&nbsp;</span><br>
        <?php
            if ($_GET['type']=='google'){
                echo "Google user don't need to use password";
            }
            else{
                echo "<button onclick=change_password()>Click me!</button>";
            }
        ?>
        </div>
        
        
        
        <script>
            function change_password(){
                window.location.href = "change_password.php";
            }
            
            function signOut() {
              var auth2 = gapi.auth2.getAuthInstance();
              auth2.signOut().then(function () {
                console.log('User signed out.');
              });
            }
        
            function onLoad() {
              gapi.load('auth2', function() {
                gapi.auth2.init();
              });
            }
        </script>
        
        <script type="text/javascript" >
   
            function logout(){
                signOut();
            
                $.post( "OP_logout.php", function( data ) {
                        var r=$.parseJSON(data);
                        if(r.status=='success'){
                            window.location.href = "login.html";
                        }
                        
                        else{
                            alert('error');
                        }
                });
            }
        </script>
    </body>
</html>


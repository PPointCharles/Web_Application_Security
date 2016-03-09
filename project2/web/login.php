<?php
   session_start();
   include 'hash_methods.php';
   $username = $_POST["username"];
   $pwd = $_POST["password"];
   
   //get salt and r from db
   
   $dbhandle = new PDO("sqlite:user.sqlite") or die("Failed to open DB");
   if (!$dbhandle) die ($error);
   $statement = $dbhandle->prepare("SELECT salt,stretch,hash FROM user WHERE username='".$username."'");
   // $statement->bindParam(":username", $username);
   $statement->execute();
   $results = $statement->fetch(PDO::FETCH_ASSOC);
   // echo ($results);
   $salt=$results['salt'];
   $r=$results['stretch'];
   $secure_pwd=$results['hash'];
   // echo hex2bin($salt);
   // echo $r;
   // echo $secure_pwd;
   if($secure_pwd==hash_m3($pwd,hex2bin($salt),$r)){
      $_SESSION["logged_in"] = true;
      $_SESSION["username"] = $username;
      echo "You logged in!".$_SESSION["username"];
      header("Location: success.php");
      exit();
   } else {
      $_SESSION["logged_in"] = false;
      header("Location: login.html?error=1"); /* Redirect browser */
      exit();
   }
?>
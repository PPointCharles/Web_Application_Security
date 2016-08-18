<?php
   include 'hash_methods.php';
   $username = $_REQUEST["username"];
   $pwd = $_REQUEST["password"];
   // if ($username == "andy" && $pwd == "rules") {
   //    $_SESSION["logged_in"] = true;
   //    echo "You logged in!";
   // } else {
   //    $_SESSION["logged_in"] = false;
   //    header("Location: index.html"); /* Redirect browser */
   //    exit();
   // }
   
   
   //get salt and r from db
   
   $dbhandle = new PDO("sqlite:auth.sqlite") or die("Failed to open DB");
   if (!$dbhandle) die ($error);
//   $statement = $dbhandle->prepare("Select * from users where username!='admin'");

//   $statement->bindParam(":username", $username);
//   $statement->bindParam(":pwd", hash('sha256', $pwd));
   $statement = $dbhandle->prepare("SELECT salt,stretch,secure_pwd FROM auth WHERE username='".$username."'");
   // $statement->bindParam(":username", $username);
   $statement->execute();
   $results = $statement->fetch(PDO::FETCH_ASSOC);
   // echo ($results);
   $salt=$results['salt'];
   $r=$results['stretch'];
   $secure_pwd=$results['secure_pwd'];
   // echo hex2bin($salt);
   // echo $r;
   // echo $secure_pwd;
   if($secure_pwd==hash_m3($pwd,hex2bin($salt),$r)){
      $_SESSION["logged_in"] = true;
      echo "You logged in!";
   } else {
      $_SESSION["logged_in"] = false;
      header("Location: login1.html"); /* Redirect browser */
      exit();
   }
?>
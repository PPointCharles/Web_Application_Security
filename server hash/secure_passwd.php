<?php
    include 'hash_methods.php';
    
    $username='admin';
    $salt = openssl_random_pseudo_bytes(40, $was_strong);
    $pwd ='cookies';// no need to store
    $r=2000;
    $secure_pwd=hash_m3($pwd,$salt,$r);
    
    $dbhandle = new PDO("sqlite:auth.sqlite") or die("Failed to open DB");
   if (!$dbhandle) die ($error);
//   $statement = $dbhandle->prepare("Select * from users where username!='admin'");

//   $statement->bindParam(":username", $username);
//   $statement->bindParam(":pwd", hash('sha256', $pwd));
    echo "INSERT INTO auth ('username','secure_pwd','salt','stretch') 
                                 VALUES('".$username."','".$secure_pwd."','".bin2hex($salt)."','".$r."')";
   $statement = $dbhandle->prepare("INSERT INTO auth ('username','secure_pwd','salt','stretch') 
                                 VALUES('".$username."','".$secure_pwd."','".bin2hex($salt)."','".$r."')");
   $statement->execute();
   $results = $statement->fetch(PDO::FETCH_ASSOC);
   echo json_encode($results);
?>
<?php
   $hash = $_POST["hash"];
   $pwd = $_POST["password"];
   $dbhandle = new PDO("sqlite:rainbow.db") or die("Failed to open DB");
   if (!$dbhandle) die ($error);
   $statement = $dbhandle->prepare("Select * from users");
//   $statement->bindParam(":username", $username);
//   $statement->bindParam(":pwd", hash('sha256', $pwd));
   $statement->execute();
   $results = $statement->fetch(PDO::FETCH_ASSOC);
//   if (isset($results["pwd"])){
//       $_SESSION["logged_in"] = true;
//       echo "Success!  You are logged in.";
//   } else {
//       $_SESSION["logged_in"] = false;
//       header("Location: index.html"); /* Redirect browser */
//       exit();
//   }
    echo json_encode($results);
    // print_r($results)
?>
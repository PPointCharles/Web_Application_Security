<?php
  $salt = openssl_random_pseudo_bytes(40, $was_strong);
  if (!$was_strong){
     die("Oh no...");
  }
  
  echo bin2hex($salt);
  echo strlen(bin2hex($salt));
?>
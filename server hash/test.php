<?php
    include "hash_methods.php";

    $salt ='salt'; //openssl_random_pseudo_bytes(40, $was_strong);
    $pwd ='pass123';
    $r=2;
    
    echo hash_m3($pwd,$salt,$r);
?>
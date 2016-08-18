<?php

    $salt = openssl_random_pseudo_bytes(40, $was_strong);
    $pwd ='pass123';
    $r=2;
    $x='0';
    $init = microtime(true);
    for(;$r>0;$r-=1){
        $x=hash('sha256', $x.$pwd.$salt);
        // echo $x.'<br>';
    }
    $total = microtime(true) - $init;
    echo $x;
    echo '<br>';
    echo $total.' s';
?>
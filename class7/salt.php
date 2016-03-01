<?php

    $salt = 'salt';//openssl_random_pseudo_bytes(40, $was_strong);
    $pwd ='pass123';
    $r=2;
    $x='0';
    $init = microtime(true);
    // method 1
    // for(;$r>0;$r-=1){
    //     $x=hash('sha256', $x.$pwd.$salt);
    //     // echo $x.'<br>';
    // }
    // method 2
    
    $x=hash('sha256', $x.$pwd.$salt);

    // for(;$r>1;$r-=1){
    //     $x=hash('sha256', strtoupper($x).$pwd.$salt);
    //     // echo $x.'<br>';
    // }
    // echo (hex2bin($x)).'<br>';
    //method3
    for(;$r>1;$r-=1){
        
        $x=hash('sha256', hex2bin($x).$pwd.$salt);
        // echo $x.'<br>';
    }
    
    $total = microtime(true) - $init;
    echo $x.'<br>';
    
    // echo $pwd.'<br>'.$salt.'<br>'.$r;
    // echo '<br>';
    // echo $total.' s';

?>